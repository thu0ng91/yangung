<?php
class NovelController extends Controller{
	public function actionList(){
		$sortid = intval(Yii::app()->request->getParam('sort',null));
		$sort = NovelSort::model()->findByPk($sortid);

		$criteria = new CDbCriteria;
		$criteria->order='id DESC';
		$criteria->addCondition('sortid='.$sort->id);
		$criteria->addCondition('status=1');
		$count=Share::model()->count($criteria);
		$pager = new CPagination($count);
		$pager->pageSize=20;
		$pager->applyLimit($criteria);
		$shareData=Share::model()->findAll($criteria);
		
		$this->pagetitle = $sort->name;
		$this->render('novel_list',array(
			'shareData'=>$shareData,
			'pages'=>$pager,
			'sortid'=>$sortid,
			'sort'=>$sort
		));
	}
	public function actionInfo(){
		$id = intval(Yii::app()->request->getParam('id',null));

		if(null == $id){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		$model = Share::model()->findByPk($id);
		if(null == $model){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		$this->pageTitle = $model->title;
		$this->visit($id);
		$bookcase = Bookcase::model()->findByAttributes(array('share_id'=>$id,'uid'=>Yii::app()->user->id));
		if(null == $bookcase){
			$bookcase = false;
		}else{
			$bookcase = true;
		}
		$preSql = "SELECT id,title FROM {{share}} where id<".$id." and status=1 order by id desc";
		$preArticle = Yii::app()->db->createCommand($preSql)->queryRow();
		$nextSql = "SELECT id,title FROM {{share}} where id>".$id." and status=1 order by id asc";
		$nextArticle = Yii::app()->db->createCommand($nextSql)->queryRow();
		$novellog = NovelLog::model()->findByAttributes(array('uid'=>Yii::app()->user->id,'nid'=>$id,'type'=>3));
		if(null == $novellog){
			NovelLog::model()->insertLog(Yii::app()->user->id,$id,3);
		}else{
			NovelLog::model()->insertLog(Yii::app()->user->id,$id,3,time());
		}
		
		$this->render('info',array('model'=>$model,'preArticle'=>$preArticle,'nextArticle'=>$nextArticle,'bookcase'=>$bookcase));
	}
	public function visit($id){
		$visitnum = isset(Yii::app()->params['visitnum']) ? intval(Yii::app()->params['visitnum']) : 1;
		$data = Share::model()->findByPk($id);
		$data->views += $visitnum;
		$data->save();
	}
	public function actionVote(){
		if(!Yii::app()->user->id){
			CV::showmsg('登录后才可以推荐',Yii::app()->createUrl('site/login'));
		}
		$id = intval(Yii::app()->request->getParam('id',null));

		if(null == $id){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		$model = Share::model()->findByPk($id);
		if(null == $model){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		//已经推荐判断
		$novellog = NovelLog::model()->findByAttributes(array('uid'=>Yii::app()->user->id,'nid'=>$id,'type'=>1));
		
		if(null != $novellog){
			if((time()-$novellog->dateline) > 3600){
				$data = Share::model()->findByPk($id);
				$data->votes += 1;
				$data->save();
				NovelLog::model()->insertLog(Yii::app()->user->id,$id,1,time());
				
				CV::showmsg('感谢您的推荐', Yii::app()->createUrl('novel/info',array('id'=>$id)));
			}else{
				CV::showmsg('1小时只能推荐一次', Yii::app()->createUrl('novel/info',array('id'=>$id)));
			}
		}else{
			$data = Share::model()->findByPk($id);
			$data->votes += 1;
			$data->save();
			NovelLog::model()->insertLog(Yii::app()->user->id,$id,1);
			
			CV::showmsg('感谢您的推荐', Yii::app()->createUrl('novel/info',array('id'=>$id)));
		}

	}
	public function actionBookcase(){
		if(!Yii::app()->user->id){
			CV::showmsg('会员才有书包哦',Yii::app()->createUrl('site/login'));
		}
		$id = intval(Yii::app()->request->getParam('id',null));

		if(null == $id){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		$model = Share::model()->findByPk($id);
		if(null == $model){
			CV::showmsg('该小说不存在',Yii::app()->createUrl('site/index'));
		}
		$data = Bookcase::model()->findByAttributes(array('share_id'=>$id,'uid'=>Yii::app()->user->id));
		if(null == $data){
			$data = new Bookcase();
			$data->uid = Yii::app()->user->id;
			$data->username = Yii::app()->user->name;
			$data->share_id = $id;
			$data->save();
			NovelLog::model()->insertLog($data->uid,$id,5);
			CV::showmsg('已经加入书包',Yii::app()->createUrl('novel/info',array('id'=>$id)));
		}else{
			CV::showmsg('书包里已经有这本书了',Yii::app()->createUrl('novel/info',array('id'=>$id)));
		}
	}
	public function actionBookcaseDel(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$data = Bookcase::model()->findByAttributes(array('share_id'=>$id,'uid'=>Yii::app()->user->id));
		$data->delete();
		CV::showmsg('已经拿出书包',Yii::app()->createUrl('novel/info',array('id'=>$id)));
	}
	public function actionSearch(){
		$keyword = Yii::app()->request->getParam('searchword',null);
		$pager = $artList = $category = array();
		$this->pageTitle = '搜索-'.Yii::app()->params['sitename'];
		if(null != $keyword){
			$criteria = new CDbCriteria();
			$criteria->addCondition("status=1");
			$criteria->addSearchCondition('title',$keyword);
			$criteria->order = 'id desc';
			//$criteria->select = 'id,title,dateline';
			$count = Share::model()->count($criteria);
			
			$pager = new CPagination($count);
			$pager->pageSize = Yii::app()->params['pagelimit'];
			$pager->applyLimit($criteria);
			
			$shareData = Share::model()->findAll($criteria);
		}
		$this->render('novel_list',array(
			'shareData'=>$shareData,
			'pages'=>$pager,
			'sortid'=>0,
			'sort'=>0
		));
	}
}
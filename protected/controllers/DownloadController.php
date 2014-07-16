<?php
class DownloadController extends CController{
	public function actionIndex(){
		if(!Yii::app()->user->id){
			CV::showmsg('登录后才可以下载',Yii::app()->createUrl('site/login'));
		}
		$userinfo = User::model()->getUserInfo();
		
		$id = intval(Yii::app()->request->getParam('id',null));
		if(null == $id){
			CV::showmsg('资源不存在','/');
		}

		$model = Share::model()->findByPk($id);
		if($userinfo->golds < $model->price){
			CV::showmsg('您的积分（'.$userinfo->golds.'）不够<br>本书需要消耗'.$model->price.'点积分<br>请选择其他电子书<br>分享电子书可获得积分',Yii::app()->createUrl('novel/info',array('id'=>$id)),'',5);
		}
		//积分更新判断(管理组和分享者自己不更新积分)
		if($userinfo->groupid != 1 || $userinfo->uid != $model->postid){
			//更新下载用户积分
			$userinfo->golds = $userinfo->golds - $model->price;
			$userinfo->save();
			//更新分享用户积分
			$share_user = User::model()->findByPk($model->postid);
			$share_user->golds += $model->price;
			$share_user->save();
			NovelLog::model()->insertLog(Yii::app()->user->id,$id,2);
		}
		
		
		$this->renderPartial('index',array('model'=>$model));
	}
}
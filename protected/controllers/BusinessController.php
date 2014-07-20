<?php
class BusinessController extends CController{

	public function beforeAction(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录',Yii::app()->createUrl('site/login'));
			Yii::app()->end();
		}
		return true;
	}
	public function actionCenter(){
		$your = Authorizer::model()->findAllByAttributes(array('uid'=>Yii::app()->user->id));
		
		$this->render('index',array('your'=>$your));
	}
	public function actionAdd(){
		if(Yii::app()->request->isPostRequest){
			$url = Yii::app()->request->getParam('url',null);
			if(null == $url){
				CV::showmsg('域名不能为空',Yii::app()->createUrl('business/add'));
			}
			if (!preg_match('/^([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',$url)) {
			    CV::showmsg('域名格式错误',Yii::app()->createUrl('business/add'));
			}
			$result = Authorizer::model()->findByAttributes(array('url'=>$url));
			if(null != $result){
				CV::showmsg('该域名已经授权',Yii::app()->createUrl('business/add'));
			}
			
			$model = new Authorizer();
			$model->username = Yii::app()->user->name;
			$model->uid = Yii::app()->user->id;
			$model->url = $url;
			$model->version = intval($_POST['version']);
			
			$nums = Authorizer::model()->countByAttributes(array('uid'=>Yii::app()->user->id,'type'=>2));
			$userinfo = User2::model()->findByAttributes(array('username'=>Yii::app()->user->name),array('select'=>'groupid'));
			$usergroup = Group::model()->findByPk($userinfo->groupid);

			if($model->version != 1 && $nums >= $usergroup->version_nums){
				CV::showmsg('域名授权已经达到上限，请联系管理员',Yii::app()->createUrl('business/add'));
			}
			if($model->version == 1){
				$model->type = 1;
			}else{
				$model->type = 2;
			}

			$model->dateline = time();
			$model->sqm = $this->create_sqm($url,$model->version);
			if($model->save()){
				CV::showmsg('增加新域名授权成功',Yii::app()->createUrl('business/center'));
			}
			CV::showmsg('域名授权未成功，请联系官方',Yii::app()->createUrl('business/center'));
		}
		$this->render('add');
	}
	public function actionDownload(){
		echo 'download';
	}
	public function actionComment(){
		echo 'comment';
	}
	public function create_sqm($url,$version) {
	    $data = $url;
	    $data .= $version;
	    $hash = md5('yacms123321'.md5($data));
	    return $hash;
	}
}
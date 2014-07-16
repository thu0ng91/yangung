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
		if(isset($_POST['submit'])){
			CV::showmsg('授权系统正在完善中，请稍后访问','/yunyue');
		}
		$this->render('index');
	}
	public function actionAdd(){
		if(Yii::app()->request->isPostRequest){
			$url = Yii::app()->request->getParam('url',null);
			if(null == $url){
				CV::showmsg('域名不能为空',Yii::app()->createUrl('business/add'));
			}
			$model = new Authorizer();
			$model->username = Yii::app()->user->name;
			$model->uid = Yii::app()->user->id;
			$model->url = $url;
			$model->version = '1.0';
			$model->type = 1;
			$model->dateline = time();
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
}
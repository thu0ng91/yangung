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
			CV::showmsg('授权系统正在完善中，请稍后访问',Yii::app()->createUrl('site/index'));
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
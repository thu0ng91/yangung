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
		$this->render('add');
	}
}
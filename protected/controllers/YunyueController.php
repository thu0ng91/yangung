<?php
class YunyueController extends CController{
	public function actionLog(){
		$this->pageTitle = '更新日志'.'--'.Yii::app()->params['sitename'];
		$this->render('log');
	}
	public function actionVs(){
		$this->render('vs');
	}
	public function actionAbout(){
		$this->render('about');
	}
}
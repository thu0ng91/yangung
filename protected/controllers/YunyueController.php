<?php
class YunyueController extends CController{
	public function actionLog(){
		$datalog = Version::model()->findAllByAttributes(array(),array('order'=>'posttime desc'));
		$i=0;
		foreach ($datalog as $v){
			$i++;
			if($i%2==0){
				$datalog1[] = $v;
			}else{
				$datalog2[] = $v;
			}
		}
		$this->pageTitle = '更新日志'.'--'.Yii::app()->params['sitename'];
		$this->render('log',array('datalog1'=>$datalog1,'datalog2'=>$datalog2));
	}
	public function actionVs(){
		$this->render('vs');
	}
	public function actionAbout(){
		$this->render('about');
	}
}
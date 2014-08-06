<?php
class YunyueController extends CController{
	public function actionLog(){
		$datalog = Version::model()->findAllByAttributes(array(),array('order'=>'posttime desc'));
		$i=1;
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
	public function actionIframenotice(){
		$model = Notice::model()->findAllByAttributes(array('status'=>1),array('limit'=>5,'order'=>'id desc'));
		$this->renderPartial('frame_notice',array('model'=>$model));
	}
}
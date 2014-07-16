<?php
class NovelSideWidget extends CWidget{
	public $lastupdateList;
	public $topviewsList;
	public function init(){
		$this->lastupdateList = Share::model()->findAllByAttributes(array('status'=>1),array('limit'=>10,'order'=>'id desc'));
		$this->topviewsList = Share::model()->findAllByAttributes(array('status'=>1),array('limit'=>10,'order'=>'views desc'));
	}
	
	public function run(){
		$this->render('novel_side',array('lastupdateList'=>$this->lastupdateList,'topviewList'=>$this->topviewsList));
	}
}
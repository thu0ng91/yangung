<?php
class ArticleSideWidget extends CWidget{
	public $articleList;
	
	public function init(){
		$this->articleList = Article::model()->findAllByAttributes(array('status'=>1),array('limit'=>10,'order'=>'id desc'));
	}
	
	public function run(){
		$this->render('article_side',array('articleList'=>$this->articleList));
	}
}
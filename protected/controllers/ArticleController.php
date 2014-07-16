<?php
class ArticleController extends Controller{
	public function actionIndex(){
		$criteria = new CDbCriteria();
		$criteria->addCondition("status=1");
		$criteria->order = 'id desc';
		$criteria->select = 'id,title,dateline';
		$count = Article::model()->count($criteria);
		
		$pager = new CPagination($count);
		$pager->pageSize = Yii::app()->params['pagelimit'];
		$pager->applyLimit($criteria);
		
		$artList = Article::model()->findAll($criteria);
		
		$this->pageTitle = '全部文章-'.Yii::app()->params['sitename'];
		$this->render('articlelist',array('pages'=>$pager,'list'=>$artList));
	}
	public function actionList(){
		$categoryid = intval(Yii::app()->request->getParam('category_id',null));
		$category = ArticleCategory::model()->findByPk($categoryid);
		
		if(null == $categoryid){
			CV::showmsg('该分类不存在', Yii::app()->createUrl('article/index'));
		}

		$criteria = new CDbCriteria();
		$criteria->addCondition("status=1");
		$criteria->addCondition("category_id=$categoryid");
		$criteria->order = 'istop desc,id desc';
		$criteria->select = 'id,title,dateline';
		$count = Article::model()->count($criteria);
		
		$pager = new CPagination($count);
		$pager->pageSize = Yii::app()->params['pagelimit'];
		$pager->applyLimit($criteria);
		
		$artList = Article::model()->findAll($criteria);
		
		$this->pageTitle = $category->category_name.'-'.Yii::app()->params['sitename'];
		$this->render('articlelist',array('category'=>$category,'pages'=>$pager,'list'=>$artList));
	}
	public function actionSearch(){
		$keyword = Yii::app()->request->getParam('searchword',null);
		$pager = $artList = $category = array();
		$this->pageTitle = '搜索-'.Yii::app()->params['sitename'];
		if(null != $keyword){
			$criteria = new CDbCriteria();
			$criteria->addCondition("status=1");
			$criteria->addSearchCondition('title',$keyword);
			$criteria->order = 'id desc';
			$criteria->select = 'id,title,dateline';
			$count = Article::model()->count($criteria);
			
			$pager = new CPagination($count);
			$pager->pageSize = Yii::app()->params['pagelimit'];
			$pager->applyLimit($criteria);
			
			$artList = Article::model()->findAll($criteria);
		}
		$this->render('articlelist',array('category'=>$category,'pages'=>$pager,'list'=>$artList));
	}
	public function actionView(){
		$id = intval(Yii::app()->request->getParam('id',null));
		if(null == $id){
			CV::showmsg('文章ID不能为空', Yii::app()->createUrl('article'));
		}
		$article = Article::model()->findByPk($id);
		if(null == $article){
			CV::showmsg('该文章不存在', Yii::app()->createUrl('article'));
		}
		$category = ArticleCategory::model()->findByPk($article->category_id);
		$preSql = "SELECT id,title FROM {{article}} where id<".$article->id." and status=1 order by id desc";
		$preArticle = Yii::app()->db->createCommand($preSql)->queryRow();
		$nextSql = "SELECT id,title FROM {{article}} where id>".$article->id." and status=1 order by id asc";
		$nextArticle = Yii::app()->db->createCommand($nextSql)->queryRow();

		$this->pageTitle = $article->title.'-'.Yii::app()->params['sitename'];
		$this->render('articleinfo',array('article'=>$article,'category'=>$category,'preArticle'=>$preArticle,'nextArticle'=>$nextArticle));
	}
}
<?php

class ArticleController extends Controller
{
	public function beforeAction(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录', Yii::app()->createUrl('site/login'));
		}
		return true;
	}
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $menu = array(
		//array('label'=>'文章管理'),
		array('label'=>'文章列表','url'=>array('article/index')),
        array('label'=>'添加文章','url'=>array('article/update')),
        array('label'=>'文章分类','url'=>array('article/articleCategory')),
        array('label'=>'添加文章分类','url'=>array('article/categoryUpdate')),
        array('label'=>'版本更新日志','url'=>array('article/version')),
        array('label'=>'添加新版本','url'=>array('article/versionUpdate')),
	);
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Article::model()->findByPk($id);
		if($model === null) {
			$model = new Article();
		}

		if(isset($_POST['Article']))
		{
			
			if(isset($_FILES['Article']['name']['index_image']) && !empty($_FILES['Article']['name']['index_image'])){
				$file = CUploadedFile::getInstance($model,'index_image');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/article/".date('Y').'/'.date('m').'/';
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$_POST['Article']['index_image'] = $uploadPath.$nowtime.'.jpg';
			}else{
				unset($_POST['Article']['index_image']);
			}
			$model->attributes=$_POST['Article'];
			$model->author = Yii::app()->user->name;
			$model->author_id = Yii::app()->user->id;
			$model->content = htmlspecialchars(CV::checkContent($model->content));
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$categoryData = ArticleCategory::model()->findAll();
		$categories = array('请选择');
		foreach ($categoryData as $val){
			$categories[$val->id] = $val->category_name;
		}

		$model->content = htmlspecialchars_decode($model->content);
		$this->render('update',array(
			'model'=>$model,'categories'=>$categories
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function actionArticleCategory(){
		$model=new ArticleCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ArticleCategory']))
			$model->attributes=$_GET['ArticleCategory'];

		$this->render('article_category',array(
			'model'=>$model,
		));
	}
	public function actionCategoryUpdate(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = ArticleCategory::model()->findByPk($id);
		if($model === null) {
			$model = new ArticleCategory();
		}
		if(isset($_POST['ArticleCategory']))
		{
			$model->attributes=$_POST['ArticleCategory'];
			if($model->save())
				$this->redirect(array('categoryView','id'=>$model->id));
		}
		$this->render('category_update',array('model'=>$model));
	}
	public function actionCategoryView(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = ArticleCategory::model()->findByPk($id);
		$this->render('category_view',array('model'=>$model));
	}
	public function actionCategoryDelete(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = ArticleCategory::model()->findByPk($id);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionVersion(){
		$model=new Version('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Version']))
			$model->attributes=$_GET['Version'];

		$this->render('version',array(
			'model'=>$model,
		));
	}
	public function actionVersionUpdate(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Version::model()->findByPk($id);
		if($model === null) {
			$model = new Version();
		}
		if(isset($_POST['Version']))
		{
			if($model->isNewRecord){
				$_POST['Version']['posttime'] = time();
			}
			
			$model->attributes=$_POST['Version'];
			if($model->save())
				$this->redirect(array('versionView','id'=>$model->id));
		}
		$this->render('version_update',array('model'=>$model));
	}
	public function actionVersionView(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Version::model()->findByPk($id);
		$this->render('version_view',array('model'=>$model));
	}
	public function actionVersionDelete(){
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Version::model()->findByPk($id);
		$model->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

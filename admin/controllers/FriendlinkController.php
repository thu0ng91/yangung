<?php

class FriendlinkController extends Controller
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
		array('label'=>'友链列表','url'=>array('index')),
		array('label'=>'增加友链','url'=>array('update')),
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
		$model = Friendlink::model()->findByPk($id);
		if($model === null) {
			$model = new Friendlink();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Friendlink']))
		{
			if(isset($_FILES['Friendlink']['name']['logo']) && !empty($_FILES['Friendlink']['name']['logo'])){
				$file = CUploadedFile::getInstance($model,'logo');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/friendlink/";
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$_POST['Friendlink']['logo'] = $uploadPath.$nowtime.'.jpg';
			}else{
				unset($_POST['Friendlink']['logo']);
			}
			$model->attributes=$_POST['Friendlink'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$model=new Friendlink('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Friendlink']))
			$model->attributes=$_GET['Friendlink'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Friendlink the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Friendlink::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Friendlink $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='friendlink-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

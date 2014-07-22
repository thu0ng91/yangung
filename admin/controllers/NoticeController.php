<?php

class NoticeController extends Controller
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
        array('label'=>'通告列表', 'url'=>array('index')),      
	    array('label'=>'添加通告', 'url'=>array('update')),
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
		$model = Notice::model()->findByPk($id);
		if($model === null) {
			$model = new Notice();
		}

		if(isset($_POST['Notice']))
		{
			$model->attributes=$_POST['Notice'];
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
		$model=new Notice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Notice']))
			$model->attributes=$_GET['Notice'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Notice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Notice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Notice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='notice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

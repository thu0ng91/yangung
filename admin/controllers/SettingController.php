<?php

class SettingController extends Controller
{
	public function beforeAction(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录', Yii::app()->createUrl('site/login'));
		}
		return true;
	}
	public $layout='//layouts/column2';

	public $menu = array(
		array('label'=>'配置列表','url'=>array('index')),
		array('label'=>'增加配置','url'=>array('update')),
		array('label'=>'导航列表','url'=>array('navindex')),
		array('label'=>'增加导航','url'=>array('navupdate')),
	);
	public function actionNavindex(){
		$model=new Headnav('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Headnav']))
			$model->attributes=$_GET['Headnav'];

		$this->render('navindex',array(
			'model'=>$model,
		));
	}
	public function actionNavupdate()
	{
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Headnav::model()->findByPk($id);
		if($model === null) {
			$model = new Headnav();
		}
		if(isset($_POST['Headnav']))
		{
			$model->attributes=$_POST['Headnav'];
			if($model->save())
				$this->redirect(array('navindex'));
		}
		$this->render('navupdate',array(
			'model'=>$model,
		));
	}
	
	public function actionNavDelete($id)
	{
		$model = Headnav::model()->deleteByPk($id);

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('navindex'));
	}
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate()
	{
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Setting::model()->findByPk($id);
		if($model === null) {
			$model = new Setting();
		}
		if(isset($_POST['Setting']))
		{
			$model->attributes=$_POST['Setting'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$model->svalue = $model->getFormatContent($model->svalue);
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$model=new Setting('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Setting']))
			$model->attributes=$_GET['Setting'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Setting::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='setting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class UsersController extends Controller
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
        array('label'=>'用户列表', 'url'=>array('index')),      
	    array('label'=>'添加用户', 'url'=>array('update')),
        array('label'=>'用户组列表', 'url'=>array('groupIndex')),      
	    array('label'=>'添加用户组', 'url'=>array('groupUpdate')),
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
		$model = User2::model()->findByPk($id);
		if($model === null) {
			$model = new User2();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User2']))
		{
			
			if($model->password == $_POST['User2']['password']){
				unset($_POST['User2']['password']);
			}else{
				$password = '';
				$password = md5(md5($_POST['User2']['password']).$_POST['User2']['salt']);
				$_POST['User']['password'] = $password;
			}

			if(isset($_FILES['User2']['name']['avatar']) && !empty($_FILES['User2']['name']['avatar'])){
				$file = CUploadedFile::getInstance($model,'avatar');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "./upload/user/avatar".CV::getFilePath($model->uid);
				$uploadfile = $uploadPath.$filename1;
				CV::dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$_POST['User2']['avatar'] = $nowtime;
			}else{
				unset($_POST['User2']['avatar']);
			}
			
			$model->attributes=$_POST['User2'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->uid));
		}
		$groups = Group::model()->findAll(array());
		$group = array();
		foreach ($groups as $val){
			$group[$val->groupid] = $val->name;
		}
		$this->render('update',array(
			'model'=>$model,'group'=>$group,
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
		$model=new User2('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User2']))
			$model->attributes=$_GET['User2'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
    public function actionGroupIndex()
	{
		$model=new Group('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Group']))
			$model->attributes=$_GET['Group'];

		$this->render('group_index',array(
			'model'=>$model,
		));
	}
    public function actionGroupUpdate()
	{
	    $id = intval(Yii::app()->request->getParam('id',null));
		$model = Group::model()->findByPk($id);
		if($model === null) {
			$model = new Group();
		}

		if(isset($_POST['Group']))
		{
			$model->attributes=$_POST['Group'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->groupid));
		}

		$this->render('group_update',array(
			'model'=>$model,
		));
	}
    public function actionGroupDelete()
	{
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Group::model()->findByPk($id);
		
		if($model === null) {
			throw new CException('数据不存在');
		}else{
		  $model->delete();
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('groupIndex'));
	}
    
	public function actionGroupView() {
		$id = intval(Yii::app()->request->getParam('id',null));
		$model = Group::model()->findByPk($id);
		
		if($model === null) {
			throw new CException('数据不存在');
		}
		
		$this->render('group_view',array('model' => $model));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User2::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

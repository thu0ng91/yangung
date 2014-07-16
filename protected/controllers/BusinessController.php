<?php
class BusinessController extends CController{

	public function beforeAction(){
		if(!Yii::app()->user->id){
			CV::showmsg('请先登录',Yii::app()->createUrl('site/login'));
			Yii::app()->end();
		}
		return true;
	}
	public function actionCenter(){
		$your = Authorizer::model()->findAllByAttributes(array('uid'=>Yii::app()->user->id));
		
		$this->render('index',array('your'=>$your));
	}
	public function actionAdd(){
		if(Yii::app()->request->isPostRequest){
			$url = Yii::app()->request->getParam('url',null);
			if(null == $url){
				CV::showmsg('域名不能为空',Yii::app()->createUrl('business/add'));
			}
			$model = new Authorizer();
			$model->username = Yii::app()->user->name;
			$model->uid = Yii::app()->user->id;
			$model->url = $url;
			$model->version = '1.0';
			$model->type = 1;
			$model->dateline = time();
			$model->sqm = $this->create_sqm($url);
			if($model->save()){
				CV::showmsg('增加新域名授权成功',Yii::app()->createUrl('business/center'));
			}
			CV::showmsg('域名授权未成功，请联系官方',Yii::app()->createUrl('business/center'));
		}
		$this->render('add');
	}
	public function actionDownload(){
		echo 'download';
	}
	public function actionComment(){
		echo 'comment';
	}
	public function create_sqm($url) {
	    
	    $data = $url;
	    $data .= $_SERVER['REQUEST_TIME'];
	    $data .= $_SERVER['HTTP_USER_AGENT'];
	    $data .= $_SERVER['LOCAL_ADDR'];
	    $data .= $_SERVER['LOCAL_PORT'];
	    $data .= $_SERVER['REMOTE_ADDR'];
	    $data .= $_SERVER['REMOTE_PORT'];
	    
	    $hash = strtoupper(hash('yacms123321', $uid . $guid . md5($data)));
	    $sqm = substr($hash, 0, 8). substr($hash, 8, 4). substr($hash, 12, 4). substr($hash, 16, 4). substr($hash, 20, 12);
	    
	    return $sqm;
	}
}
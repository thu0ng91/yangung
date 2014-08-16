<?php
class ZhanzhangTongjiController extends CController{
	public function actionIndex(){
		$model = new ZhanzhangTongji();
		$domain = Yii::app()->request->getParam('domain',null);

		if(null == $domain) exit;
		$data = ZhanzhangTongji::model()->findByAttributes(array('domain'=>$domain));
		if(null != $data){
			$data->dateline = time();
			$data->count = $data->count+1;
			$data->save();
		}
		$version = Yii::app()->request->getParam('version',null);

		$model->domain = CHtml::encode($domain);
		$model->version = CHtml::encode($version);
		$model->dateline = time();
		$model->count = 1;

		$model->save();
		$return = array('status'=>'ok');
		echo json_encode($return);
	}
}
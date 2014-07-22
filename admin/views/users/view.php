<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('index'),
	$model->uid,
);

?>

<h1>查看用户</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'uid',
		'regip',
		array('name'=>'regdate','type'=>'datetime'),
		'username',
		'password',
		'salt',
		'email',
        array('name'=>'groupid','type'=>'raw','value'=>$model->groupName),
		array('name'=>'avatar','type'=>'raw','value'=>CHtml::image($model->userAvatar)),
		'golds',
		array('name'=>'emailstatus','type'=>'raw','value'=>CV::emailStatusStr($model->emailstatus)),
	),
)); ?>

<?php 
echo CHtml::link('修改',Yii::app()->createUrl('users/update',array('id'=>$model->uid)));
?>

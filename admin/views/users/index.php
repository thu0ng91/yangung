<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('index'),
	'管理',
);
?>

<h1>用户管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'uid',
		'username',
		'email',
		'golds',
		//'password',
		'salt',
		/*
		'groupid',
		'avatar',
		*/
		array('name'=>'emailstatus','type'=>'raw','value'=>'CV::emailStatusStr($data->emailstatus)'),
		array('name'=>'regdate','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

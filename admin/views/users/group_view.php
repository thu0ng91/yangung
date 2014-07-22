<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户组'=>array('index'),
	$model->groupid,
);

?>

<h1>查看用户组</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'groupid',
		'name',
		'creditsfrom',
		'creditsto',
        array('name'=>'allowread','type'=>'raw','value'=>CV::statusStr($model->allowread)),
        array('name'=>'allowpost','type'=>'raw','value'=>CV::statusStr($model->allowpost)),
        array('name'=>'allowreply','type'=>'raw','value'=>CV::statusStr($model->allowreply)),
        array('name'=>'allowattach','type'=>'raw','value'=>CV::statusStr($model->allowattach)),
        array('name'=>'allowdown','type'=>'raw','value'=>CV::statusStr($model->allowdown)),
        array('name'=>'allowtop','type'=>'raw','value'=>CV::statusStr($model->allowtop)),
        array('name'=>'allowdigest','type'=>'raw','value'=>CV::statusStr($model->allowdigest)),
        array('name'=>'allowupdate','type'=>'raw','value'=>CV::statusStr($model->allowupdate)),
        array('name'=>'allowdelete','type'=>'raw','value'=>CV::statusStr($model->allowdelete)),
		'version_nums',
	),
)); ?>
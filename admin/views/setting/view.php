<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	$model->id,
);

?>

<h1>查看设置</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'identifier',
		'skey',
		array('name'=>'svalue','type'=>'raw','value'=>nl2br($model->getFormatContent($model->svalue))),
	),
)); ?>
<?php 
echo CHtml::link('修改',Yii::app()->createUrl('setting/update',array('id'=>$model->id)));
?>
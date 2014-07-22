<?php
/* @var $this NoticeController */
/* @var $model Notice */

$this->breadcrumbs=array(
	'Notices'=>array('index'),
	$model->title,
);

?>

<h1>View Notice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'url',
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>
<?php 
echo CHtml::link('修改',Yii::app()->createUrl('notice/update',array('id'=>$model->id)),array('style'=>'padding:'));
?>
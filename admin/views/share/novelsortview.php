<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'小说分享'=>array('index'),
	'小说分类'=>array('novelSortIndex'),
	$model->name,
);
?>

<h1>View Share #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'sequence',
		'isnav',
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>

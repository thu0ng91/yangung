<?php
/* @var $this ShareUploadsController */
/* @var $model ShareUploads */

$this->breadcrumbs=array(
	'Share Uploads'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ShareUploads', 'url'=>array('index')),
	array('label'=>'Create ShareUploads', 'url'=>array('create')),
	array('label'=>'Update ShareUploads', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShareUploads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShareUploads', 'url'=>array('admin')),
);
?>

<h1>View ShareUploads #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'size',
		'dateline',
	),
)); ?>

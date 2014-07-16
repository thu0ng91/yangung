<?php
/* @var $this ShareUploadsController */
/* @var $model ShareUploads */

$this->breadcrumbs=array(
	'Share Uploads'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShareUploads', 'url'=>array('index')),
	array('label'=>'Create ShareUploads', 'url'=>array('create')),
	array('label'=>'View ShareUploads', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ShareUploads', 'url'=>array('admin')),
);
?>

<h1>Update ShareUploads <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
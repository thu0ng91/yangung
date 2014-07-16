<?php
/* @var $this ShareUploadsController */
/* @var $model ShareUploads */

$this->breadcrumbs=array(
	'Share Uploads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ShareUploads', 'url'=>array('index')),
	array('label'=>'Manage ShareUploads', 'url'=>array('admin')),
);
?>

<h1>Create ShareUploads</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
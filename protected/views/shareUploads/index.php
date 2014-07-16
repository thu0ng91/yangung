<?php
/* @var $this ShareUploadsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Share Uploads',
);

$this->menu=array(
	array('label'=>'Create ShareUploads', 'url'=>array('create')),
	array('label'=>'Manage ShareUploads', 'url'=>array('admin')),
);
?>

<h1>Share Uploads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'小说分享'=>array('index'),
	$model->title,
);
?>

<h1>View Share #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'novelSort.name',
		'title',
		'cover',
		'author',
		'summary',
		array('name'=>'fullflag','type'=>'raw','value'=>CV::fullflagStr($data->fullflag)),
		'postid',
		'poster',
		'attachment',
		array('name'=>'status','type'=>'raw','value'=>CV::statusStr($data->status)),
		'views',
		'votes',
		'price',
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>

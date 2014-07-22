<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'小说分享'=>array('index'),
	'分享管理',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#share-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>分享管理</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'share-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'novelSort.name',
		'title',
		array('name'=>'cover','type'=>'raw','value'=>'$data->shareCover'),
		'author',
		array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
		/*
		'fullflag',
		'postid',
		'poster',
		'attachment',
		'status',
		'dateline',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

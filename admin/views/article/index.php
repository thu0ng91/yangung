<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'title','type'=>'raw','value'=>'$data->articleUrl'),
		'views',
		'votes',
		'author',
		array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
		array('name'=>'istop','type'=>'raw','value'=>'CV::istopStr($data->istop)'),
		array('name'=>'dateline','type'=>'datetime'),
		/*
		'author_id',
		'status',
		'category_id',
		'dateline',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

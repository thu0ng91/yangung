<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'Article Categories'=>array('index'),
	$model->id,
);
?>

<h1>View ArticleCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_name',
		array('name'=>'status','type'=>'raw','value'=>CV::statusStr($model->status)),
		'sequence',
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>
<?php 
echo CHtml::link('修改',Yii::app()->createUrl('article/categoryUpdate',array('id'=>$model->id)));
?>
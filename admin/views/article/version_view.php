<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'版本日志管理'=>array('version'),
	$model->id,
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'price',
		'version_number',
		array('name'=>'posttime','type'=>'datetime'),
		'updatelog',
	),
)); ?>
<?php 
echo CHtml::link('修改',Yii::app()->createUrl('article/versionUpdate',array('id'=>$model->id)));
?>
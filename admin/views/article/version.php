<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'版本日志管理'=>array('version'),
	'管理',
);

?>

<h1>版本日志管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'version-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'price',
		'version_number',
		array('name'=>'posttime','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
			'deleteButtonUrl' => 'Yii::app()->createUrl("article/versionDelete",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("article/versionUpdate",array("id"=>$data->id))',
            'viewButtonUrl' => 'Yii::app()->createUrl("article/versionView",array("id"=>$data->id))',
		),
	),
)); ?>

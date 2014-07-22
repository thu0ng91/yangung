<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'文章分类管理'=>array('index'),
	'管理',
);

?>

<h1>文章分类管理</h1>
<p class="note"><span class="required">*</span> 排序数字越大前台导航显示越前.</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category_name',
		array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
		'sequence',
		array('name'=>'dateline','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
			'deleteButtonUrl' => 'Yii::app()->createUrl("article/categoryDelete",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("article/categoryUpdate",array("id"=>$data->id))',
            'viewButtonUrl' => 'Yii::app()->createUrl("article/categoryView",array("id"=>$data->id))',
		),
	),
)); ?>

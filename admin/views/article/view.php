<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'文章管理'=>array('index'),
	$model->title,
);

?>

<h1>查看文章</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array('name'=>'index_image','type'=>'image'),
		array('name'=>'content','type'=>'raw','value'=>nl2br($model->content)),
		'views',
		'votes',
		'author',
		array('name'=>'status','type'=>'raw','value'=>CV::statusStr($model->status)),
		array('name'=>'category_id','type'=>'raw','value'=>$model->articleCategory),
		array('name'=>'istop','type'=>'raw','value'=>CV::istopStr($model->istop)),
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>
<?php 
echo CHtml::link('修改',Yii::app()->createUrl('article/update',array('id'=>$model->id)));
?>
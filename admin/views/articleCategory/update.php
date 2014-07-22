<?php
/* @var $this ArticleCategoryController */
/* @var $model ArticleCategory */

$this->breadcrumbs=array(
	'Article Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleCategory', 'url'=>array('index')),
	array('label'=>'Create ArticleCategory', 'url'=>array('create')),
	array('label'=>'View ArticleCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleCategory', 'url'=>array('admin')),
);
?>

<h1>Update ArticleCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
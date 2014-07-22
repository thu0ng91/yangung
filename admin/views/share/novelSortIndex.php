<?php
$this->breadcrumbs=array(
	'小说分享'=>array('index'),
	'小说分类'=>array('novelSortIndex'),
);

?>

<h1>分类管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'share-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'sequence',
		'isnav',
		array('name'=>'dateline','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
			'deleteButtonUrl' => 'Yii::app()->createUrl("share/novelSortDelete",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("share/novelSortUpdate",array("id"=>$data->id))',
            'viewButtonUrl' => 'Yii::app()->createUrl("share/novelSortView",array("id"=>$data->id))',
		),
	),
)); ?>

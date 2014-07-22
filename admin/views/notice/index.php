<?php
$this->breadcrumbs=array(
	'通告'=>array('index'),
	'管理',
);
?>

<h1>通告管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'notice-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'url',
        array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
        array('name'=>'dateline','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

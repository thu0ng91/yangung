<?php
$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	'管理',
);
?>

<h1>友情链接管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'friendlink-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array('name'=>'logo','type'=>'image'),
		array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
		array('name'=>'type','type'=>'raw','value'=>'CV::friendTypeStr($data->type)'),
		'sequence',
		array('name'=>'dateline','type'=>'datetime'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

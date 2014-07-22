<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	'管理',
);

?>

<h1>系统设置</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'identifier',
		'skey',
		array('name'=>'svalue','type'=>'raw','value'=>'nl2br($data->getFormatContent($data->svalue))'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

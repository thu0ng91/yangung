<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	'导航管理',
);

?>

<h1>导航列表</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setting-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'url',
		array('name'=>'status','type'=>'raw','value'=>'CV::statusStr($data->status)'),
		array('name'=>'target','type'=>'raw','value'=>'CV::targetStatusStr($data->target)'),
		'sequence',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl' => 'Yii::app()->createUrl("setting/navDelete",array("id"=>$data->id))',
            'updateButtonUrl' => 'Yii::app()->createUrl("setting/navupdate",array("id"=>$data->id))',
		),
	),
)); ?>

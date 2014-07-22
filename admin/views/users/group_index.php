<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户组'=>array('index'),
	'管理',
);

?>

<h1>用户组管理</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'groupid',
		'name',
		'creditsfrom',
		'creditsto',
        array('name'=>'allowread','type'=>'raw','value'=>'CV::statusStr($data->allowread)'),
        array('name'=>'allowpost','type'=>'raw','value'=>'CV::statusStr($data->allowpost)'),
        array('name'=>'allowreply','type'=>'raw','value'=>'CV::statusStr($data->allowreply)'),
        array('name'=>'allowattach','type'=>'raw','value'=>'CV::statusStr($data->allowattach)'),
        array('name'=>'allowdown','type'=>'raw','value'=>'CV::statusStr($data->allowdown)'),
        array('name'=>'allowtop','type'=>'raw','value'=>'CV::statusStr($data->allowtop)'),
        array('name'=>'allowdigest','type'=>'raw','value'=>'CV::statusStr($data->allowdigest)'),
        array('name'=>'allowupdate','type'=>'raw','value'=>'CV::statusStr($data->allowupdate)'),
        array('name'=>'allowdelete','type'=>'raw','value'=>'CV::statusStr($data->allowdelete)'),
        array(
			'class'=>'CButtonColumn',
            'template'=>'{view} {update} {delete}',
        	'deleteButtonUrl' => 'Yii::app()->createUrl("users/groupDelete",array("id"=>$data->groupid))',
            'updateButtonUrl' => 'Yii::app()->createUrl("users/groupUpdate",array("id"=>$data->groupid))',
            'viewButtonUrl' => 'Yii::app()->createUrl("users/groupView",array("id"=>$data->groupid))',
            'buttons'=>array(
                'update'=>array(
                    'options'=>array('target'=>"_blank"),
                ),
            ),
		),
	),
)); ?>

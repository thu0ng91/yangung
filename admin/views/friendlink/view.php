<?php
/* @var $this FriendlinkController */
/* @var $model Friendlink */

$this->breadcrumbs=array(
	'友情链接'=>array('index'),
	$model->name,
);

?>

<h1>查看链接</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array('name'=>'name','type'=>'raw','value'=>$model->linkStr),
		'description',
		array('name'=>'logo','type'=>'image'),
		'sequence',
		array('name'=>'type','type'=>'raw','value'=>CV::friendTypeStr($model->type)),
		array('name'=>'status','type'=>'raw','value'=>CV::statusStr($model->status)),
		array('name'=>'dateline','type'=>'datetime'),
	),
)); ?>
<?php
echo CHtml::link('修改',Yii::app()->createUrl('friendlink/update',array('id'=>$model->id)));
?>

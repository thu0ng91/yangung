<?php
$this->breadcrumbs=array(
	'用户组'=>array('groupIndex'),
	$model->groupid=>array('view','id'=>$model->groupid),
	'更新',
);
?>

<h1>更新</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditsfrom'); ?>
		<?php echo $form->textField($model,'creditsfrom',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'creditsfrom'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'creditsto'); ?>
		<?php echo $form->textField($model,'creditsto',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'creditsto'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'allowread'); ?>
		<?php echo $form->dropDownList($model,'allowread',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowread'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowpost'); ?>
		<?php echo $form->dropDownList($model,'allowpost',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowpost'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowreply'); ?>
		<?php echo $form->dropDownList($model,'allowreply',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowreply'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowattach'); ?>
		<?php echo $form->dropDownList($model,'allowattach',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowattach'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowdown'); ?>
		<?php echo $form->dropDownList($model,'allowdown',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowdown'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowtop'); ?>
		<?php echo $form->dropDownList($model,'allowtop',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowtop'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowdigest'); ?>
		<?php echo $form->dropDownList($model,'allowdigest',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowdigest'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowupdate'); ?>
		<?php echo $form->dropDownList($model,'allowupdate',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowupdate'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'allowdelete'); ?>
		<?php echo $form->dropDownList($model,'allowdelete',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'allowdelete'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'version_nums'); ?>
		<?php echo $form->dropDownList($model,'version_nums',array('1'=>'1','3'=>'3','5'=>'5','10'=>'10')); ?>
		<?php echo $form->error($model,'version_nums'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
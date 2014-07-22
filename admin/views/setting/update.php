<?php
$this->breadcrumbs=array(
	'系统设置'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'更新',
);

?>

<h1>更新</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'identifier'); ?>
		<?php echo $form->textField($model,'identifier',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'identifier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skey'); ?>
		<?php echo $form->textField($model,'skey',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'skey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'svalue'); ?>
		<?php echo $form->textArea($model,'svalue',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'svalue'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
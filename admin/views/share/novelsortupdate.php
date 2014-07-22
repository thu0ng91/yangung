<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'小说分享'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>增加小说分类</h1>

<?php
/* @var $this ShareController */
/* @var $model Share */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'share-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'sequence'); ?>
		<?php echo $form->textField($model,'sequence'); ?>
		<?php echo $form->error($model,'sequence'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'isnav'); ?>
		<?php echo $form->dropDownList($model,'isnav',array('1'=>'导航显示','0'=>'不在导航显示')); ?>
		<?php echo $form->error($model,'isnav'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
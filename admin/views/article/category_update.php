<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'文章分类'=>array('articleCategory'),
	$model->id=>array('categoryView','id'=>$model->id),
	'Update',
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_name'); ?>
		<?php echo $form->textField($model,'category_name',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'category_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'sequence'); ?>
		<?php echo $form->textField($model,'sequence',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'sequence'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
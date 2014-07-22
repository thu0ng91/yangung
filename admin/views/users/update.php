<?php
$this->breadcrumbs=array(
	'用户'=>array('index'),
	$model->uid=>array('view','id'=>$model->uid),
	'更新',
);
?>

<h1>更新</h1>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>不修改密码请勿动
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>8,'maxlength'=>8)); ?>不修改密码请勿动
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'groupid'); ?>
		<?php echo $form->dropDownList($model,'groupid',$group); ?>
		<?php echo $form->error($model,'groupid'); ?>
	</div>
	<?php if(!empty($model->avatar)){
		$image = $model->getUserAvatar();
		echo CHtml::image($image,'');
	}?>
	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->fileField($model,'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'golds'); ?>
		<?php echo $form->textField($model,'golds',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'golds'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'emailstatus'); ?>
		<?php echo $form->dropDownList($model,'emailstatus',array('1'=>'已认证','0'=>'未认证')); ?>
		<?php echo $form->error($model,'emailstatus'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
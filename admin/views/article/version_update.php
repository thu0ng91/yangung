<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'版本日志管理'=>array('version'),
	$model->id=>array('versionView','id'=>$model->id),
	'Update',
);
?>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version_number'); ?>
		<?php echo $form->textField($model,'version_number',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'version_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
    <!-- 配置文件 -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/themes/ueditor/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/themes/ueditor/ueditor.all.js"></script>
	<!-- 语言包文件(建议手动加载语言包，避免在ie下，因为加载语言失败导致编辑器加载失败) -->
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/themes/ueditor/lang/zh-cn/zh-cn.js"></script>
	<div class="row">
			<?php echo $form->labelEx($model,'updatelog'); ?>
	<script id="container" name="Version[updatelog]" type="text/plain" style="height:250px;">
		<?php echo $model->updatelog;?>
	</script>
	<script type="text/javascript">
		var editor = UE.getEditor('container');
	</script>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
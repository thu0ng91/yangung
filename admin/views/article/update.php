<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'文章管理'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'更新',
);

?>

<h1>更新文章</h1>

<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<?php if(!empty($model->index_image)){
		echo CHtml::image($model->index_image,'');
	}?>
	<div class="row">
		<?php echo $form->labelEx($model,'index_image'); ?>
		<?php echo $form->fileField($model,'index_image'); ?>
		<?php echo $form->error($model,'index_image'); ?>
	</div>
	<!-- 配置文件 -->
	<script type="text/javascript" src="/themes/ueditor/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="/themes/ueditor/ueditor.all.js"></script>
	<!-- 语言包文件(建议手动加载语言包，避免在ie下，因为加载语言失败导致编辑器加载失败) -->
	<script type="text/javascript" src="/themes/ueditor/lang/zh-cn/zh-cn.js"></script>
	<div class="row">
			<?php echo $form->labelEx($model,'content'); ?>
	<script id="container" name="Article[content]" type="text/plain" style="height:250px;">
		<?php echo $model->content;?>
	</script>
	<script type="text/javascript">
		var editor = UE.getEditor('container');
	</script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'views'); ?>
		<?php echo $form->textField($model,'views',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'views'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'votes'); ?>
		<?php echo $form->textField($model,'votes',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'votes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',array('1'=>'开启','2'=>'关闭')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'istop'); ?>
		<?php echo $form->dropDownList($model,'istop',array('0'=>'未置顶','1'=>'已置顶')); ?>
		<?php echo $form->error($model,'istop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',$categories); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
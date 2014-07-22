<?php
/* @var $this ShareController */
/* @var $model Share */

$this->breadcrumbs=array(
	'Shares'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update Share <?php echo $model->id; ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'share-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
<table cellpadding="2" cellspacing="1" border="0" width="95%" class="table_member">
	<?php echo $form->errorSummary($model); ?>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>分类&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->dropDownList($model,'sortid',$sort); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>标题&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100,'class'=>'input')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>小说封面&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->fileField($model,'cover'); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>原作者&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>100,'class'=>'input')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>简介&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textArea($model,'summary',array('style'=>'height:100px;width:350px;')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>全本&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->radioButtonList($model,'fullflag',array('1'=>'连载','2'=>'全本')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>状态&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->radioButtonList($model,'status',array('1'=>'通过','2'=>'不通过')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>点击数&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textField($model,'views',array('size'=>60,'maxlength'=>100,'class'=>'input')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>下载所需积分&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textField($model,'price',array('size'=>60,'maxlength'=>100,'class'=>'input')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>推荐数&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->textField($model,'votes',array('size'=>60,'maxlength'=>100,'class'=>'input')); ?></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>上传TXT文本&nbsp;</td>
		<td colspan="2" class="member_input"> <?php echo $form->fileField($model,'attachment'); ?></td>
	</tr>
	<tr> 
        <td class="member_text"></td>
	    <td class="member_submit"><input type="submit" name="Submit" value="提交信息" class="submit"></td>
    </tr>
</table>
<?php $this->endWidget(); ?>

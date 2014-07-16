<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/user.css" />

<div class="sidebar inner">

    <div class="sb_nav">
		<div class="sb_nav_box">
			<?php $this->Widget('application.widgets.UserinfosideWidget'); ?>
			<?php //$this->endWidget(); ?>			
		</div>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo '/userinfo/';?>">会员中心</a></div>
			<span>修改头像</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">

<h3 class="hrtl line"><span>当前头像</span></h3>
<div class="hrtl_texts">
	<?php if(!empty($model->avatar)){ echo CHtml::image($model->userAvatar,$model->username,array('style'=>'width:80px;height:80px'));}else{echo '您还没有设置头像';};?>
</div>
<h3 class="hrtl line"><span>上传头像</span></h3>
<div class="hrtl_texts">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>
<table cellpadding="2" cellspacing="1" border="0" width="95%" class="table_member">
	<tr>
		<td colspan="2" class="member_input"><?php echo $form->fileField($model,'avatar'); ?></td>
	</tr>
	<tr>
	    <td class="member_submit"><input type="submit" name="Submit" value="提交信息" class="submit"></td>
    </tr>
</table>
<?php $this->endWidget(); ?>
</div>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
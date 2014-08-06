<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/user.css" />
<div class="sidebar inner">


    <div class="sb_box" >
        <div class="active" id="memberbox">

<div class="main_deng">
   <div class="login_top">会员登录</div>
   <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<?php echo $form->errorSummary($model); ?>
		<label>
			<span><font color="#FF0000">*</font>会员名</span>
			<?php echo $form->textField($model,'username',array('class'=>'input_text')); ?>
		</label>
	
		<label>
			<span><font color="#FF0000">*</font>密码</span>
			<?php echo $form->passwordField($model,'password',array('class'=>'input_text')); ?>
		</label>
	
		<div class="member_login_submit">
			<?php echo CHtml::submitButton('登录'); ?><span><a href="<?php echo Yii::app()->createUrl('member/resetpw');?>">忘记密码？</a></span>
		</div>
	
	<?php $this->endWidget(); ?>
	<?php $bbs = Headnav::model()->findByAttributes(array('name'=>'交流论坛'));?>
	<div class="member_login_register"><a href="<?php echo $bbs->url;?>/member.php?mod=register">立即注册</a></div>
<?php $this->widget('ext.oauthLogin.OauthLogin',array(
							   'itemView'=>'medium_login', //效果样式
							   'back_url'=>Yii::app()->homeUrl,//login成功后返回的页面
					 )); ?>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>

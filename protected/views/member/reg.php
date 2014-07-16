<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/user.css" />
<div class="sidebar inner">

    <div class="sb_box" >

        <div class="active" id="memberbox">

<div class="main_deng">
   <div class="login_top">会员注册</div>
   <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<?php echo $form->errorSummary($model); ?>
		<label>
			<span><font color="#FF0000">*</font>用户名</span>
			<?php echo $form->textField($model,'username',array('class'=>'input_text')); ?>
		</label>
	
		<label>
			<span><font color="#FF0000">*</font>密码</span>
			<?php echo $form->passwordField($model,'password',array('class'=>'input_text')); ?>
		</label>
		<label>
			<span><font color="#FF0000">*</font>重复密码</span>
			<?php echo $form->passwordField($model,'password2',array('class'=>'input_text')); ?>
		</label>
		<label>
			<span><font color="#FF0000">*</font>邮件地址</span>
			<?php echo $form->textField($model,'email',array('class'=>'input_text')); ?>
		</label>
		<div class="member_login_submit">
			<?php echo CHtml::submitButton('注册'); ?>
		</div>
	
	<?php $this->endWidget(); ?>
	<div class="member_login_register"><a href="<?php echo Yii::app()->createUrl('site/login');?>">已经注册？</a></div>
<?php $this->widget('ext.oauthLogin.OauthLogin',array(
							   'itemView'=>'medium_login', //效果样式
							   'back_url'=>Yii::app()->homeUrl,//login成功后返回的页面
					 )); ?>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>

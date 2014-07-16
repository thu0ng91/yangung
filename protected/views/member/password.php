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
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo Yii::app()->createUrl('member/userinfo');?>">会员中心</a></div>
			<span>修改密码</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>
<table cellpadding="2" cellspacing="1" border="0" width="95%" class="table_member">
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>原密码&nbsp;</td>
		<td colspan="2" class="member_input"> <input name="User[password]" type="text" class="input" size="20" maxlength="20" value=""></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>新密码&nbsp;</td>
		<td colspan="2" class="member_input"> <input name="User[newpw]" type="text" class="input" size="20" maxlength="20" value=""></td>
	</tr>
	<tr> 
		<td class="member_text"><font color="#FF0000">*</font>重复新密码&nbsp;</td>
		<td colspan="2" class="member_input"> <input name="User[newpw2]" type="text" class="input" size="20" maxlength="20" value=""></td>
	</tr>
	<tr> 
        <td class="member_text"></td>
	    <td class="member_submit"><input type="submit" name="Submit" value="提交信息" class="submit"></td>
    </tr>
</table>
<?php $this->endWidget(); ?>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
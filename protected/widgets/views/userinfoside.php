<h3 class='title'><span>功能中心</span></h3>
<div class="active" id="sidebar" data-csnow="221" data-class3="0" data-jsok="">
	<dl class='membernavlist'>
		<dt><a href='<?php echo Yii::app()->createUrl('member/share');?>'>我的授权</a></dt>
		<dt><a href='<?php echo Yii::app()->createUrl('member/myshare');?>'>增加授权</a></dt>
		<dt ><a href='<?php echo Yii::app()->createUrl('member/bookcase');?>' rel='nofollow'>下载版本</a></dt>
		<dt ><a href='<?php echo Yii::app()->createUrl('member/mycomment');?>' rel='nofollow'>有问必答</a></dt>		
	</dl>
	<div class="clear"></div>
</div>
<div style="height:10px;"></div>
<h3 class='title'><span>会员中心</span></h3>
<div class="active" id="sidebar" data-csnow="221" data-class3="0" data-jsok="">
	<dl class='membernavlist'>
		<dt><a href='<?php echo Yii::app()->createUrl('member/userinfo');?>' title='基本信息'>会员中心</a></dt>
		<dt><a href='<?php echo Yii::app()->createUrl('member/edit');?>' title='基本信息'>修改资料</a></dt>
		<dt ><a href='<?php echo Yii::app()->createUrl('member/password');?>' rel='nofollow' title='修改密码'>修改密码</a></dt>
		<dt ><a href='<?php echo Yii::app()->createUrl('member/avatar');?>' rel='nofollow' title='修改头像'>修改头像</a></dt>		
		<dt ><a href='<?php echo Yii::app()->createUrl('member/email');?>' rel='nofollow' title='验证邮箱'>验证邮箱</a></dt>
		<?php if (!empty(Yii::app()->user->id)):?><dt><a href='<?php echo Yii::app()->createUrl('site/logout');?>' title='安全退出'>安全退出</a></dt><?php endif;?>
	</dl>
	<div class="clear"></div>
</div>
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
			<span>会员中心</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">

<h3 class="hrtl"><span>基本信息</span></h3>
<ul class="hrtl_txt">
	<li><em>用户名</em> <span><?php echo $user->username;?></span></li>
	<li><em>用户组</em> <span><?php echo $user->group->name;?></span></li>
	<li><em>积分</em> <span><?php echo $user->golds;?></span></li>
	<li><em>邮件地址</em> <span><?php echo CHtml::mailto($user->email,$user->email);?></span></li>
	<li><em>账户注册时间</em> <span><?php echo date('Y-m-d H:i:s',$user->regdate);?></span></li>
</ul>
<h3 class="hrtl line"><span>当前头像</span></h3>
<div class="hrtl_texts">
	<?php if(!empty($user->avatar)){ echo CHtml::image($user->userAvatar,$user->username,array('style'=>'width:80px;height:80px'));}else{echo '您还没有设置头像，'.CHtml::link('现在上传？',Yii::app()->createUrl('member/avatar'),array('style'=>'color:#dd650f'));};?>
</div>
<h3 class="hrtl line"><span>会员公告</span></h3>
<div class="hrtl_texts">
欢迎注册成为会员！
</div>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
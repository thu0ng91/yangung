<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/user.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/index.css" />
<div class="sidebar inner">

    <div class="sb_nav">
		<div class="sb_nav_box">
			<?php $this->Widget('application.widgets.UserinfosideWidget'); ?>
			<?php //$this->endWidget(); ?>			
		</div>
    </div>

    <div class="sb_box" style="float:right;width:790px;" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo Yii::app()->createUrl('member/userinfo');?>">会员中心</a></div>
			<span>增加域名授权</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">
<div class="main_deng">
   <div class="login_top">增加域名授权</div>
   <form action="<?php echo Yii::app()->createUrl('business/add');?>" method="post" style="padding:10px;">
   		<label>
			<span><font color="#FF0000">*</font>版本:</span>
			<select name="version" class='input_text'>
				<?php foreach($version as $v):?>
				<option value ="<?php echo $v->version_number;?>"><?php echo $v->title;?></option>
				<?php endforeach;?>
			</select>
		</label>
   		
		<label>
			<span><font color="#FF0000">*</font>新域名:</span>
			<input name="url" type="text" value="" class='input_text'>
		</label>
		
		<div class="member_login_submit">
			<?php echo CHtml::submitButton('提交'); ?>
		</div>
		<p style="color:red;text-align: center;">*不需要http://<br />*请注意您可以增加的域名总数，谨慎添加</p>
   </form>
</div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
</div></div>
<link rel="stylesheet" type="text/css"
	href="<?php
	echo Yii::app ()->request->baseUrl;
	?>/css/yacms/css/user.css" />
<link rel="stylesheet" type="text/css"
	href="<?php
	echo Yii::app ()->request->baseUrl;
	?>/css/yacms/css/index.css" />
<style>
.submitinput {
background: #fb8407 url(../images/min-login2.gif) repeat-x left;
border: 1px solid #cf4500;
padding: 1px 5px;
border-radius: 5px;
color: #fff;
cursor: pointer;
font-size: 12px;
}
</style>
<div class="sidebar inner">

<div class="sb_nav">
<div class="sb_nav_box">
			<?php
			$this->Widget ( 'application.widgets.UserinfosideWidget' );
			?>
			<?php //$this->endWidget(); 			?>			
		</div>
</div>

<div class="sb_box" style="float: right; width: 790px;">
<h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a
	href="<?php
	echo Yii::app ()->createUrl ( 'member/userinfo' );
	?>">会员中心</a></div>
<span>域名授权查询</span></h3>
<table style="border:1px #ccc solid;padding:10px;margin:10px 0;width:790px;">
	<tr style="height:30px;line-height: 30px;border-bottom:1px #ccc solid;">
	<th style="width:6%">序号</th>
	<th style="width:20%">域名</th>
	<th style="width:15%">时间</th>
	<th style="width:9%">类型</th>
	<th style="width:9%">版本</th>
	<th style="width:30%">授权码</th>
	<th style="width:9%">操作</th>
	</tr>
	<?php $i=1; foreach($your as $v):?>
	<tr style="border-bottom:1px dashed #ccc;">
		<td style="text-align:center;"><?php echo $i++;?></td>
		<td style="text-align:center;"><?php echo $v->url;?></td>
		<td style="text-align:center;"><?php echo date('Y-m-d H:i:s',$v->dateline);?></td>
		<td style="text-align:center;"><?php echo Authorizer::getVersion($v->version);?></td>
		<td style="text-align:center;"><?php echo $v->version;?></td>
		<td style="text-align:center;"><?php echo $v->sqm;?></td>
		<td style="text-align:center;"><a href="<?php echo Yii::app()->createUrl('business/add',array('id'=>$v->id, 'reset'=>1));?>" class="submitinput">重新授权</a></td>
	</tr>
	<?php endforeach;?>
</table>
<div class="active" id="memberbox">
<div id="member_basic">
<div class="main_deng">
<div class="login_top">域名授权查询</div>
<form action="<?php
echo Yii::app ()->createUrl ( 'business/index' );
?>"
	method="post" style="padding: 10px;"><label> <span><font
	color="#FF0000">*</font>域名:</span> <input name="url" type="text"
	value="" class='input_text'> </label>
<div class="member_login_submit">
			<?php
			echo CHtml::submitButton ( '提交' );
			?>
		</div>

</form>
</div>
</div>
</div>
<div style="clear: both;"></div>
</div>
</div>
</div>
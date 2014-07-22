<?php
$os = ini_get_all();
?>
<style>
<!--
.title{border-bottom:1px #ccc solid;height:25px;color:#fff;font-size:12px;line-height:25px;text-align:center;}
.left,.right{height:30px;line-height:30px;}
.left{width:30%;border-bottom:1px #ccc dashed;text-align:right;}
.right{width:68%;border-bottom:1px #ccc dashed;text-align:left;float:left;}
-->
</style>
<div style="border:1px solid #C9E0ED;height:120px;margin-top:10px;">
	<div id="mainmenu" class="title">您的信息</div>
	<div>
		<div class="left">您的IP</div><div class="right"><?php echo $_SERVER['REMOTE_ADDR'];?></div>
		<div class="left">您的浏览器信息</div><div class="right"><?php echo $_SERVER['HTTP_USER_AGENT'];?></div>
	</div>
</div>
<div style="border:1px solid #C9E0ED;height:460px;margin-top:10px;">
	<div id="mainmenu" class="title">当前环境信息</div>
	<div>
		<div class="left">当前域名</div><div class="right"><?php echo $_SERVER['SERVER_NAME'];?></div>
		<div class="left">安装目录</div><div class="right"><?php echo $_SERVER['DOCUMENT_ROOT'] ;?></div>
		<div class="left">PHP版本号</div><div class="right"><?php echo PHP_VERSION ;?></div>
		<div class="left">操作系统</div><div class="right"><?php echo PHP_OS;echo '('.php_uname('r').')';?></div>
		<div class="left">服务器IP</div><div class="right"><?php echo GetHostByName($_SERVER['SERVER_NAME']);?></div>
		<div class="left">Web端口</div><div class="right"><?php echo $_SERVER['SERVER_PORT'];?></div>
		<div class="left">max_execution_time</div><div class="right"><?php echo $os['max_execution_time']['local_value'];?>秒 (建议为10秒)</div>
		<div class="left">max_input_time</div><div class="right"><?php echo $os['max_input_time']['local_value'];?>秒</div>
		<div class="left">upload_max_filesize</div><div class="right"><?php echo $os['upload_max_filesize']['local_value'];?></div>
		<div class="left">post_max_size</div><div class="right"><?php echo $os['post_max_size']['local_value'];?></div>
		<div class="left">memory_limit</div><div class="right"><?php echo $os['memory_limit']['local_value'];?> (建议为10M)</div>
		<div class="left">allow_url_fopen</div><div class="right"><?php echo $os['post_max_size']['local_value']==1?'开启(建议不要开启，某些主机会导致CPU 100%，并且导致不安全)':'关闭';?></div>
		<div class="left">disable_functions</div><div class="right" style="word-wrap: break-word;"><?php echo $os['disable_functions']['local_value'];?></div>
	</div>
</div>
<div style="border:1px solid #C9E0ED;height:200px;margin-top:10px;">
	<div id="mainmenu" class="title">开发者信息</div>
	<div>
		<div class="left">开发者</div><div class="right">cz2051#163.com</div>
		<div class="left">官方站点</div><div class="right"><a href="http://www.yacms.com">http://www.yacms.com</a> | <a href="http://www.mxphp.com">http://www.mxphp.com</a></div>
		<div class="left">联系方式</div><div class="right">QQ：5524812 81169969</div>
		<div class="left">交流ＱＱ群</div><div class="right">4359238</div>
		<div class="left">感谢</div><div class="right">所有曾经帮助过我的人</div>
	</div>
</div>
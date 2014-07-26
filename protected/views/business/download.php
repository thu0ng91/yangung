<link rel="stylesheet" type="text/css"
	href="<?php
	echo Yii::app ()->request->baseUrl;
	?>/css/yacms/css/user.css" />
<link rel="stylesheet" type="text/css"
	href="<?php
	echo Yii::app ()->request->baseUrl;
	?>/css/yacms/css/index.css" />
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
	echo Yii::app ()->createUrl ( 'business/center' );
	?>">授权中心</a></div>
<span>版本下载</span></h3>

<div class="active" id="memberbox">
<div id="member_basic">
<?php foreach($data as $v):?>
<a href="<?php echo Yii::app()->createUrl('business/dodownload',array('uid'=>Yii::app()->user->id,'time'=>time(),'version'=>$v->version_number));?>"><?php echo $v->title;?></a>
<?php endforeach;?>
</div>
</div>
<div style="clear: both;"></div>
</div>
</div>
</div>
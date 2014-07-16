<!DOCTYPE html>
<html>
  <head>
    <!--[if gte IE 9]><html class="ie9"><![endif]-->
    <!--[if IE 8]><html class="ie8"><![endif]-->
    <!--[if IE 7]><html class="ie7"><![endif]-->
    <!--[if lt IE 7]><html class="ie6"><![endif]-->
    <meta charset="UTF-8">
    <meta content="IE=edge, chrome=1" http-equiv="X-UA-Compatible">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="favicon.ico" rel="shortcut icon" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!--[if lt IE 7]><script>try{ document.execCommand("BackgroundImageCache", false, true); } catch(e){};</script><![endif]-->
        <link href="<?php echo Yii::app()->baseUrl;?>/css/yunyue/reset.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->baseUrl;?>/css/yunyue/style.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/index.css" />
  </head>
  <body>
    <div class="container">
      <div id="header" class="clearfix">
        <div id="top" class="wp clearfix">
          <h1 id="logo"><a href="/"><?php echo Yii::app()->params['sitename']?></a></h1>
          <?php
		$nav = Headnav::model()->findAllByAttributes(array('status'=>1),array('order'=>'sequence ASC','limit'=>6));


		foreach($nav as $value){
			$menu[$value->id] = $value;
		}
	?>
          <ul id="nav">
				<li class="<?php if(empty($_GET['r'])) echo 'current';?>"><a href="/yunyue/index.php">首页</a></li>
				<?php
				 foreach ($menu as $key=>$value){
						$url = Yii::app()->params['site_url'].$value->url;
					?>
					<li <?php if($this->action->id != 'index' && false != strstr($url,$this->action->id)) echo 'class="current"';?>><a href="<?php echo $url;?>" <?php if($value->target == 2):?>target="_blank"<?php endif;?>><?php echo $value->name;?></a></li>
				<?php	} ?>
          </ul>
        </div>
      <!-- /header -->

	<?php echo $content; ?>
	<?php $friendLinks = Friendlink::model()->findAllByAttributes(array('status'=>1),array('order'=>'sequence desc'));?>
<div id="footer" class="clearfix">
        <div id="links">
          <div class="wp">
            <h3>合作伙伴</h3>
            <div class="linklist">
            <ul class="clearfix">
<?php foreach ($friendLinks as $value):?>
<li>
<a href="<?php echo $value->url;?>" target="_blank"><span class="img"><img border="0" alt="<?php echo $value->name;?>" src="http://mobfound.com/images/new/link-1.png" width="155" height="50"></span><span class="label"><?php echo $value->name;?></span></a>
</li>
<?php endforeach;?>
</ul>
            </div>
          </div>
          <div class="ripple"></div>
        </div>
	
        <div id="stuff">
          <div class="wp"><span id="copyright">ICP备案号：沪ICP�?2008408(1/3)</span></div>
        </div>
      </div>
      <!-- /footer -->
    </div>
    <!--[if lt IE 7]><script src="<?php echo Yii::app()->baseUrl;?>/css/yunyue/iepngfix_tilebg.js"></script><![endif]-->
    <script src="<?php echo Yii::app()->baseUrl;?>/css/yunyue/jquery.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/css/yunyue/plugins.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/css/yunyue/script.js"></script>
  </body>
</html>

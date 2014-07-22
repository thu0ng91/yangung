<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style>
	.lefttitle{float:right;margin-right:10px;}
	</style>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->params['sitename']); ?>后台管理系统</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'lastItemCssClass'=>'lefttitle',
			//'encodeLable'=>'true',
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/site/index')),
				array('label'=>'用户', 'url'=>array('/users/index')),
				array('label'=>'通告', 'url'=>array('/notice/index')),
				array('label'=>'文章', 'url'=>array('/article/index')),
				array('label'=>'友链', 'url'=>array('/friendlink/index')),
				array('label'=>'分享', 'url'=>array('/share/index')),
				array('label'=>'设置', 'url'=>array('/setting/index')),
				array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/adminLogout'), 'visible'=>!Yii::app()->user->isGuest,'itmeOptions'=>array('id'=>'lefttitle')),
			),
		)); ?>
		<?php 
			$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
				
				)
			));
		?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo CHtml::link(Yii::app()->params['sitename'],'http://'.Yii::app()->params['siteurl']);?> All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

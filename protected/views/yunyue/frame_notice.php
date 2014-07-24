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
    <title>YACMS - Vs Yunyue</title>
  </head>
  <body>
  <div style="">
		<ul>
			<?php foreach($model as $r):?>
			<li><a href="<?php echo $r->url;?>"><?php echo $r->title;?></a></li>
			<?php endforeach;?>
		</ul>
  </div>
  </body>
</html>
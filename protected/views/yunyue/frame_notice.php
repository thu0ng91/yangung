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
    <title>官方通告</title>
    <style>
		.notice ul li {
			height:25px;
			line-height:25px;
			list-style:none;
			color:#ccc;font-size:12px;
		}
		li em {
			display: inline-block;
			font-size: 10px;
			font-family: Arial;
			color: #999;
			-webkit-transform: scale(0.75);
			font-style: normal;
		}
		li a {color:#666;font-size:14px;text-decoration: NONE;}
		li a:hover{color:#ff7d77;}
	</style>
  </head>
  <body>

  <style>
.lineheight{padding-left:5px;line-height:25px;height:25px;border-bottom:1px #ccc dashed;}
</style>
<table class="tb tb2 fixpadding" style="font-size:12px;width:490px;">
	<tbody>
		<tr><th colspan="3" style="font-size:14px; font-weight:bold;text-align:left;">官方通告</th></tr>
		<?php $i=1; foreach($model as $k=>$r):?>
			<tr style=""><td class="lineheight"><em><?php if($i<9):?>0<?php endif;?><?php echo $i;?>.</em> <?php $i++;?></td>
				<td class="lineheight"><a href="<?php echo $r->url;?>" target="_blank"><?php echo $r->title;?></a>
				<font style="float:right;padding-right:10px;"><?php echo date('Y-m-d H:i:s',$r->dateline);?></font></td>
			</tr>
			<?php endforeach;?>
	</tbody>
</table>
  </body>
</html>
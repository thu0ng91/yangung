<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/yacms/css/user.css" />
<style>
<!--
.tableborder {
border: 0px !important;
empty-cells: show;
border-collapse: separate !important;
border-collapse: collapse;
margin-bottom: 10px;
}
.tableborder td {
line-height: 2em;
padding: 5px 10px;
border-right: 1px solid #F5FCFF;
border-bottom: 1px solid #DDE9F5;
}
.tr_nav {
background: #F5FAFF;
border-bottom: 1px solid #DDE9F5;
color: #008800;
}
-->
</style>
<div class="sidebar inner">

    <div class="sb_nav">
		<div class="sb_nav_box">
			<?php $this->Widget('application.widgets.UserinfosideWidget'); ?>
			<?php //$this->endWidget(); ?>			
		</div>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo '/userinfo/';?>">会员中心</a></div>
			<span>我的分享</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">

<table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
	<thead>
		<tr class="tr_nav">
			<td width="50">ID</td>
			<td width="150">分享标题</td>
			<td>类别</td>
			<td>状态</td>
			<td>积分</td> 
			<td width="108">封面</td>
			<td width="100">时间</td>
			<td width="100">管理</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($shareData as $data):?>
		<tr class="">
			<td><?php echo ++$i?></td>
			<td><?php echo CHtml::link($data->title,'/novelinfo/'.$data->id);?></td>
			<td><?php echo $data->novelSort->name;?></td>
			<td><?php echo CV::fullflagStr($data->fullflag);?></td>
			<td><?php echo $data->price;?></td>
			<td><?php echo CHtml::image('/upload/novel/cover'.CV::getFilePath($data->postid).$data->cover.'.jpg','',array('width'=>'100px'));?></td>
			<td><?php echo date('Y-m-d H:i:s',$data->dateline);?></td>
			<td>
				<a href="<?php echo '/share/'.$data->id;?>">[编辑]</a> | 
				<?php echo CHtml::link('[下载]','/download/'.$data->id);?> 
			</td>
		</tr>
	<?php endforeach;?>
</tbody>
</table>
<div id="pager" style="float:right;">
<?php
$this->widget('CLinkPager',array(
	'header'=>'',
	'firstPageLabel' => '首页',
	'lastPageLabel' => '末页',
	'prevPageLabel' => '上一页',
	'nextPageLabel' => '下一页',
	'pages' => $pages,
	'maxButtonCount'=>13
	)
);
?>
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
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
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo Yii::app()->createUrl('member/userinfo');?>">会员中心</a></div>
			<span>我的书包</span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">

<table id="orderTable" cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
	<thead>
		<tr class="tr_nav">
			<td width="50">ID</td>
			<td width="150">分享标题</td>
			<td>类别</td>
			<td width="50">状态</td> 
			<td width="108">封面</td>
			<td width="100">时间</td>
			<td width="100">管理</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach($data as $data):?>
		<tr class="">
			<td><?php echo ++$i?></td>
			<td><?php echo CHtml::link($data->share->title,'/novelinfo/'.$data->share_id);?></td>
			<td><?php echo $data->share->novelSort->name;?></td>
			<td><?php echo CV::fullflagStr($data->share->fullflag);?></td>
			<td><?php echo CHtml::image('/upload/novel/cover'.CV::getFilePath($data->share->postid).$data->share->cover.'.jpg');?></td>
			<td><?php echo date('Y-m-d H:i:s',$data->dateline);?></td>
			<td>
				<a href="<?php echo Yii::app()->createUrl('novel/bookcaseDel',array('id'=>$data->share->id));?>">[移除]</a> | 
				<?php echo CHtml::link('[下载]','/download'.$data->share->id);?> 
			</td>
		</tr>
	<?php endforeach;?>
</tbody>
</table>

<h3 class="hrtl line"><span>会员公告</span></h3>
<div class="hrtl_texts">
欢迎注册成为会员！
</div>
</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
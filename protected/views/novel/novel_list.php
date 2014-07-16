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
			<?php $this->Widget('application.widgets.NovelSideWidget'); ?>
			<?php //$this->endWidget(); ?>			
		</div>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo '/novellist/'.$sortid;?>"><?php echo $sort->name;?></a></div>
			<span><?php echo $sort->name;?></span>
		</h3>

        <div class="active" id="memberbox">
<div id="member_basic">
<div class="novellist">
			<?php foreach($shareData as $data):?>
				<li><div class="pictext  height114">
			        <div class="pic"><a href="<?php echo '/novelinfo/'.$data->id;?>" title="<?php echo $data->title;?>"><?php echo CHtml::image('/upload/novel/cover'.CV::getFilePath($data->postid).$data->cover.'.jpg',$data->title,array('width'=>100,'height'=>120));?></a></div>
			        <div class="text">
			          <h3>
			          	<a href="<?php echo '/novelinfo/'.$data->id;?>" title="<?php echo $data->title;?>"><?php echo CV::yacmsSubstr($data->title,7);?></a>
			          	<div style="float:right;margin-right:5px;height:20px;line-height:20px;"><?php if($data->price>0):?><font style="font-size:14px;color:red;"><?php echo $data->price;?></font>积分<?php else:?>免费<?php endif;?></div>
					</h3>
			          <p><?php echo CV::yacmsSubstr($data->summary,35);?></p>
			          <div style="float:right;margin-right:5px;"><a href="<?php echo '/novelinfo/'.$data->id;?>" target="_blank">下载&gt;&gt;</a></div>
					</div>
			      </div>
			    </li>
			<?php endforeach;?>
			</div>
<div style="clear:both;"></div>
<div id="pager" style="float:right;margin-top:10px">
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

</div>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
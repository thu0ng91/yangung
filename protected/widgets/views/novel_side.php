<?php $this->Widget('application.widgets.SearchSideWidget'); ?>
<div class="sb_nav_box">
	<h3 class='title' style="margin-top:10px;"><span>最新分享</span></h3>
	<div class="active web_list">
		<ol class="list-none">
			<?php foreach ($lastupdateList as $data):?>
			<li class='n'>
				<a href="<?php echo Yii::app()->createUrl('novel/info',array('id'=>$data->id));?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a>
				<span style="float:right;"><?php echo CV::formatTime($data->dateline);?></span>
			</li>
			<?php endforeach;?>
		</ol>
	</div>
</div>
<div class="sb_nav_box">
<h3 class='title' style="margin-top:10px;"><span>阅读排行</span></h3>
	<div class="active web_list">
		<ol class="list-none">
			<?php foreach ($topviewList as $data):?>
			<li class='n'>
				<a href="<?php echo Yii::app()->createUrl('novel/info',array('id'=>$data->id));?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a>
				<span style="float:right;"><?php echo $data->views;?></span>
			</li>
			<?php endforeach;?>
		</ol>
	</div>
</div>
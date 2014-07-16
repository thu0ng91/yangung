<div class="sb_nav_box">

<?php $this->Widget('application.widgets.SearchSideWidget'); ?>
	<h3 class='title' style="margin-top:10px;"><span>最新文章</span></h3>
	<div class="active web_list">
	<ol class="list-none">
		<?php foreach ($articleList as $data):?>
		<li class='n'>
			<a href="<?php echo Yii::app()->createUrl('article/view',array('id'=>$data->id));?>" title="<?php echo $data->title;?>"><?php echo $data->title;?></a>
		</li>
		<?php endforeach;?>
</ol>
</div>

			
		</div>
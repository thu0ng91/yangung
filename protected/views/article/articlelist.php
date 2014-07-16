<div class="sidebar inner">

    <div class="sb_nav">
		<?php $this->Widget('application.widgets.ArticleSideWidget'); ?>
    </div>

    <div class="sb_box" >
    	<?php if(isset($category) && null != $category):?>
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo Yii::app()->createUrl('article/list',array('category_id'=>$category->id));?>" ><?php echo $category->category_name;?></a></div>
			<span><?php echo $category->category_name;?></span>
		</h3>
		<?php else:?>
		<?php if(isset($_GET['searchword'])):?>
			<h3 class="title">
				<div class="position"><a href="/" title="首页">首页</a> &gt; 搜索</div>
				<span>搜索结果</span>
			</h3>
		<?php else:?>
			<h3 class="title">
				<div class="position"><a href="/" title="首页">首页</a> &gt; 全部文章</div>
				<span>全部文章</span>
			</h3>
		<?php endif;?>
		<?php endif;?>
        <div class="active" id="newslist">
			<?php if(!empty($list)):?>
			<ul class='list-none metlist'>
				<?php foreach ($list as $data):?>
				<li class='list top'><span>[<?php echo date('Y-m-d H:i:s',$data->dateline);?>]</span>
					<a href='<?php echo Yii::app()->createUrl('article/view',array('id'=>$data->id));?>' title='<?php echo $data->title;?>' target='_blank'><?php echo $data->title;?></a>
					<?php if($data->istop == 1):?><img class='listtop' src='/images/top.gif' alt='' /><?php endif;?>
				</li>
				<?php endforeach;?>
			</ul>
			<?php else :?>
			<?php if (isset($_GET['searchword'])):?>
				<div>没有符合搜索条件的结果</div>
			<?php else:?>
				<div>该分类下暂无文章</div>
			<?php endif;?>
			<?php endif;?>
		</div>
		<div id="pager">
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
    <div class="clear"></div>
</div>

<div class="sidebar inner">

    <div class="sb_nav">
		<?php $this->Widget('application.widgets.ArticleSideWidget'); ?>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo Yii::app()->createUrl('article/list',array('category_id'=>$category->id));?>"><?php echo $category->category_name;?></a></div>
			<span><?php echo $category->category_name;?></span>
		</h3>

        <div class="active" id="shownews">
            <h1 class="title"><?php echo $article->title;?></h1>
			<div class="met_hits">
				点击次数：<span><?php echo $article->views;?></span>&nbsp;&nbsp;
				推荐次数：<span><?php echo $article->votes;?></span>&nbsp;&nbsp;
				作者：<span><?php echo $article->author;?></span>&nbsp;&nbsp;
				更新时间：<?php echo date('Y-m-d H:i:s',$article->dateline);?>&nbsp;&nbsp;
			</div>
            <div class="editor">
            	<div><?php echo $article->content;?></div>
            	<div class="clear"></div>
            </div>
            <div class="met_page">
            	上一条：
            	<?php if(isset($preArticle) && !empty($preArticle)):?>
            	<a href="<?php echo Yii::app()->createUrl('article/view',array('id'=>$preArticle['id']));?>" ><?php echo $preArticle['title'];?></a>&nbsp;&nbsp;
            	<?php else:?>
            	没了
            	<?php endif;?>
            	下一条：
            	<?php if(isset($nextArticle) && !empty($nextArticle)):?>
            	<a href=<?php echo Yii::app()->createUrl('article/view',array('id'=>$nextArticle['id']));?> ><?php echo $nextArticle['title'];?></a>
            	<?php else:?>
            	没了
            	<?php endif;?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
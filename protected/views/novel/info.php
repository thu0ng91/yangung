<div class="sidebar inner">

    <div class="sb_nav">
		<?php $this->Widget('application.widgets.NovelSideWidget'); ?>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="/" title="首页">首页</a> &gt; <a href="<?php echo '/novellist/'.$model->sortid;?>"><?php echo $model->novelSort->name;?></a></div>
			<span><?php echo $model->title;?><font style="font-size:12px;color:#777;font-weight:normal;">/著:<?php echo $model->author;?></font></span>
		</h3>
	
        <div class="active" id="shownews">
			<div class="met_hits" style="border-bottom:1px dashed #ccc">
				点击次数：<span><?php echo $model->views;?></span>&nbsp;&nbsp;
				推荐次数：<span><?php echo $model->votes;?></span>&nbsp;&nbsp;
				状态：<span><?php if($model->fullflag==1):?>连载<?php else:?>全本<?php endif;?></span>&nbsp;&nbsp;
				分享者：<span><?php echo $model->poster;?></span>&nbsp;&nbsp;
				类别：<span><?php echo $model->novelSort->name;?></span>&nbsp;&nbsp;
				分享时间：<?php echo date('Y-m-d H:i:s',$model->dateline);?>&nbsp;&nbsp;
			</div>
            <div class="editor">
            <div>
            	<?php echo CHtml::image('/upload/novel/cover'.CV::getFilePath($model->postid).$model->cover.'.jpg',$model->title,array('style'=>'width:100px;height:120px;float:left;margin:10px;'));?>
            	<?php echo $model->summary;?>
            </div>
            	<div class="clear"></div>
            </div>
            <style>
            	#btnnew {float:left;width:80px;margin-left:10px;text-align:center;}
				#newbtn:hover {color:#000;background:#fff;}
				#newbtn {color: #FFF;height:25px;line-height:25px;}
            </style>
            <div>
            	<div id="btnnew"><a href="<?php echo '/novelvote/'.$model->id;?>"><div id="newbtn" style="background: #2b8823;">推荐本书</div></a></div>
            	<div id="btnnew">
            		<?php if(!$bookcase):?>
            		<a href="<?php echo '/bookcase/'.$model->id;?>"><div id="newbtn" style="background: #e5580b;">加入书包</div></a>
            		<?php else:?>
            		<a href="<?php echo Yii::app()->createUrl('novel/bookcaseDel',array('id'=>$model->id));?>"><div id="newbtn" style="background: #2b8823;">拿出书包</div></a>
            		<?php endif;?>
            	</div>
            	<div id="btnnew">
            		<a href="<?php echo '/download/'.$model->id;?>"><div id="newbtn" style="background: #2574fc;">下载TXT</div></a>
				</div>
            </div>
            <div class="clear" style="margin-bottom:10px;"></div>
            <div style="border:1px solid #f6a20f;color:#666;height:25px;line-height: 25px;text-align:center;">分享你喜爱的电子书，可以获得<font style="font-weight:bold;font-size:14px;color:#f70406"><?php echo Yii::app()->params['share_golds'];?></font>个网站积分；当您分享的电子书被下载，也可以获得对应的积分</div>
            <div class="clear" style="border-bottom:1px dashed #ccc;margin-top:35px;"></div>
            <!--兼容版，可保证页面完全兼容-->
			<div id="SOHUCS"></div>
			<script>
			  (function(){
			    var appid = '<?php echo Yii::app()->params['changyan']['appid'];?>',
			    conf = '<?php echo Yii::app()->params['changyan']['appkey'];?>';
			    var doc = document,
			    s = doc.createElement('script'),
			    h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
			    s.type = 'text/javascript';
			    s.charset = 'utf-8';
			    s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
			    h.insertBefore(s,h.firstChild);
			  })()
			</script>
            <div class="met_page">
            	上一条：
            	<?php if(isset($preArticle) && !empty($preArticle)):?>
            	<a href="<?php echo '/novelinfo/'.$preArticle['id'];?>" ><?php echo $preArticle['title'];?></a>&nbsp;&nbsp;
            	<?php else:?>
            	没了
            	<?php endif;?>
            	下一条：
            	<?php if(isset($nextArticle) && !empty($nextArticle)):?>
            	<a href=<?php echo '/novelinfo/'.$nextArticle['id'];?> ><?php echo $nextArticle['title'];?></a>
            	<?php else:?>
            	没了
            	<?php endif;?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="sidebar_search">
<form method="get" action="<?php echo '/search';?>">
<label>请输入搜索关键词...</label>
<input type="hidden" name="r" value="novel/search" />
<input type="text" name="searchword" class="md_serch_txt" value="" />
<input type="submit" value="搜索" class="searchgo">
</form>
</div>
<script type="text/javascript">
function searchzdx(dom,label,color1,color2){
	if(dom.val()=='')label.show();
	dom.focus(function(){
		label.css("color",color2);
	});
	dom.keyup(function(){
		if($(this).val()==''){
			label.show();
		}else{
			label.hide();
		}
	});
	dom.focusout(function(){
		if($(this).val()==''){
		label.show();
		label.css("color",color1);
		}
	});
}
searchzdx($('.sidebar_search .md_serch_txt'),$('.sidebar_search label'),"#666","#aaa");
</script>
<div class="sidebar inner">

    <div class="sb_nav">
		<div class="sb_nav_box">
		


			<h3 class='title'><span>会员中心</span></h3>
			<div class="active" id="sidebar" data-csnow="221" data-class3="0" data-jsok=""><dl class='membernavlist'><dt><a href='basic.php?lang=cn' title='会员中心首页'>会员中心首页</a></dt><dt><a href='editor.php?lang=cn' title='修改基本信息'>修改基本信息</a></dt><dt ><a href='met_shop_orders.php?lang=cn' rel='nofollow' title='我的订单'>我的订单</a></dt><dt ><a href='met_shop_journal.php?lang=cn' rel='nofollow' title='财务管理'>财务管理</a></dt><dt ><a href='met_shop_goods.php?lang=cn' rel='nofollow' title='我的产品'>我的产品</a></dt><dt><a href='login_out.php?lang=cn' title='安全退出'>安全退出</a></dt></dl><div class="clear"></div></div>



			
		</div>
    </div>

    <div class="sb_box" >
	    <h3 class="title">
<div class="position"><a href="http://www.metinfo.cn/" title="首页">首页</a> &gt; <a href=../member/ >会员中心</a></div>
			<span>会员中心</span>
		</h3>

        <div class="active" id="memberbox">
            
<link href="../member/templates/met/css/style.css" rel="stylesheet" />
<form method="POST" name="myform" action="save.php?action=editor" target="_self">
		<input name="useid" type="hidden"size="20" maxlength="20" value="go123">
		<input name="lang" type="hidden" value="cn">
<table cellpadding="2" cellspacing="1" border="0" width="95%" class="table_member">
          <tr> 
            <td class="member_text"><font color="#FF0000">*</font>用户名&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="useid" type="text" class="input" size="20" maxlength="20" value="go123" disabled="disabled"></td>
          </tr> 
		  <tr> 
            <td class="member_text"><font color="#FF0000">*</font>登录密码&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="pass1" type="password" class="input" size="20" maxlength="20">不修改请留空</td>
          </tr> 
		   <tr> 
            <td class="member_text"><font color="#FF0000">*</font>密码确认&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="pass2" type="password" class="input" size="20" maxlength="20">不修改请留空</td>
          </tr>
		  <tr> 
            <td class="member_text">姓名&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="realname" type="text" class="input" size="20" maxlength="20" value=""></td>
          </tr> 
		  <tr> 
            <td class="member_text">性别&nbsp;</td>
            <td colspan="2" class="member_input">
	
		<input name="sex" type="radio" value="0" >男 &nbsp;<input name="sex" type="radio" value="1" checked="checked">女

			</td>
          </tr> 
		  <tr> 
            <td class="member_text">联系电话&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="tel" type="text" class="input" size="20" maxlength="20" value=""></td>
          </tr> 
		  <tr> 
            <td class="member_text">手机&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="mobile" type="text" class="input" size="20" maxlength="20" value=""></td>
          </tr> 
		  <tr> 
            <td class="member_text"><font color="#FF0000">*</font>email&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="email" type="text" class="input" size="20" maxlength="50" value="cz2051@163.com">  用于找回密码</td>
          </tr> 
		  <tr> 
            <td class="member_text">QQ&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="qq" type="text" class="input" size="20" maxlength="20" value=""></td>
          </tr> 
		  <tr> 
            <td class="member_text">MSN&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="msn" type="text" class="input" size="20" maxlength="50" value=""></td>
          </tr> 
		  <tr> 
            <td class="member_text">淘宝&nbsp;</td>
            <td colspan="2" class="member_input"> <input name="taobao" type="text" class="input" size="20" maxlength="30" value=""></td>
          </tr> 
          <tr> 
          <td class="member_text" valign="middle">会员简介&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <textarea name="admin_introduction" cols="50" rows="5" ></textarea></td>
          </tr>
		  <tr> 
          <td class="member_text" valign="middle">公司名称&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <input name="companyname" type="text" class="input" size="20" maxlength="30" value="b5m"></td>
          </tr>
		  <tr> 
          <td class="member_text" valign="middle">公司传真&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <input name="companyfax" type="text" class="input" size="20" maxlength="30" value=""></td>
          </tr>
		  <tr> 
          <td class="member_text" valign="middle">公司邮政编码&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <input name="companycode" type="text" class="input" size="20" maxlength="30" value=""></td>
          </tr>
		  <tr> 
          <td class="member_text" valign="middle">公司联系地址&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <input name="companyaddress" type="text" class="input" size="20" maxlength="30" value=""></td>
          </tr>
		  <tr> 
          <td class="member_text" valign="middle">公司网址&nbsp;</td>
          <td colspan="2" class="member_input" valign="top"> <input name="companywebsite" type="text" class="input" size="20" maxlength="30" value=""></td>
          </tr>
 		  <tr> 
            <td class="member_text"></td>
	      <td class="member_submit"><input type="submit" name="Submit" value="提交信息" class="submit"></td>
          </tr>
        </form>
         
</table>

        </div>
    </div>
    <div style="clear:both;"></div>
</div>
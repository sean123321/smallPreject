<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? trim($_GET['id']) : '';
	if($act=='look')
	{
		$sql = "SELECT * FROM wkcx_dg WHERE id='$id'";
		$res = $db->query($sql);
		$row = $db->getarray($res);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目分类添加</title>
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> 
function check(){   
        if(document.form1.class_name.value==""){
			alert("请输入栏目或分类名称");
			document.form1.class_name.focus();
			return false;
		}
}
</script> 
<SCRIPT language=JavaScript src="js/pub.js" type=text/javascript></SCRIPT>
</head>
<body topmargin="0" bottommargin="0" style="overflow-x:hidden;overflow-y:auto">
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="450">
  <form name="form1" method="post" action="?act=update&id=<?=$id?>" onSubmit="return check();">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">订单详细信息</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFEE"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td width="10"></td>
        <td align="center">
          <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FF9900">
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">商品名称：</td>
              <td bgcolor="#FFFFFF"><?=@$row['ddname']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">商品数量：</td>
              <td bgcolor="#FFFFFF"><?=@$row['shuliang']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">交货时间：</td>
              <td bgcolor="#FFFFFF"><?=@$row['jiaohuo_time']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">产品需求：</td>
              <td bgcolor="#FFFFFF"><label>
                <textarea name="textarea" cols="40" rows="4"><?=@$row['contnet']?></textarea>
              </label></td>
            </tr>
            
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">公司名称：</td>
              <td bgcolor="#FFFFFF"> <?=@$row['gongsiname']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">联系人：</td>
              <td bgcolor="#FFFFFF"><?=@$row['username']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">&nbsp;性别：</td>
              <td bgcolor="#FFFFFF"><?=@$row['sex']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">&nbsp;联系电话：</td>
              <td bgcolor="#FFFFFF"><?=@$row['qq']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">办公电话：</td>
              <td bgcolor="#FFFFFF"><?=@$row['dianhua']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">公司&nbsp;地址：</td>
              <td bgcolor="#FFFFFF"><?=@$row['address']
?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">&nbsp;邮编：</td>
              <td bgcolor="#FFFFFF"><?=@$row['add_time']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">&nbsp;QQ：</td>
              <td bgcolor="#FFFFFF">
			    <label>
			    <?=@$row['qq']?>
			    </label></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">传真：</td>
              <td bgcolor="#FFFFFF"><?=@$row['chuanzhen']?></td>
            </tr>
          </table>
                
        </td>
        <td width="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="30" bgcolor="#FFFFEE"><table width="100%" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" colspan="3" align="center" bgcolor="#FBEAB5"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">
                <input name="Submit2" type="button" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
              </tr>
        </table></td>
      </tr>
    </table></td>
  </tr></form>
</table>
<?php

	if($act == 'update')
	{
		  $pwd=$_REQUEST['pwd'];

		$sql = "UPDATE wkcx_user SET user_pwd='$pwd' WHERE id='$id'";
		if($db->query($sql))
		{
			goBakLoad('修改成功');
		}
		else
		{
			goBakMsg("修改失败");	
		}
		mysql_close($db->connect());
	}
?>
</div>
</body>
</html>
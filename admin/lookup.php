<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	define('APP_ROOT', $_SERVER["DOCUMENT_ROOT"]);
	include_once(APP_ROOT."/includes/init.php");
	include_once(APP_ROOT."/admin/sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? trim($_GET['id']) : '';
	if($act=='look')
	{
		$sql = "SELECT * FROM wkcx_guestbook WHERE id='$id'";
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
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="180">
  <form name="form1" method="post" action="?act=update&id=<?=$id?>" onSubmit="return check();">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">
    查看申请</td>
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
          <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FF9900">
            
            <tr>
              <td height="30" align="right" bgcolor="#FFFFFF">网站名称：</td>
              <td bgcolor="#FFFFFF"><input name="subject" type="text" class="inputuser" id="subject2" style="width:100%;"  disabled="disabled" value="<?=@$row['book_name']?>" ></td>
            </tr>
            <tr>
              <td height="30" align="right" bgcolor="#FFFFFF">网址：</td>
              <td bgcolor="#FFFFFF"><input name="subject1" type="text" class="inputuser" id="subject3" style="width:100%;" disabled="disabled"  value="<?=@$row['book_email']?>" ></td>
            </tr>
            <tr>
              <td height="28" align="right" bgcolor="#FFFFFF">联系方式：</td>
              <td bgcolor="#FFFFFF">
			  <textarea name="content" rows="4" id="content" style="border:#009900 solid 1px;" disabled="disabled" ><?=@$row['book_connect']?></textarea>			  </td>
            </tr>
            <tr>
              <td width="80" height="28" align="right" bgcolor="#FFFFFF">备注：</td>
              <td bgcolor="#FFFFFF">
			   <textarea name="recontent" rows="4" id="recontent" style="border:#009900 solid 1px;"  ><?php if(@$row['book_restore']==""){echo"暂无";}else{echo @$row['book_restore'];}?></textarea>			  </td>
            </tr>
            <tr>
              <td width="80" height="28" align="right" bgcolor="#FFFFFF">状态：</td>
              <td bgcolor="#FFFFFF">
              
			 已处理
			   <input name="display" type="radio" value="1" <?php if(@$row['is_show']=='1'){?> <?php echo"checked "; }?>> 
			 未处理
			 <input name="display" type="radio" value="0" <?php if(@$row['is_show']=='0'){?>  <?php echo"checked";}?>>			  </td>
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
    <td height="30" bgcolor="#FFFFEE"><table width="97%" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" colspan="3" align="center" bgcolor="#FBEAB5"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><input name="Submit" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="修改" onClick="return confirm('确认要修改吗？');">&nbsp;&nbsp;&nbsp;
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
		  $subject=$_REQUEST['subject'];
		  $subject=$_REQUEST['subject'];
		  $content=$_REQUEST['content'];
		  $recontent=$_REQUEST['recontent'];
		  $is_show=$_REQUEST['display'];

		$sql = "UPDATE wkcx_guestbook SET book_restore='$recontent',is_show='$is_show' WHERE id='$id'";
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
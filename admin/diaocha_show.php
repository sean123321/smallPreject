<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
	$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    $sql = "SELECT * FROM wkcx_diaocha WHERE id='$id'";
	$res = $db->query($sql);
	$row = $db->getarray($res);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目分类添加</title>
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> 
function check(){   
        if(document.form1.diaocha_name.value==""){
			alert("请输入调查标题");
			document.form1.diaocha_name.focus();
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
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">
    　网上调查
</td>
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
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">调查名称：</td>
              <td bgcolor="#FFFFFF"><input name="diaocha_name" type="text" class="inputuser" value="<?=$row['diaocha_name']?>" id="diaocha_name" style="width:100%; "></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">调查类型：</td>
              <td bgcolor="#FFFFFF">
              <select name="diaocha_type">
              	<option value="checkbox" <?php if($row['diaocha_type']=='checkbox'){echo "selected";}?>>多选</option>
                <option value="radio"  <?php if($row['diaocha_type']=='radio'){echo "selected";}?>>单选</option>
              </select>
              </td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">调查说明：</td>
              <td bgcolor="#FFFFFF"><input name="diaocha_desc" type="text" class="inputuser" id="diaocha_desc" value="<?=$row['diaocha_desc']?>" style="width:100%; "></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">添加时间：</td>
              <td bgcolor="#FFFFFF"><input name="add_time" type="text" class="inputuser" id="add_time" value="<?=$row['add_time']?>" style="width:100%; "></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">调查选项：<br>

              </td>
              <td bgcolor="#FFFFFF">
              <?php
              	$sql = "select * from wkcx_diaocha_option where diaocha_id=".$row['id'];
				$res = $db->query($sql);
				 $option_name = "";
				 while($rows = $db->getarray($res))
				 {
					$option_name.=$rows['option_name']."|";
				 }
				 
				 $option_name = substr($option_name,0,strlen($option_name)-1);
			  ?>
			  <textarea name="diaocha_option"   id="diaocha_option" rows="12" title="调查选项格式如：选项1|选项2|选项3|选项4" style="border:#009900 solid 1px; width:100%" ><?=$option_name?></textarea>
			  </td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">是否显示：</td>
             <td bgcolor="#FFFFFF">
              
			 显示<input name="is_show" type="radio" value="1" <?php if(@$row['is_show']=='1'){?> <?php echo"checked "; }?>> 
			 否<input name="is_show" type="radio" value="0" <?php if(@$row['is_show']=='0'){?>  <?php echo"checked";}?>>
			  </td>
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
              <td align="center"><input name="Submit" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="保存" onClick="return confirm('确认要修改吗？');">&nbsp;&nbsp;&nbsp;
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
		  $diaocha_name=$_REQUEST['diaocha_name'];
		  $diaocha_type=$_REQUEST['diaocha_type'];
		  $diaocha_desc=$_REQUEST['diaocha_desc'];
		  $diaocha_option=$_REQUEST['diaocha_option'];


		  $add_time=$_REQUEST['add_time'];
		  $is_show=$_REQUEST['is_show'];


		$sql = "update wkcx_diaocha set diaocha_name='$diaocha_name',diaocha_type='$diaocha_type',diaocha_desc='$diaocha_desc',add_time='$add_time',is_show='$is_show' where id='$id'";
		if($db->query($sql))
		{
			//$diaocha_id = mysql_insert_id();
			$diaocha_option_arr = split("[|]",$diaocha_option);
			$sql_del = "delete from wkcx_diaocha_option where diaocha_id='$id'";
			$db->query($sql_del);
			//先删除在添加
			foreach($diaocha_option_arr as $v)
			{
				
				$sql_option = "insert into wkcx_diaocha_option(option_name,diaocha_id) values('$v','$id')";
				$db->query($sql_option);
			}
			goBakLoad('操作成功');exit();
		}
		else
		{
			goBakMsg("操作失败");	exit();
		}
		mysql_close($db->connect());
	}
?>
</div>
</body>
</html>
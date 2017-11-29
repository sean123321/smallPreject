<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
	if($act == 'upd')
	{
		$sql = "SELECT * FROM wkcx_yz WHERE id='$id'";
		$res = $db->query($sql);
		$row = $db->getarray($res);
	}
?>
<HTML><HEAD><TITLE>资讯修改</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<SCRIPT language=JavaScript src="js/pub.js" type=text/javascript></SCRIPT>
<script type="text/javascript"> 
function check(){   
        if(document.form1.news_title.value==""){
			alert("请输入标题");
			return false;
		}
		 if(document.form1.cat_id.value==""){
			alert("请选择分类");
			return false;
		}
		
}
</script> 

<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<form name="form1" method="post"  action="?act=update&id=<?=$id?>" onSubmit="return check();">
<table width="300" height="186" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 产品ID修改</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><strong>产品名称：</strong></td>
    <td align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;<input name="news_title" type="text" style="width:160px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" value="<?=@$row['bianhao']?>"></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><strong>产品分类：</strong></td>
    <td align="left" bgcolor="#FFFFFF">&nbsp;&nbsp;<select name="cat_id" id="select">
        <option value="">请选择产品分类</option>
       			<?php
                    sub_class(234,"",$row['cat_id']);
                    function sub_class($pid,$cut,$id)
                    {
                        $sql = "SELECT * FROM wkcx_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                ?>
                <option value='<?=$row['id']?>' <?php if($id==$row['id']) {echo "selected";} ?>><?=$cut.$row['class_name']?></option>
                <?php            
                            sub_class($row['id'],'|--'.$cut,$id);
                        }
                    }
                ?>     
    </select></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" width="75">
						<input name="Submit2" type="submit" class="button" value="修改" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" >
						
						</td>
                        <td align="center" width="75" ><input name="Submit2" type="reset" class="button" value="关闭" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" onClick="parent.doOk();"> </td>
                      </tr>
    </table></td>
                  </tr>
</table>
</form>


<?php
	if($act == 'update')
	{
		$news_title = !empty($_POST['news_title']) ? trim($_POST['news_title']) : '';
		$cat_id = !empty($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
		//$id = $_POST['id'];
		
			echo $sql = "UPDATE wkcx_yz SET cat_id='$cat_id',bianhao='$news_title' WHERE id='$id'";
		
		//$url = "pro_id.php?curPage=".$curPage;
		if($db->query($sql))
		{
			goBakLoad('添加成功');
		}
		else
		{
			goBakMsg("添加失败");	
		}
		
	}
	mysql_close($db->connect());
?>

</BODY></HTML>
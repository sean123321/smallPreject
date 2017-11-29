<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	define('APP_ROOT', $_SERVER["DOCUMENT_ROOT"]);
	include_once(APP_ROOT."/includes/init.php");
	include_once(APP_ROOT."/admin/sessioncheck.php");
	$cat_id = !empty($_GET['cat_id']) ? intval($_GET['cat_id']) : '';
	$start_addtime = !empty($_GET['start_addtime']) ? trim($_GET['start_addtime']) : '开始时间';
	$end_addtime = !empty($_GET['end_addtime']) ? trim($_GET['end_addtime']) : '结束时间';
	$keywords = !empty($_GET['keywords']) ? trim($_GET['keywords']) : '输入关键字';
?>
<HTML><HEAD><TITLE>资讯列表</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script language="javascript" src="js/pub.js"></script>
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
<script language="javascript1.2" type="text/javascript" src="js/selAll.js"></script>
<link href="css.css" rel="stylesheet" type="text/css"></HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 链接申请管理</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top">
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
           <tr>
              <td height="30" align="center">&nbsp;</td>
              </tr>
          </table>
          <form action="#" method="get" name="formdel" style="margin:0px;"> 
          <input type="hidden" name="act" value="delAll">     
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#BCE8B5">
            <tr>
              <td width="61" align="center" background="images/list_title_bg.jpg">
              <input type="checkbox" name="checkbox2" id="selall" onClick="selAll();">              </td>
              <td width="424" align="center" background="images/list_title_bg.jpg"><strong>网站名称</strong></td>
              <td width="314" align="center" background="images/list_title_bg.jpg"><strong>网址</strong></td>
              <td width="314" align="center" background="images/list_title_bg.jpg"><strong>联系方式</strong></td>
              <td width="177" align="center" background="images/list_title_bg.jpg"><strong>申请时间</strong></td>
              <td width="175" align="center" background="images/list_title_bg.jpg"><strong>状态</strong></td>
              <td width="178" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
<?php
$countSql="SELECT id FROM wkcx_guestbook";//sql语句
$KeyWord = "";
$pageSize="20"; //每页显示数
$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
$pageOutStrArr=explode("||",$pageOutStr);
$rsStart=$pageOutStrArr[0];//limit后的第一个参数
$pageStr=$pageOutStrArr[2];
$pageCount=$pageOutStrArr[1];//总页数
$sql = "SELECT * FROM wkcx_guestbook ORDER BY book_time DESC LIMIT $rsStart, $pageSize";
$res = $db->query($sql);
$i = 1;
while($row = $db->getarray($res))
{
		if($i%2==0)
		{
			$style = "bgcolor=\"#EAFFDF\" onMouseOut=\"mOut(this,'#EAFFDF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";	
		}
		else
		{
			$style = "bgcolor=\"#FFFFFF\" onMouseOut=\"mOut(this,'#FFFFFF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";
		}
?>            
            <tr <?=$style?>>
              <td align="center" >
              <input type="checkbox" name="bh[]"  value="<?=$row['id'];?>">              </td>
              <td align="center"><?=$row['book_name']?></td>
              <td align="center"><a href="<?=$row['book_email']?>" target="_blank"><?=$row['book_email']?></a></td>
              <td align="center"><?=$row['book_connect']?></td>
              <td align="center"><?=$row['book_time']?></td>
              <td align="center"><?php if($row['is_show'] == 0){echo "未处理";}else{echo "已处理";}?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><span onClick="sAlertopen('304','350','lookup.php?id=<?=$row['id']?>&act=look');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand"><img src="images/icon_view.gif" width="16" height="16"  border="0"></span></td>
                  
                  <td align="center"><a href="?act=del&id=<?=$row['id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>" onClick="return confirm('确定要删除吗')"><img src="images/icon_trash.gif" width="16" height="16" alt="删除" border="0"></a></td>
                  </tr>
              </table></td>
            </tr>
<?php
$i++;
}
?>            
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td align="center" width="80">
              <input type="hidden" value="<?=$urlPara?>" name="url">
              <input type="hidden" value="<?=$curPage?>" name="curPage">
              
              <input name="Submit" type="submit" class="button" value="批量删除" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" onClick="return confirm('确定要删除选中的新闻吗？');">
              </td>
              <td height="30" align="center"><?=$pageStr?></td>
              </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          </form>
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="25">
          <center>
           <a href="http://www.wkcx.net" target="_blank">技术支持：西安网科网络科技有限公司 </a>
          </center></td>
  </tr>
</table>
<?php
//删除
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
$urlPara = !empty($_GET['urlPara']) ? trim($_GET['urlPara']) : '';
$curPage = !empty($_GET['curPage']) ? trim($_GET['curPage']) : '';
$url = "guestbook.php?curPage=".$curPage."&".$urlPara."";
if($act == 'del'){
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sql = "DELETE FROM wkcx_guestbook WHERE id='$id'";
	$db->query($sql);
	urlMsg('删除成功',$url);
}
//全部删除
if($act=='delAll'){
	$bh = !empty($_GET['bh']) ? $_GET['bh'] : '';
	if(!empty($bh)){
		foreach($bh as $key =>$value){
			echo $sql = "DELETE FROM wkcx_guestbook WHERE id='$value'";
			$db->query($sql);
		}
		urlMsg('删除成功',$url);
	}
}
mysql_close($db->connect());
?>
</div>
</BODY></HTML>
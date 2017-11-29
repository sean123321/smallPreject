<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
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
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 网上调查</td>
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
          
              
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            
            <tr>
              <td height="30" colspan="2" align="center">
<?php
$sql = "SELECT * FROM wkcx_diaocha ORDER BY add_time DESC";
$res = $db->query($sql);
$name=array();
$zhi=array();
while($row = $db->getarray($res))
{
array_push($name,$row['diaocha_name']);
array_push($zhi,$row['is_show']);
}
 ?>
			    <OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" WIDTH="450" HEIGHT="350" id="General" ALIGN="middle">
              <PARAM NAME="FlashVars" value="&dataXML=<graph caption='网站调查统计(发表)' shownames='1' showvalues='1' decimalPrecision='2' outCnvBaseFontSize='13' baseFontSize='13' pieYScale='45'  pieBorderAlpha='40' pieFillAlpha='70' pieSliceDepth='30' pieRadius='100' bgAngle='460'>
			  <set name='<?=$name[0]?>' value='<?=$zhi[0]?>' color='FF6600' />
			  <set name='<?=$name[1]?>' value='<?=$zhi[1]?>' color='FF6600' />
			  <set name='<?=$name[2]?>' value='<?=$zhi[2]?>' color='FF6600' />
			  <set name='<?=$name[3]?>' value='<?=$zhi[3]?>' color='FF6600' />
			  <set name='<?=$name[4]?>' value='<?=$zhi[4]?>' color='FF6600' />
			  </graph>">
              <PARAM NAME=movie VALUE="flash/pie3d-400-300.swf?chartWidth=400&chartHeight=300">
              <PARAM NAME=quality VALUE=high>
              <PARAM NAME=bgcolor VALUE=#FFFFFF>
              <param NAME="wmode" VALUE="opaque" />
              <EMBED src="flash/pie3d-400-300.swf?chartWidth=400&chartHeight=300" FlashVars="&dataXML=<graph caption='合作统计(发表)' shownames='1' showvalues='1' decimalPrecision='2' outCnvBaseFontSize='13' baseFontSize='13' pieYScale='45'  pieBorderAlpha='40' pieFillAlpha='70' pieSliceDepth='30' pieRadius='100' bgAngle='460'>
			  <set name='<?=$name[0]?>' value='<?=$zhi[0]?>' color='FF6600' />
			  <set name='<?=$name[1]?>' value='<?=$zhi[1]?>' color='FF6600' />
			  <set name='<?=$name[2]?>' value='<?=$zhi[2]?>' color='FF6600' />
			  <set name='<?=$name[3]?>' value='<?=$zhi[3]?>' color='FF6600' />
			  <set name='<?=$name[4]?>' value='<?=$zhi[4]?>' color='FF6600' />
			  </graph>" quality=high bgcolor=#FFFFFF WIDTH="650" HEIGHT="400" NAME="General" ALIGN="middle"  wmode="opaque" TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
              </OBJECT>
  
			  
			  </td>
              </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
        
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="25">
          <center>
           技术支持：网科创想&nbsp;029-85458571&nbsp;<a href="http://www.xanet.net" target="_blank">www.xanet.net</a>
          </center></td>
  </tr>
</table>
<?php
//删除
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
$urlPara = !empty($_GET['urlPara']) ? trim($_GET['urlPara']) : '';
$curPage = !empty($_GET['curPage']) ? trim($_GET['curPage']) : '';
$url = "diaocha.php?curPage=".$curPage."&".$urlPara."";
if($act == 'del'){
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sqls = "delete from wkcx_diaocha_option where diaocha_id='$id'";
	$db->query($sqls);
	$sql = "DELETE FROM wkcx_diaocha WHERE id='$id'";
	$db->query($sql);
	urlMsg('删除成功',$url);
}
//全部删除
if($act=='delAll'){
	$bh = !empty($_GET['bh']) ? $_GET['bh'] : '';
	if(!empty($bh)){
		foreach($bh as $key =>$value){
			$sqls = "delete from wkcx_diaocha_option where diaocha_id='$value'";
			$db->query($sqls);
			$sql = "DELETE FROM wkcx_diaocha WHERE id='$value'";
			$db->query($sql);
		}
		urlMsg('删除成功',$url);
	}
}
mysql_close($db->connect());
?>
</div>
</BODY></HTML>
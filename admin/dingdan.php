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
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 订单管理</td>
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
            <form name="form1" method="get" action=""><tr>
              <td width="100" align="center">
             
              </td>
              <td width="100" align="center"><input name="start_addtime" type="text" value="<?=$start_addtime?>" style="width:150px" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" ></td>
              <td width="5" align="center">-</td>
              <td width="100" align="center"><input name="end_addtime" type="text" value="<?=$end_addtime?>" style="width:150px" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);"></td>
              <td><input name="keywords" type="text" value="<?=$keywords?>" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'; this.value=''"></td>
              <td width="80"><input name="Submit" type="submit" class="button" value="立即搜索" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
              <td width="80" align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                  <tr>
                    <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                    <td align="center"><p style="margin-top:3px"><a href="goods_add.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">添加产品</a></p></td>
                  </tr>
              </table></td>
            </tr></form>
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
              <td width="30" align="center" background="images/list_title_bg.jpg">
              <input type="checkbox" name="checkbox2" id="selall" onClick="selAll();"></td>
              <td width="93" align="center" background="images/list_title_bg.jpg"><strong>商品名称</strong></td>
              <td width="93" align="center" background="images/list_title_bg.jpg"><strong>商品数量</strong></td>
              <td width="136" align="center" background="images/list_title_bg.jpg"><strong>交货时间</strong></td>
              <td width="158" align="center" background="images/list_title_bg.jpg"><strong>传真</strong></td>
              <td width="197" align="center" background="images/list_title_bg.jpg"><strong>订单人</strong></td>
              <td width="194" align="center" background="images/list_title_bg.jpg"><strong>联系电话</strong></td>
              <td width="67" align="center" background="images/list_title_bg.jpg"><strong>QQ</strong></td>
              <td width="154" align="center" background="images/list_title_bg.jpg"><strong>公司名称</strong></td>
              <td width="79" align="center" background="images/list_title_bg.jpg"><strong>发布时间</strong></td>
              <td width="74" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
<?php
$sqlwhere = "";

if(!empty($start_addtime)&&$start_addtime!='开始时间')
{
	$sqlwhere.=" AND add_time>='$start_addtime'";
}
if(!empty($end_addtime)&&$end_addtime!='结束时间')
{
	$sqlwhere.=" AND add_time<='$end_addtime'";	
}
/*if(!empty($keywords)&&$keywords!='输入关键字')
{
	$sqlwhere.=" AND news_title LIKE '%$keywords%'";
}*/
$countSql="SELECT id FROM wkcx_dg  WHERE ddname!=''  $sqlwhere ";//sql语句
$start_addtime=urlencode($urlencode);
$end_addtime=urlencode($urlencode);
$keywords=urlencode($keywords);
$KeyWord = "cat_id=$cat_id&start_addtime=$start_addtime&end_addtime=$end_addtime&keywords=$keywords";
$pageSize="20"; //每页显示数
$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
$pageOutStrArr=explode("||",$pageOutStr);
$rsStart=$pageOutStrArr[0];//limit后的第一个参数
$pageStr=$pageOutStrArr[2];
$pageCount=$pageOutStrArr[1];//总页数
$sql = "SELECT * FROM wkcx_dg  WHERE ddname!='' $sqlwhere  ORDER BY add_time DESC LIMIT $rsStart, $pageSize";
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
              <td align="left"><?=$row['ddname']?></td>
              <td align="left"><?=$row['shuliang']?></td>
              <td align="left"><?=$row['jiaohuo_time']?></td>
              <td align="left"><?=$row['chuanzhen']?></td>
              <td align="left"><?=$row['username']?></td>
              <td align="left"><?=$row['phone']?></td>
              <td align="left"><?=$row['qq']?></td>
              <td align="center"><?=$row['gongsiname']?></td>
              <td align="center"><?=$row['add_time']?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center">
				  <span onClick="sAlertopen('550','450','dingdan_lookup.php?id=<?=$row['id']?>&act=look');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand"><img src="images/icon_view.gif" width="16" height="16"  border="0"></span>
                               </td>
                  <td align="center"><a href="" onClick="return confirm('确定要删除吗')"><img src="images/icon_trash.gif" width="16" height="16" alt="删除" border="0"></a></td>
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
              
              <input name="Submit" type="submit" class="button" value="批量删除" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" onClick="return confirm('确定要删除选中的产品吗？');">
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
           技术支持：网科创想&nbsp;029-85458571&nbsp;<a href="http://www.xanet.net" target="_blank">www.xanet.net</a>
          </center></td>
  </tr>
</table>
<?php
//文章删除
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
$urlPara = !empty($_GET['urlPara']) ? trim($_GET['urlPara']) : '';
$curPage = !empty($_GET['curPage']) ? trim($_GET['curPage']) : '';
$url = "dingdan.php?curPage=".$curPage."&".$urlPara."";
if($act == 'del'){
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sql = "DELETE FROM wkcx_dg WHERE id='$id'";
	$db->query($sql);
	urlMsg('删除成功',$url);
}
//文章全部删除
if($act=='delAll'){
	$bh = !empty($_GET['bh']) ? $_GET['bh'] : '';
	if(!empty($bh)){
		foreach($bh as $key =>$value){
			echo $sql = "DELETE FROM wkcx_dg WHERE id='$value'";
			$db->query($sql);
		}
		urlMsg('删除成功',$url);
	}
}
mysql_close($db->connect());
?>
</div>
</BODY></HTML>
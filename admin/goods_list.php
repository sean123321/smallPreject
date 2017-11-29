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
<HTML><HEAD><TITLE>产品列表</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script language="javascript" src="js/pub.js"></script>
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
<script language="javascript1.2" type="text/javascript" src="js/selAll.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 视频管理</td>
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
             <select name="cat_id" id="select" >
        <option value="">请选择产品分类</option>
       			<?php
                    sub_class(1,"",$cat_id);
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
      </select>
              </td>
              <td width="100" align="center"><input name="start_addtime" type="text" value="<?=$start_addtime?>" style="width:150px" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" ></td>
              <td width="5" align="center">-</td>
              <td width="100" align="center"><input name="end_addtime" type="text" value="<?=$end_addtime?>" style="width:150px" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);"></td>
              <td><input name="keywords" type="text" value="<?=$keywords?>" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'; this.value=''"></td>
              <td width="80"><input name="Submit" type="submit" class="button" value="立即搜索" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
              <td width="80" align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                  <tr>
                    <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                    <td align="center"><p style="margin-top:3px"><a href="goods_add.php?tic=<?=date("mdhis")?>" style="font-size:12px; font-weight:normal; color:#FFFFFF">添加视频</a></p></td>
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
              <td width="40" align="center" background="images/list_title_bg.jpg">
              <input type="checkbox" name="checkbox2" id="selall" onClick="selAll();">              </td>
              <td align="center" background="images/list_title_bg.jpg"><strong>视频名称</strong></td>
              <td width="100" align="center" background="images/list_title_bg.jpg"><strong>视频分类</strong></td>
              <td width="80" align="center" background="images/list_title_bg.jpg"><strong>排序</strong></td>
              <td width="120" align="center" background="images/list_title_bg.jpg"><strong>发布时间</strong></td>
              <td width="60" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
<?php
$sqlwhere = "";
if(!empty($cat_id))
{
	$sqlwhere = " AND a.cat_id='$cat_id'";
}
if(!empty($start_addtime)&&$start_addtime!='开始时间')
{
	$sqlwhere.=" AND add_time>='$start_addtime'";
}
if(!empty($end_addtime)&&$end_addtime!='结束时间')
{
	$sqlwhere.=" AND add_time<='$end_addtime'";	
}
if(!empty($keywords)&&$keywords!='输入关键字')
{
	$sqlwhere.=" AND news_title LIKE '%$keywords%'";
}
$countSql="SELECT a.id FROM wkcx_content AS a,wkcx_class AS b WHERE a.cat_id=b.id $sqlwhere AND b.type='goods'";//sql语句
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
$sql = "SELECT a.*,b.class_name FROM wkcx_content AS a,wkcx_class AS b WHERE a.cat_id=b.id $sqlwhere  AND b.type='goods' ORDER BY news_order ASC,add_time DESC LIMIT $rsStart, $pageSize";
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
              <td align="left"><?=$row['news_title']?></td>
              <td align="center"><?=$row['class_name']?></td>
              <td align="center"><?=$row['news_order']?></td>
              <td align="center"><?=$row['add_time']?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center">
                  <a href="goods_upd.php?act=upd&id=<?=$row['id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>">
                  <img src="images/icon_edit.gif" width="16" height="16" border="0" alt="修改"></a>                  </td>
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
$url = "goods_list.php?curPage=".$curPage."&".$urlPara."";
if($act == 'del'){
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sql = "DELETE FROM wkcx_content WHERE id='$id'";
	$db->query($sql);
	urlMsg('删除成功',$url);
}
//文章全部删除
if($act=='delAll'){
	$bh = !empty($_GET['bh']) ? $_GET['bh'] : '';
	if(!empty($bh)){
		foreach($bh as $key =>$value){
			echo $sql = "DELETE FROM wkcx_content WHERE id='$value'";
			$db->query($sql);
		}
		urlMsg('删除成功',$url);
	}
}
mysql_close($db->connect());
?>
</div>
</BODY></HTML>
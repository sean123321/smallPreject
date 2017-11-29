<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$cat_id = !empty($_GET['cat_id']) ? intval($_GET['cat_id']) : '';
		$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : '';
	$start_addtime = !empty($_GET['start_addtime']) ? trim($_GET['start_addtime']) : '开始时间';
	$end_addtime = !empty($_GET['end_addtime']) ? trim($_GET['end_addtime']) : '结束时间';
	$keywords = !empty($_GET['keywords']) ? trim($_GET['keywords']) : '输入关键字';
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script type="text/javascript" language="javascript" src="/js/calendar.js"></script>
<script type="text/javascript" src="/js/PCASClass.js" charset="utf-8"></script>
<script language="javascript">

function checks()
{
	  var at=document.getElementById("email").value.indexOf("@")
      var shenfenzheng=document.getElementById("shenfenzheng").value
		if(document.getElementById("name").value=="")
		{
			alert("请输入学生姓名！");
			document.getElementById("name").focus();
			return false;
		}
		

		if(document.getElementById("xuehao").value=="")
		{
			alert("请输入学号！");
			
			document.getElementById("xuehao").focus();
			return false;
		}
		if(shengfenzhenghao.length<17||shengfenzhenghao.length>19)
		{
			alert("身份证号必须是 17或 19 位。")
			
			document.getElementById("shengfenzhenghao").focus();
			return false;
		}
		if(at==-1)
		{   
			alert("email 不合法！");
			
			return false;
		}
		


}
function killErrors()

{

return true;

}

window.onerror = killErrors;

</script>
<script type="text/javascript">
function validate()
{
var at=document.getElementById("email").value.indexOf("@")
var age=document.getElementById("age").value
var fname=document.getElementById("fname").value
submitOK="true"

if (fname.length>10)
 {
 alert("名字必须小于 10 个字符。")
 submitOK="false"
 }
if (isNaN(age)||age<1||age>100)
 {
 alert("年龄必须是 1 与 100 之间的数字。")
 submitOK="false"
 }
if (at==-1) 
 {
 alert("不是有效的电子邮件地址。")
 submitOK="false"
 }
if (submitOK=="false")
 {
 return false
 }
}
</script>

<!--日历组建结束-->
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<?php
$sql_upd="select * from wkcx_baoming where id='$id'";
//echo $sql_upd;
$res_upd=$db->query($sql_upd);
$row_upd=$db->getarray($res_upd);
$zhuanye1=$row_updd['zhuanye'];
?>
<div id="hiddenDiv" style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" >
  <tr >
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：学生管理 > 学生修改</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top">
          <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#009900">
                <tr > 
                  <td height="29" align="left" bgcolor="#D2FFD2" >&nbsp;&nbsp;<strong>学生修改</strong></td>
                </tr>
                <tr > 
                  <td height="29" bgcolor="#FFFFFF" >
				<form action="?id=<?=$id?>" method="post" enctype="multipart/form-data" name="myform"  onSubmit="return checks();">
				  <table width="100%" height="125" border="0" cellpadding="5" cellspacing="1" bgcolor="#f4f4f4">
                    <tr>
                      <td align="right" bgcolor="#FFFFFF">
					  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                  <tr>
                    <td height="30" colspan="5" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"> 　　　个人信息</td>
                  </tr>
                  <tr>
                    <td width="17%" height="30" align="right" bgcolor="#FFFFFF">姓名：</td>
                    <td width="28%" height="30" bgcolor="#FFFFFF"><label>
                      <input name="name" type="text" id="name"  value="<?=$row_upd['name']?>"/>
                      <span style="color:#FF0000;">*</span></label></td>
                    <td width="26%" height="30" align="right" bgcolor="#FFFFFF">性别：</td>
                    <td width="29%" height="30" bgcolor="#FFFFFF"><label>
                      <select name="sex" id="sex">
                        <option value="男" <?php if($row_upd['sex']=='男') echo "selected";?>>男</option>
                        <option value="女" <?php if($row_upd['sex']=='女') echo "selected";?>>女</option>
                    </select>
                      <span style="color:#FF0000;">*</span></label></td>
                    <td width="29%" height="30" rowspan="5" bgcolor="#FFFFFF">一寸彩色照片<br>
					<img src="/<?=$row_upd['img_thumb']?>" width="120" height="140">                    </td>
                  </tr>
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">民族：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <select name="minzu" id="minzu">
    <option value="汉族">汉族</option>
    <option value="蒙古族">蒙古族</option>
    <option value="回族">回族</option>
    <option value="藏族">藏族</option>
    <option value="维吾尔族">维吾尔族</option>
    <option value="苗族">苗族</option>
    <option value="彝族">彝族</option>
    <option value="壮族">壮族</option>
    <option value="布依族">布依族</option>
    <option value="朝鲜族">朝鲜族</option>
    <option value="满族">满族</option>
    <option value="侗族">侗族</option>
    <option value="瑶族">瑶族</option>
    <option value="白族">白族</option>
    <option value="土家族">土家族</option>
    <option value="哈尼族">哈尼族</option>
    <option value="哈萨克族">哈萨克族</option>
    <option value="傣族">傣族</option>
    <option value="黎族">黎族</option>
    <option value="傈僳族">傈僳族</option>
    <option value="佤族">佤族</option>
    <option value="畲族">畲族</option>
    <option value="高山族">高山族</option>
    <option value="拉祜族">拉祜族</option>
    <option value="水族">水族</option>
    <option value="东乡族">东乡族</option>
    <option value="纳西族">纳西族</option>
    <option value="景颇族">景颇族</option>
    <option value="柯尔克孜族">柯尔克孜族</option>
    <option value="土族">土族</option>
    <option value="达斡尔族">达斡尔族</option>
    <option value="仫佬族">仫佬族</option>
    <option value="羌族">羌族</option>
    <option value="布朗族">布朗族</option>
    <option value="撒拉族">撒拉族</option>
    <option value="毛南族">毛南族</option>
    <option value="仡佬族">仡佬族</option>
    <option value="锡伯族">锡伯族</option>
    <option value="阿昌族">阿昌族</option>
    <option value="普米族">普米族</option>
    <option value="塔吉克族">塔吉克族</option>
    <option value="怒族">怒族</option>
    <option value="乌孜别克族">乌孜别克族</option>
    <option value="俄罗斯族">俄罗斯族</option>
    <option value="鄂温克族">鄂温克族</option>
    <option value="德昂族">德昂族</option>
    <option value="保安族">保安族</option>
    <option value="裕固族">裕固族</option>
    <option value="京族">京族</option>
    <option value="塔塔尔族">塔塔尔族</option>
    <option value="独龙族">独龙族</option>
    <option value="鄂伦春族">鄂伦春族</option>
    <option value="赫哲族">赫哲族</option>
    <option value="门巴族">门巴族</option>
    <option value="珞巴族">珞巴族</option>
    <option value="基诺族">基诺族</option>
   </select>
                      <span style="color:#FF0000;">*</span></label></td>
                    <td height="30" align="right" bgcolor="#FFFFFF">籍贯：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      
                      <input type="text" name="jiguan"  value="<?=$row_upd['jiguan']?>" />
                      <span style="color:#FF0000;">*</span></label></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">出生日期：</td>
                    <td height="30" bgcolor="#FFFFFF"><input name="chushengriqi" type="text" id="chushengriqi"  onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=$row_upd['chushengriqi']?>"/></td>
                    <td height="30" align="right" bgcolor="#FFFFFF">政治面貌：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <select name="zhengzhimianmao" id="zhengzhimianmao">
                        <option  value="团员">团员</option>
						<option  value="党员">党员</option>
						<option  value="少先队员">少先队员</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">毕业院校：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <input name="biyeyuanxiao" type="text" id="biyeyuanxiao"  value="<?=$row_upd['biyeyuanxiao']?>"/>
                    </label></td>
                    <td height="30" align="right" bgcolor="#FFFFFF">学历层次：</td>
                    <td height="30" bgcolor="#FFFFFF"><label><select name="xueli" id="xueli">
                    <option>小学</option>
                    <option>初中</option>
                    <option>高中</option>
                    <option>中专</option>
                    <option>大专</option>
                    <option>本科</option>
                    <option>研究生</option>
                    <option>博士生</option>
                    <option>硕士生</option>
                  </select></label></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">身份证号：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <input name="shefeizhenghao" type="text" id="shefeizhenghao"  value="<?=$row_upd['shefeizhenghao']?>"/>
                      <span style="color:#FF0000;">*</span></label></td>
                    <td height="30" align="right" bgcolor="#FFFFFF">考生号：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <input name="kaoshenghao" type="text" id="kaoshenghao"  value="<?=$row_upd['kaoshenghao']?>" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="30" align="right" bgcolor="#FFFFFF">准考证号：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <input name="zhuikaozhenghao" type="text" id="zhuikaozhenghao"  value="<?=$row_upd['zhuikaozhenghao']?>"/>
                    </label></td>
                    <td height="30" align="right" bgcolor="#FFFFFF">高(中)考成绩：</td>
                    <td height="30" bgcolor="#FFFFFF"><label>
                      <input name="gaokaochengji" type="text" id="gaokaochengji"  value="<?=$row_upd['gaokaochengji']?>"/>
                    </label></td>
                    <td height="30" bgcolor="#FFFFFF"><input type="file" name="img_thumb" style="width:150px;" id="zhaopian"></td>
                  </tr>
                  
                </table>
                  
                  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                    <tr>
                      <td height="30" colspan="4" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"> 　　　报考信息</td>
                    </tr>
                    <tr>
                      <td width="17%" height="30" align="right" bgcolor="#FFFFFF">报考类别：</td>
                      <td width="28%" bgcolor="#FFFFFF"><label>
                      <select name="baokaoleibie" id="baokaoleibie">
                        <option>本科</option>
						<option>专科</option>
						<option>本科</option>
                      </select>
                      <span style="color:#FF0000;">*</span></label></td>
                      <td width="26%" align="right" bgcolor="#FFFFFF">报考专业：</td>
                      <td width="29%" bgcolor="#FFFFFF"><label>
                        <select name="zhuanye" id="zhuanye">
                          <option>计算机专业</option>
                        </select>
                      <span style="color:#FF0000;">*</span></label></td>
                    </tr>
                
                   
             
                  
                  </table>
                  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                    <tr>
                      <td height="30" colspan="4" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"> 　　　考生联系方式</td>
                    </tr>
                    <tr>
                      <td width="17%" height="25" align="right" bgcolor="#FFFFFF">考生所在地区：</td>
                      <td colspan="3" bgcolor="#FFFFFF"><script type="text/javascript" src="js/PCASClass.js" charset="utf-8"></script>
 
<SCRIPT language=javascript defer charset="utf-8"> 
 
new PCAS("province","city","area","<?=$row_upd['province']?>","<?=$row_upd['city']?>","<?=$row_upd['area']?>");
 
</SCRIPT><select name="province" id="province" onblur="check_province()" style="width:100px">
</select>
<SELECT name=city style="width:100px"></SELECT>
  
<SELECT name=area style="width:100px"></SELECT>
                        <span style="color:#FF0000;">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" bgcolor="#FFFFFF">详细通信地址：</td>
                      <td align="left" bgcolor="#FFFFFF"><label>
                        <input name="address" type="text" id="address"  value="<?=$row_upd['address']?>" />
                      </label>
                        <label></label></td>
                      <td align="right" bgcolor="#FFFFFF">Email：</td>
                      <td bgcolor="#FFFFFF"><input name="email" type="text" id="email"  value="<?=$row_upd['email']?>" /></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" bgcolor="#FFFFFF">邮编：</td>
                      <td width="28%" bgcolor="#FFFFFF"><label>
                        <input name="youbian" type="text" id="youbian"  value="<?=$row_upd['youbian']?>" />
                        <span style="color:#FF0000;">*</span>                      </label></td>
                      <td width="26%" align="right" bgcolor="#FFFFFF">联系电话：</td>
                      <td width="29%" bgcolor="#FFFFFF"><label>
                        <input name="lianxidianhua" type="text" id="lianxidianhua"  value="<?=$row_upd['lianxidianhua']?>" />
                        <span style="color:#FF0000;">*</span></label></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" bgcolor="#FFFFFF">手机：</td>
                      <td bgcolor="#FFFFFF"><label>
                        <input name="telephone" type="text" id="telephone"  value="<?=$row_upd['telephone']?>" />
                      </label></td>
                      <td align="right" bgcolor="#FFFFFF">QQ号：</td>
                      <td bgcolor="#FFFFFF"><label>
                        <input name="QQ" type="text" id="QQ" value="<?=$row_upd['QQ']?>"  />
                      </label></td>
                    </tr>
                  </table>
				  <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                    <tr>
                      <td width="17%" height="30" align="right" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"> 　　　备注&nbsp;:&nbsp;&nbsp;</td>
                      <td width="83%" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"><textarea name="content" cols="70" rows="5" id="content"><?=$row_upd['content']?>
</textarea></td>
                    </tr>
                    <tr>
                      <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" style="font-size:14px; font-family:'微软雅黑'; color:#3399FF;"></td>
                    </tr>
                  </table>
                      </td>
                      </tr>
					 <tr>
					   <td height="30" colspan="7" align="center" bgcolor="#FFFFFF"><table width="300" border="0" cellspacing="1" cellpadding="1">
					     <tr>
					       <td align="center"><input name="submit" type="submit"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="修改" IsShowProcessBar="True"></td>
					       <td align="center"><input name="重置" type="reset"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="重置" IsShowProcessBar="True"></td>
					       </tr>
					     </table></td>
					   </tr>
                  </table>
                  <input type="hidden" name="act" value="upd">
                   <input type="hidden" name="id" value="<?=$id;?>">
                  </form>				  
				  </td>
                </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" class="searchtable">
            <tr>
              <td width="250" height="30" align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table>          </td>
        <td width="10"></td>
      </tr>
    </table>
</td>
  </tr>
</table>
<?php
	$act = !empty($_POST['act']) ? trim($_POST['act']) : '';
	if($act == 'upd')
	{
		
$name=!empty($_POST['name'])?$_POST['name']:'';
$sex=!empty($_POST['sex'])?$_POST['sex']:'';
$minzu=!empty($_POST['minzu'])?$_POST['minzu']:'';
$jiguan=!empty($_POST['jiguan'])?$_POST['jiguan']:'';
$chushengriqi=!empty($_POST['chushengriqi'])?$_POST['chushengriqi']:'';
$zhengzhimianmao=!empty($_POST['zhengzhimianmao'])?$_POST['zhengzhimianmao']:'';
$biyeyuanxiao=!empty($_POST['biyeyuanxiao'])?$_POST['biyeyuanxiao']:'';
$xueli=!empty($_POST['xueli'])?$_POST['xueli']:'';
$shefeizhenghao=!empty($_POST['shefeizhenghao'])?$_POST['shefeizhenghao']:'';
$kaoshenghao=!empty($_POST['kaoshenghao'])?$_POST['kaoshenghao']:'';
$zhuikaozhenghao=!empty($_POST['zhuikaozhenghao'])?$_POST['zhuikaozhenghao']:'';
$gaokaochengji=!empty($_POST['gaokaochengji'])?$_POST['gaokaochengji']:'';
$baokaoleibie=!empty($_POST['baokaoleibie'])?$_POST['baokaoleibie']:'';
$zhuanye=!empty($_POST['zhuanye'])?$_POST['zhuanye']:'';
$province=!empty($_POST['province'])?$_POST['province']:'';
$city=!empty($_POST['city'])?$_POST['city']:'';
$area=!empty($_POST['area'])?$_POST['area']:'';
$address=!empty($_POST['address'])?$_POST['address']:'';
$youbian=!empty($_POST['youbian'])?$_POST['youbian']:'';
$lianxidianhua=!empty($_POST['lianxidianhua'])?$_POST['lianxidianhua']:'';
$telephone=!empty($_POST['telephone'])?$_POST['telephone']:'';
$QQ=!empty($_POST['QQ'])?$_POST['QQ']:'';
$email=!empty($_POST['email'])?$_POST['email']:'';
$content=!empty($_POST['content'])?$_POST['content']:'';
$img_thumb				 = "";
		$small_img		 = "";
		if(!empty($_FILES['img_thumb']['name']))
		{
			$up = new upload;
			$up->fileName = $_FILES["img_thumb"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=100;//缩略图宽度
			$up->sh=100;//缩略图高度
			$up->up();
			$img_thumb=$up->bImg; //返回大图片路径
			$img_thumb = str_replace("../", "", $img_thumb); 
			$small_img= $up->sImg;//返回缩略图片路径
			$small_img = str_replace("../", "", $small_img); 	
		}
		if(!empty($img_thumb))
		{
		$sql = "update wkcx_baoming  set name='$name',
sex='$sex',
baokaoleibie='$baokaoleibie',										 
sex='$sex',
chushengriqi='$chushengriqi',
jiguan='$jiguan',
baokaozhuanye='$zhuanye',
zhengzhimianmao='$zhengzhimianmao',
shefeizhenghao='$shefeizhenghao',
gaokaochengji='$gaokaochengji',
zhuikaozhenghao='$zhuikaozhenghao',
xueli='$xueli',
minzu='$minzu',
biyeyuanxiao='$biyeyuanxiao',
tongxindizhi='$address',
email='$email',
province='$province',
city='$city',
area='$area',
lianxidianhua='$lianxidianhua',
telephone='$telephone',
img_thumb='$img_thumb',
small_img='$small_img',
email='$email',
content='$content' where id='$id'";
		}
		else
		{
		$sql = "update wkcx_baoming  set name='$name',
sex='$sex',
baokaoleibie='$baokaoleibie',										 
sex='$sex',
chushengriqi='$chushengriqi',
jiguan='$jiguan',
baokaozhuanye='$zhuanye',
zhengzhimianmao='$zhengzhimianmao',
shefeizhenghao='$shefeizhenghao',
gaokaochengji='$gaokaochengji',
zhuikaozhenghao='$zhuikaozhenghao',
xueli='$xueli',
minzu='$minzu',
biyeyuanxiao='$biyeyuanxiao',
tongxindizhi='$address',
email='$email',
province='$province',
city='$city',
area='$area',
lianxidianhua='$lianxidianhua',
telephone='$telephone',
email='$email',
content='$content' where id='$id'";
		}
				if($db->query($sql))
				{
					urlMsg('修改成功','student_list.php');exit();
				}
	}
?>
</div>
</BODY></HTML>

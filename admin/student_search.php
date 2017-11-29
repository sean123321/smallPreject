<?php
require("../includes/admin_init.php");
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script type="text/javascript" src="My97DatePicker/WdatePicker.js"></script>
<script language="javascript">

function checks()
{
	  var at=document.getElementById("email").value.indexOf("@")
      var shenfenzheng=document.getElementById("shenfenzheng").value
		if(document.getElementById("loginname").value=="")
		{
			alert("请输入登陆名！");
			document.getElementById("loginname").focus();
			return false;
		}
		

		if(document.getElementById("realname").value=="")
		{
			alert("请输入真实姓名！");
			
			document.getElementById("realname").focus();
			return false;
		}
		if(shenfenzheng.length<17||shenfenzheng.length>19)
		{
			alert("身份证号必须是 17或 19 位。")
			
			document.getElementById("realname").focus();
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
<link href="UI/css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id="hiddenDiv" style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="maintable">
  <tr class="navtable">
    <td>&nbsp;&nbsp;您的当前位置：学生管理 > 学生查询</td>
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
          <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#B4C7D5">
                <tr > 
                  <td height="29" align="left" background="UI/images/custom_arr1.jpg">&nbsp;&nbsp;<strong>学生查询</strong></td>
                </tr>
                <tr > 
                  <td height="29" bgcolor="#FFFFFF" >
				<form action="student_list.php?act=search" method="post" enctype="multipart/form-data" name="myform"  onSubmit="return checks();">
				  <table width="100%" height="125" border="0" cellpadding="5" cellspacing="1" bgcolor="#f4f4f4">
                    <tr>
                      <td align="right" bgcolor="#FFFFFF">
                      <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC">
                            <tr>
                              <td width="146" align="right" nowrap bgcolor="#FFFFFF">学生姓名 </td>
                              <td width="349" bgcolor="#FFFFFF"><input name="name" class="inputuser" id="name" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                              <td width="168" align="right" bgcolor="#FFFFFF">学号</td>
                              <td colspan="3" bgcolor="#FFFFFF"><input name="xuehao" class="inputuser" id="xuehao" style="width:100px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                              </tr>
                            <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">辅导员</td>
                          <td bgcolor="#FFFFFF">
                           <select name="fudaoyuan" id="fudaoyuan" style="width:80px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'">  <option value="">请选择...</option>  
							  <?php
                                 $sqlteacher="select realname,teachid from wkcx_teacher";
								 $res=$db->query($sqlteacher);
								while($row = $db->getarray($res))
								{
								 
							     ?>
                                <option value="<?=$row['realname']?>"><?=$row['realname']?></option>
                                <?php
								}
								?>
                              </select>
                          </td>
                          <td align="right" bgcolor="#FFFFFF">性 别</td>
                          <td colspan="3" bgcolor="#FFFFFF">
                            <select name="sex" id="select">
                              <option value="">请选择</option>
                              <option value="男">男</option>
                              <option value="女">女</option>
                            </select></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">出生年月</td>
                          <td bgcolor="#FFFFFF"><input name="birth_date" type="text" class="Wdate" id="birth_date" onFocus="WdatePicker({lang:'zh-cn'})"/></td>
                          <td align="right" bgcolor="#FFFFFF">籍 贯</td>
                          <td colspan="3" bgcolor="#FFFFFF"><input name="jiguan" class="inputuser" id="jiguan" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">身份证号</td>
                          <td bgcolor="#FFFFFF"><input name="shenfenzhenghao" class="inputuser" id="shenfenzhenghao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">民 族</td>
                          <td colspan="3" bgcolor="#FFFFFF">
                            <select name="minzu" id="minzu">
                              <option value="">请选择...</option>                     
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
                            </select></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">本科毕业院校</td>
                          <td bgcolor="#FFFFFF"><input name="benkebiyeyuanxiao" class="inputuser" id="benkebiyeyuanxiao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">毕业时间</td>
                          <td colspan="3" bgcolor="#FFFFFF"><input name="benkebiyeshijian" type="text" class="Wdate" id="benkebiyeshijian" onFocus="WdatePicker({lang:'zh-cn'})"/></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">政治面貌</td>
                          <td align="left" nowrap bgcolor="#FFFFFF"><input name="zhengzhimianmao" class="inputuser" id="zhengzhimianmao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" nowrap bgcolor="#FFFFFF">所在院系及专业</td>
                          <td colspan="3"  nowrap bgcolor="#FFFFFF"><select name="souzaixi" id="souzaixi" onChange="changelocation(document.myform.souzaixi.options[document.myform.souzaixi.selectedIndex].value)">
                              
                              <option value="">请选择...</option>
                              
<?php
	$sql = "select * from wkcx_danwei order by dw_order asc";
	$res = $db->query($sql);
	while($row = $db->getarray($res))
	{
?>
                              <option value="<?=$row['id']?>"><?=$row['dw_name']?></option>
<?php
	}
?>
                              </select>
                            <select   name="zhuanye" id="zhuanye">                                       
                              <option   selected   value="">请选择</option>   
                              </select>&nbsp;</td>
                          </tr>
                        
                        <tr>
                          <td colspan="6" align="right" nowrap bgcolor="#FFFFFF">&nbsp;
                            <script> 
 
  var   onecount;   
 
  onecount=0;   
 
  subcat   =   new   Array();  
 
<?php
	$i = 0;
	$sql = "select * from wkcx_xueke order by xueke_order asc";
	$res = $db->query($sql);
	while($row = $db->getarray($res))
	{
?> 
  subcat[<?=$i?>]   =   new   Array("<?=$row['xueke_name']?>","<?=$row['dw_id']?>","<?=$row['id']?>");
<?php
	$i++;
	}
?> 

 
  
 
 
  
  onecount = <?=$i?>;
 
  function   changelocation(locationid)   
 
          {   
 
          document.myform.zhuanye.length   =   0;     
 
    
 
          var   locationid=locationid;   
 
          var   i;   
 
          for   (i=0;i   <   onecount;   i++)   
 
                  {   
 
                          if   (subcat[i][1]   ==   locationid)   
 
                          {     
 
                                  document.myform.zhuanye.options[document.myform.zhuanye.length]   =   new   Option(subcat[i][0],   subcat[i][2]);   
 
                          }                   
 
                  }   
 
                    
 
          }           
 
</script>                          </td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">电子信箱</td>
                          <td bgcolor="#FFFFFF"><input name="email" class="inputuser" id="email" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">联系电话</td>
                          <td width="167" bgcolor="#FFFFFF"><input name="dianhua" class="inputuser" id="dianhua" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td width="68" align="right" bgcolor="#FFFFFF">手&nbsp; 机</td>
                          <td width="154" bgcolor="#FFFFFF"><input name="shouji" class="inputuser" id="shouji" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          </tr>
                       
                      </table></td>
                      </tr>
                   
					 <tr>
					   <td height="30" colspan="7" align="center" bgcolor="#FFFFFF"><table width="300" border="0" cellspacing="1" cellpadding="1">
					     <tr>
					       <td align="center"><input name="submit" type="submit"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="搜索" IsShowProcessBar="True"></td>
					       <td align="center"><input name="重置" type="reset"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="重置" IsShowProcessBar="True"></td>
					       </tr>
					     </table></td>
					   </tr>
                  </table>
                  <input type="hidden" name="act" value="search">
                  </form>				  
				  </td>
                </tr>
            </table>
            <div  style="display:none;">
                        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
        <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#B4C7D5">
            <tr class="listtabletitle">
              <td width="40">编号</td>
             
              <td>学生姓名</td>
              <td>性 别</td>
              <td>籍 贯</td>
               <td width="60">所在院系</td>
              <td>专业</td>
              <td>联系电话</td>
              <td width="80">手&nbsp; 机</td>
              <td width="80">操作</td>
            </tr>
<?php
			$act = !empty($_POST['act']) ? trim($_POST['act']) : '';
			if($act == 'search')
			{
				
				$name 				     = !empty($_POST['name']) ? trim($_POST['name']) : '';
				$name1                  ="";
				if(!empty($name))
				{
				$name1.="and name like '%$name%'";
				}
				$xuehao					   = !empty($_POST['xuehao']) ? trim($_POST['xuehao']) : '';
				$xuehao1                 ="";
				if(!empty($xuehao))
				{
				$xuehao1.="and xuehao='$xuehao'";
				}
				$sex					 = !empty($_POST['sex']) ? trim($_POST['sex']) : '';
				$sex1                    ="";
				if(!empty($sex))
				{
				$sex1.="and sex='$sex'";
				}
				$birth_date		                = !empty($_POST['birth_date']) ? trim($_POST['birth_date']) : '';
				$birth_date1                    ="";
				if(!empty($birth_date))
				{
				$birth_date1.="and birth_date='$birth_date'";
				}
				$jiguan					     = !empty($_POST['jiguan']) ? trim($_POST['jiguan']) : '';
				$jiguan1                     ="";
				if(!empty($jiguan))
				{
				$jiguan1.="and jiguan='$jiguan'";
				}
				$shenfenzhenghao			         = !empty($_POST['shenfenzhenghao']) ? trim($_POST['shenfenzhenghao']) : '';
				$shenfenzhenghao1                   ="";
				if(!empty($shenfenzhenghao))
				{
				$shenfenzhenghao1.="and shenfenzhenghao='$shenfenzhenghao'";
				}
				$minzu					         = !empty($_POST['minzu']) ? trim($_POST['minzu']) : '';
				$minzu1                          ="";
				if(!empty($minzu))
				{
				$minzu1.="and minzu='$minzu'";
				}
				
				$benkexuexiao		 = !empty($_POST['benkebiyeyuanxiao']) ? trim($_POST['benkebiyeyuanxiao']) : '';
				$benkexuexiao1                    ="";
				if(!empty($benkexuexiao))
				{
				$benkexuexiao1.="and benkexuexiao='$benkexuexiao'";
				}
				$benkebiyeshijian		          = !empty($_POST['benkebiyeshijian']) ? trim($_POST['benkebiyeshijian']) : '';
				$benkebiyeshijian1                ="";
				if(!empty($benkebiyeshijian))
				{
				$benkebiyeshijian1.="and benkebiyeshijian='$benkebiyeshijian'";
				}
				
				$zhengzhimianmao				   = !empty($_POST['zhengzhimianmao']) ? trim($_POST['zhengzhimianmao']) : '';
				$zhengzhimianmao1                  ="";
				if(!empty($zhengzhimianmao))
				{
				$zhengzhimianmao1.="and zhengzhimianmao='$zhengzhimianmao'";
				}
				$fudaoyuan		         = !empty($_POST['fudaoyuan']) ? trim($_POST['fudaoyuan']) : '';
				$fudaoyuan1                  ="";
				if(!empty($fudaoyuan))
				{
				$fudaoyuan1.="and fudaoyuan='$fudaoyuan'";
				}
				
				
				$souzaixi			 = !empty($_POST['souzaixi']) ? trim($_POST['souzaixi']) : '';
				$souzaixi1                  ="";
				if(!empty($suozaixi))
				{
				$souzaixi1.="and souzaixi='$souzaixi'";
				}
				$zhuanye				 = !empty($_POST['zhuanye']) ? trim($_POST['zhuanye']) : '';
				$zhuanye1                  ="";
				if(!empty($zhuanye))
				{
				$zhuanye1.="and zhuanye='$zhuanye'";
				}
				$email					 = !empty($_POST['email']) ? trim($_POST['email']) : '';
				$zhuanye1                  ="";
				if(!empty($zhuanye))
				{
				$zhuanye1.="and zhuanye='$zhuanye'";
				}
				$dianhua				 = !empty($_POST['dianhua']) ? trim($_POST['dianhua']) : '';
				$dianhua1                  ="";
				if(!empty($dianhua))
				{
				$dianhua1.="and dianhua='$dianhua'";
				}
				$shuoji					 = !empty($_POST['shouji']) ? trim($_POST['shouji']) : '';
				$shuoji1                  ="";
				if(!empty($shuoji))
				{
				$shuoji1.="and shuoji='$shuoji'";
				}
				$beizhu					 = !empty($_POST['beizhu']) ? trim($_POST['beizhu']) : '';
				$beizhu1                  ="";
				if(!empty($beizhu))
				{
				$beizhu1.="and beizhu='$beizhu'";
				}
				
				
			
		
		$sqlwhere       ="$name1 $xuehao1 $sex1 $birth_date1 $jiguan1 $shenfenzhenghao1   $minzu1  $benkexuexiao1  $benkebiyeshijian1 $zhengzhimianmao1 $fudaoyuan1 $souzaixi1 $zhuanye1  $dianhua1  $shuoji1 $beizhu1";
		$KeyWord		= "";
		$countSql		= "SELECT * FROM wkcx_student where name!='' $sqlwhere";//sql语句
		$pageSize		= "25"; //每页显示数
		$curPage		= !empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
		$urlPara		= $KeyWord;//这是URL后面跟的参数，也就是问号传值
		$pageOutStr		= reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
		$pageOutStrArr	= explode("||",$pageOutStr);
		$rsStart		= $pageOutStrArr[0];//limit 后的第一个参数
		$pageStr		= $pageOutStrArr[2];//limit 后的第二个参数
		$pageCount		= $pageOutStrArr[1];//总页数
		$rsCount 		= $pageOutStrArr[3];//总记录数
		$sql 			= "SELECT * FROM wkcx_student  where name!='' $sqlwhere  order by id DESC LIMIT $rsStart, $pageSize";
		$res			= $db->query($sql);
		$i = 1;
		while($row = $db->getarray($res))
		{
			$dw_id=$row['souzaixi'];
			$xk_id =$row['zhuanye']; 
?>            
            
            <tr class="listtabletitlecontentdouble" onMouseOver="this.className='listtabletitlecontent_over'" onMouseOut="this.className='listtabletitlecontentdouble'">
              <td height="25" align="center"><?=$i*$curPage?></td>
              <td align="center"><?=$row['name']?></td>
              <td height="25" align="center"><?=$row['sex']?></td>
              <td align="center"><?=$row['jiguan']?></td>
              <td align="center">
              <?php 
			  $sql1="select dw_name  from wkcx_danwei where id='$dw_id'";
			  $res1=$db->query($sql1);
			  $row1 = $db->getarray($res1);
			  echo $row1['dw_name'];
			  ?>
              </td>
              <td align="center">
               <?php
              $sql2="select xueke_name  from wkcx_xueke where id='$xk_id'";
			  $res2=$db->query($sql2);
			  $row2 = $db->getarray($res2);
			  echo $row2['xueke_name'];
			  ?>
              </td>
              <td height="25" align="center"><?=$row['dianhua']?></td>
              <td align="center"><?=$row['shuoji']?></td>
              <td height="25" align="center"><a href="student_update.php?id=<?=$row['id']?>">修改</a> | <a href="?id=<?=$row['id']?>" onClick="return confirm('确认要删除吗？');">删除</a></td>
            </tr>
<?php
		$i++;
	  }
	  }
?>   
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0">
            <tr>
              <td height="30" align="center">
               <?=$pageStr?>
              </td>
              </tr>
          </table>
            </div>
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
</div>
</BODY></HTML>

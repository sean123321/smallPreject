<?php
require("../includes/admin_init.php");
?>
<HTML><HEAD><TITLE>��Ҫ����</TITLE>
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
			alert("�������½����");
			document.getElementById("loginname").focus();
			return false;
		}
		

		if(document.getElementById("realname").value=="")
		{
			alert("��������ʵ������");
			
			document.getElementById("realname").focus();
			return false;
		}
		if(shenfenzheng.length<17||shenfenzheng.length>19)
		{
			alert("���֤�ű����� 17�� 19 λ��")
			
			document.getElementById("realname").focus();
			return false;
		}
		if(at==-1)
		{   
			alert("email ���Ϸ���");
			
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
 alert("���ֱ���С�� 10 ���ַ���")
 submitOK="false"
 }
if (isNaN(age)||age<1||age>100)
 {
 alert("��������� 1 �� 100 ֮������֡�")
 submitOK="false"
 }
if (at==-1) 
 {
 alert("������Ч�ĵ����ʼ���ַ��")
 submitOK="false"
 }
if (submitOK=="false")
 {
 return false
 }
}
</script>

<!--�����齨����-->
<link href="UI/css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id="hiddenDiv" style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="maintable">
  <tr class="navtable">
    <td>&nbsp;&nbsp;���ĵ�ǰλ�ã�ѧ������ > ѧ����ѯ</td>
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
                  <td height="29" align="left" background="UI/images/custom_arr1.jpg">&nbsp;&nbsp;<strong>ѧ����ѯ</strong></td>
                </tr>
                <tr > 
                  <td height="29" bgcolor="#FFFFFF" >
				<form action="student_list.php?act=search" method="post" enctype="multipart/form-data" name="myform"  onSubmit="return checks();">
				  <table width="100%" height="125" border="0" cellpadding="5" cellspacing="1" bgcolor="#f4f4f4">
                    <tr>
                      <td align="right" bgcolor="#FFFFFF">
                      <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC">
                            <tr>
                              <td width="146" align="right" nowrap bgcolor="#FFFFFF">ѧ������ </td>
                              <td width="349" bgcolor="#FFFFFF"><input name="name" class="inputuser" id="name" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                              <td width="168" align="right" bgcolor="#FFFFFF">ѧ��</td>
                              <td colspan="3" bgcolor="#FFFFFF"><input name="xuehao" class="inputuser" id="xuehao" style="width:100px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                              </tr>
                            <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">����Ա</td>
                          <td bgcolor="#FFFFFF">
                           <select name="fudaoyuan" id="fudaoyuan" style="width:80px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'">  <option value="">��ѡ��...</option>  
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
                          <td align="right" bgcolor="#FFFFFF">�� ��</td>
                          <td colspan="3" bgcolor="#FFFFFF">
                            <select name="sex" id="select">
                              <option value="">��ѡ��</option>
                              <option value="��">��</option>
                              <option value="Ů">Ů</option>
                            </select></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">��������</td>
                          <td bgcolor="#FFFFFF"><input name="birth_date" type="text" class="Wdate" id="birth_date" onFocus="WdatePicker({lang:'zh-cn'})"/></td>
                          <td align="right" bgcolor="#FFFFFF">�� ��</td>
                          <td colspan="3" bgcolor="#FFFFFF"><input name="jiguan" class="inputuser" id="jiguan" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">���֤��</td>
                          <td bgcolor="#FFFFFF"><input name="shenfenzhenghao" class="inputuser" id="shenfenzhenghao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">�� ��</td>
                          <td colspan="3" bgcolor="#FFFFFF">
                            <select name="minzu" id="minzu">
                              <option value="">��ѡ��...</option>                     
                              <option value="����">����</option>
                              <option value="�ɹ���">�ɹ���</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="ά�����">ά�����</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="׳��">׳��</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="��������">��������</option>
                              <option value="����">����</option>
                              <option value="����">����</option>
                              <option value="������">������</option>
                              <option value="����">����</option>
                              <option value="���">���</option>
                              <option value="��ɽ��">��ɽ��</option>
                              <option value="������">������</option>
                              <option value="ˮ��">ˮ��</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="�¶�������">�¶�������</option>
                              <option value="����">����</option>
                              <option value="���Ӷ���">���Ӷ���</option>
                              <option value="������">������</option>
                              <option value="Ǽ��">Ǽ��</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="ë����">ë����</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="������">������</option>
                              <option value="��������">��������</option>
                              <option value="ŭ��">ŭ��</option>
                              <option value="���α����">���α����</option>
                              <option value="����˹��">����˹��</option>
                              <option value="���¿���">���¿���</option>
                              <option value="�°���">�°���</option>
                              <option value="������">������</option>
                              <option value="ԣ����">ԣ����</option>
                              <option value="����">����</option>
                              <option value="��������">��������</option>
                              <option value="������">������</option>
                              <option value="���״���">���״���</option>
                              <option value="������">������</option>
                              <option value="�Ű���">�Ű���</option>
                              <option value="�����">�����</option>
                              <option value="��ŵ��">��ŵ��</option>
                            </select></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">���Ʊ�ҵԺУ</td>
                          <td bgcolor="#FFFFFF"><input name="benkebiyeyuanxiao" class="inputuser" id="benkebiyeyuanxiao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">��ҵʱ��</td>
                          <td colspan="3" bgcolor="#FFFFFF"><input name="benkebiyeshijian" type="text" class="Wdate" id="benkebiyeshijian" onFocus="WdatePicker({lang:'zh-cn'})"/></td>
                          </tr>
                        <tr>
                          <td align="right" nowrap bgcolor="#FFFFFF">������ò</td>
                          <td align="left" nowrap bgcolor="#FFFFFF"><input name="zhengzhimianmao" class="inputuser" id="zhengzhimianmao" style="width:200px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" nowrap bgcolor="#FFFFFF">����Ժϵ��רҵ</td>
                          <td colspan="3"  nowrap bgcolor="#FFFFFF"><select name="souzaixi" id="souzaixi" onChange="changelocation(document.myform.souzaixi.options[document.myform.souzaixi.selectedIndex].value)">
                              
                              <option value="">��ѡ��...</option>
                              
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
                              <option   selected   value="">��ѡ��</option>   
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
                          <td align="right" nowrap bgcolor="#FFFFFF">��������</td>
                          <td bgcolor="#FFFFFF"><input name="email" class="inputuser" id="email" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td align="right" bgcolor="#FFFFFF">��ϵ�绰</td>
                          <td width="167" bgcolor="#FFFFFF"><input name="dianhua" class="inputuser" id="dianhua" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          <td width="68" align="right" bgcolor="#FFFFFF">��&nbsp; ��</td>
                          <td width="154" bgcolor="#FFFFFF"><input name="shouji" class="inputuser" id="shouji" style="width:150px;" onFocus="this.className='inputuser-bor';" onBlur="this.className='inputuser'"></td>
                          </tr>
                       
                      </table></td>
                      </tr>
                   
					 <tr>
					   <td height="30" colspan="7" align="center" bgcolor="#FFFFFF"><table width="300" border="0" cellspacing="1" cellpadding="1">
					     <tr>
					       <td align="center"><input name="submit" type="submit"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="����" IsShowProcessBar="True"></td>
					       <td align="center"><input name="����" type="reset"  class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="����" IsShowProcessBar="True"></td>
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
              <td width="40">���</td>
             
              <td>ѧ������</td>
              <td>�� ��</td>
              <td>�� ��</td>
               <td width="60">����Ժϵ</td>
              <td>רҵ</td>
              <td>��ϵ�绰</td>
              <td width="80">��&nbsp; ��</td>
              <td width="80">����</td>
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
		$countSql		= "SELECT * FROM wkcx_student where name!='' $sqlwhere";//sql���
		$pageSize		= "25"; //ÿҳ��ʾ��
		$curPage		= !empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//ͨ��GET�����ĵ�ǰҳ��
		$urlPara		= $KeyWord;//����URL������Ĳ�����Ҳ�����ʺŴ�ֵ
		$pageOutStr		= reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
		$pageOutStrArr	= explode("||",$pageOutStr);
		$rsStart		= $pageOutStrArr[0];//limit ��ĵ�һ������
		$pageStr		= $pageOutStrArr[2];//limit ��ĵڶ�������
		$pageCount		= $pageOutStrArr[1];//��ҳ��
		$rsCount 		= $pageOutStrArr[3];//�ܼ�¼��
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
              <td height="25" align="center"><a href="student_update.php?id=<?=$row['id']?>">�޸�</a> | <a href="?id=<?=$row['id']?>" onClick="return confirm('ȷ��Ҫɾ����');">ɾ��</a></td>
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

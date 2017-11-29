<?php 
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<SCRIPT language=JavaScript src="js/pub.js" type=text/javascript></SCRIPT>
<script type="text/javascript"> 
function check(){   
        if(document.form1.news_title.value==""){
			alert("请输入名称题");
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



          
            <form action="?act=add" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();"><tr>
           


<table width="300" height="185" border="0" cellpadding="0" cellspacing="1"  bgcolor="#CCCCCC">
  <tr>
    <td height="30" bgcolor="#FFFFFF">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 添加产品ID</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF"><table width="100%" height="100" border="0" cellpadding="5"  >

    <tr>
      <td width="120" align="right" style="border-bottom:dashed 1px #dadada;"><strong>产品ID名称：</strong></td>
      <td style="border-bottom:dashed 1px #dadada;"> <input name="news_title" type="text" style="width:160px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'"></td>
      </tr>
    <tr>
      <td align="right"><strong>产品分类：</strong></td>
      <td><select name="cat_id" id="select">
        <option value="">请选择产品分类</option>
        <?php
                    sub_class(234,"");
                    function sub_class($pid,$cut)
                    {
                        $sql = "SELECT * FROM wkcx_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                			echo "<option value='".$row['id']."'>".$cut.$row['class_name']."</option>";
                            sub_class($row['id'],'|--'.$cut);
                        }
                    }
                ?>
      </select></td>
      </tr>
  </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="添加" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
                        <td align="center" width="75" ><input name="Submit2" type="reset" class="button" value="关闭" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" onClick="parent.doOk();"></td>
                      </tr>
        </table></td>
  </tr>
</table>

                
					
					
					
</form>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		function getnames($exname)
		{
    		$dir = "../uploadfile/".date("Y-n-j",time()+3600*8)."/";
    		$i=1;
    		if(!is_dir($dir))
			{
       			mkdir($dir,0777);
    		}
    		while(true){
        		if(!is_file($dir.$i.".".$exname))
				{
					$name=$i.".".$exname;
					break;
     			}
     			$i++;
   			}
    		return $dir.$name;
		}
		$news_title = !empty($_POST['news_title']) ? trim($_POST['news_title']) : '';
		$cat_id = !empty($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
		/*$news_desc = !empty($_POST['news_desc']) ? $_POST['news_desc'] : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		//img_thumb img_src
		$img_thumb = "";
		$small_img = "";
		$news_order = !empty($_POST['news_order']) ? intval($_POST['news_order']) : '';
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		/*上传附件*/
		/*if(!empty($_FILES['img_thumb']['name']))
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
		}*/
		$sql = "INSERT INTO wkcx_yz(cat_id,bianhao) 
						VALUES('$cat_id','$news_title')";
		
		if($db->query($sql))
		{
			goBakLoad('添加成功');
		}
		else
		{
			goBakMsg("添加失败");	
		}
		mysql_close($db->connect());
	}
?>

</BODY></HTML>
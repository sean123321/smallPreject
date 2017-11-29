<?php 
	session_start();
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
	if($act == "upd")
	{
		$sql = "SELECT * FROM wkcx_content WHERE id='$id'";
		$res = $db->query($sql);
		$row = $db->getarray($res);
		//echo $row['news_title'];
	}
	$tic=$row['brand_id'];
	$benid=$row['id'];
	$_SESSION['tic'] = "$tic";
	//echo $act;echo $id;
?>
<HTML><HEAD><TITLE>资讯修改</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script language="javascript" src="js/pub.js"></script>
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
		 if(document.form1.add_time.value==""){
			alert("请选择发布时间");
			return false;
		}
}
</script> 
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="swfupload/swfupload.js"></script>
<script type="text/javascript" src="js/swfupload.queue.js"></script>
<script type="text/javascript" src="js/fileprogress.js"></script>
<script type="text/javascript" src="js/handlers.js"></script>
<script type="text/javascript">
var swfu;

		window.onload = function() {
			var settings = {
				flash_url : "swfupload/swfupload.swf",
				upload_url: "upload.php",	
				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
				
				file_size_limit : "100 MB",
				file_types : "*.*",
				file_types_description : "All Files",
				file_upload_limit : 25,  //配置上传个数
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "images/TestImageNoText_65x29.png",
				button_width: "65",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '<span class="theFont"></span>',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	
			};

			swfu = new SWFUpload(settings);
	     };document.write(post_params);
	</script>
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 信息修改</td>
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
        <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
          <tr>
            <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
              <tr>
                <td align="center"><img src="images/icon_list.gif" width="16" height="16"></td>
                <td align="center"><p style="margin-top:3px"><a href="goods_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">信息列表</a></p></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form action="?act=update&id=<?=$id?>&curPage=<?=$curPage?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();"><tr>
              <td><DIV id=con>
<UL id=tags>
  <LI class=selectTag><A onClick="selectTag('tagContent0',this)" 
  href="javascript:void(0)">基本信息</A> </LI>
  <LI><A onClick="selectTag('tagContent1',this)" 
  href="javascript:void(0)">详细信息</A> </LI>
  </UL>
<DIV id=tagContent>
<DIV class="tagContent selectTag" id=tagContent0>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="120" align="right" bgcolor="#FFFFFF"><strong>视频名称：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_title" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" value="<?=@$row['news_title']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>是否推荐：</strong></td>
      <td bgcolor="#FFFFFF">&nbsp;<input type="radio" name="tuijian" value="yes" <?php if($row['tuijian']=='yes') echo "checked";?>>
        是
          <input type="radio" name="tuijian" value="no" <?php if($row['tuijian']=='no') echo "checked";?>>
          否</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>视频分类：</strong></td>
      <td bgcolor="#FFFFFF"><select name="cat_id" id="select">
        <option value="">请选择视频分类</option>
       			<?php
                    sub_class(1,"",$row['cat_id']);
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
      <td align="right" bgcolor="#FFFFFF"><strong>上传附件：</strong></td>
      <td bgcolor="#FFFFFF" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="200"><input type="file" name="img_thumb" id="img_thumb"></td>
            <td width="60"><img src="/<?=$row['small_img']?>" width="50"></td>
            <td>说明：如果重新上传图片会覆盖原来的图片</td>
            </tr>
        </table></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>视频上传：</strong></td>
      <td bgcolor="#FFFFFF">
	  <?php
	  	$sqla = "SELECT * FROM wkcx_xiangce WHERE red_id='$tic' ORDER BY id DESC";
		$resa = mysql_query($sqla);
		while($rowa = mysql_fetch_array($resa))
		{
	  
	  ?>
<table width="323" border="0" cellspacing="2" cellpadding="0">
  <tr>
    <td width="175" height="28"><?=$rowa['img_bthumb']?></td>
    <td width="25"><a href="?tuact=tudel&tuid=<?=$rowa['id']?>&act=upd&id=<?=$benid?>&src=<?=$rowa['img_bthumb']?>" style="color:#FF0000">刪除</a></td>
  </tr>
</table>

	  <?php
	  	}
	  ?>
	  <div id="content">
		
		
		<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">快速上传</span>	  </div>
		<div id="divStatus">0 个文件已上传</div>
			<div>
				<span id="spanButtonPlaceHolder"></span>←点击空白处浏览文件
				<input id="btnCancel" type="button" value="取消所有上传" onClick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
			&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#FF0000">请上传 FLV 格式的视频</span></div>
</div>
<script language="javascript">
getFile
</script>
	  </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>发布时间：</strong></td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=@$row['add_time']?>"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>显示顺序：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_order" type="text" style="width:100px;" class="inputuser" onBlur="this.className='inputuser'" value="<?=$row['news_order']?>">　　数值越小越靠前</td>
    </tr>
    
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>资讯简介：</strong></td>
      <td bgcolor="#FFFFFF"><textarea name="news_desc" class="inputuser" style="width:450px;height:100px" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"><?=@$row['news_desc']?></textarea></td>
      </tr>
  </table>
</DIV>
<DIV class=tagContent id=tagContent1>

<textarea name="content" id="myFCKeditor" style="DISPLAY: none"><?=@$row['news_content']?></textarea>
<INPUT id="myFCKeditor___Config" style="DISPLAY: none" type=hidden>
<IFRAME id="myFCKeditor___Frame" src="/FCKeditor/editor/fckeditor.html?InstanceName=myFCKeditor&amp;Toolbar=Default" frameBorder=0 width=100% scrolling=no height=500>
</IFRAME>
</DIV>
</DIV>
</DIV>
<SCRIPT type=text/javascript>
function selectTag(showContent,selfObj)
{
	// 操作标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 操作内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
</SCRIPT></td>
            </tr><tr><td height="35"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #BCE8B5">
                  <tr>
                    <td bgcolor="D2FFD2"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="修改" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
                        <td align="center" width="75" ><input name="Submit2" type="reset" class="button" value="重置" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'"></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
</td>
            </tr></form>
          </table></td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  
</table>
<?php
	$tuact= !empty($_GET['tuact']) ? trim($_GET['tuact']) : '';
	
	if($tuact=='tudel'){
		$tu_id = !empty($_GET['tuid']) ? intval($_GET['tuid']) : '';
		$src= !empty($_GET['src']) ? trim($_GET['src']) : '';
		$sql = "DELETE FROM wkcx_xiangce WHERE id='$tu_id'";
		//echo $sql;exit;
		$db->query($sql);
		echo "./".$src;exit;
		unlink('./$src');
		echo "<script>location.replace(document.referrer);</script>";
	}
	if($act == 'update')
	{
		$news_title = !empty($_POST['news_title']) ? trim($_POST['news_title']) : '';
		$cat_id = !empty($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
		$tuijian = !empty($_POST['tuijian']) ? $_POST['tuijian'] : '';
		$news_desc = !empty($_POST['news_desc']) ? $_POST['news_desc'] : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		$news_order = !empty($_POST['news_order']) ? intval($_POST['news_order']) : '';
		$img_thumb = "";
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		
		$brand_id=$_REQUEST['tic'];
		/*上传附件*/
		if(!empty($_FILES['img_thumb']['name']))
		{
			$up = new upload;
			$up->fileName = $_FILES["img_thumb"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=130;//缩略图宽度
			$up->sh=85;//缩略图高度
			$up->up();
			$img_thumb=$up->bImg; //返回大图片路径
			$img_thumb = str_replace("../", "", $img_thumb); 
			$small_img= $up->sImg;//返回缩略图片路径
			$small_img = str_replace("../", "", $small_img); 	
		}
		if(!empty($img_thumb))
		{	
			$sql = "UPDATE wkcx_content SET cat_id='$cat_id',news_title='$news_title',tuijian='$tuijian',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',img_thumb='$img_thumb',small_img ='$small_img ',news_url='$news_url',news_order='$news_order' WHERE id='$id'";
		}
		else
		{
			$sql = "UPDATE wkcx_content SET cat_id='$cat_id',brand_id='$brand_id',news_title='$news_title',tuijian='$tuijian',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',news_url='$news_url',news_order='$news_order' WHERE id='$id'";
		}
		$url = "goods_list.php?curPage=".$curPage;
	
		
		if($db->query($sql))
		{
		
			
				
						
		
			urlMsg('修改成功',$url);
			unset($_SESSION['tic']);
		}
		else
		{
			goBakMsg("修改失败");	
		}
		
	}
	mysql_close($db->connect());
?>
</div>
</BODY></HTML>
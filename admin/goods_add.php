<?php 
	session_start();
	define('IN_WKCX', true);
	if (!defined('IN_WKCX'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$tic=$_REQUEST['tic'];
	$_SESSION['tic'] = "$tic";
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
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
<script language="javascript" src="js/pub.js"></script>
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
		 if(document.form1.add_time.value==""){
			alert("请选择发布时间");
			return false;
		}
}
</script> 
<script type="text/javascript">
        var aid = 1;
        function attach_add()
        {
             var newNode = document.getElementById('theFile').firstChild.cloneNode(true);
             newNode.id = "file" + aid;
			// alert(aid);
             newNode.childNodes[1].name = "file_url[]";
             newNode.childNodes[3].name = "file_desc[]";
             newNode.childNodes[5].href = "javascript:attach_sub(" +aid+ ")";
             document.getElementById('myFile').appendChild(newNode);
             aid++;
        }
        attach_add();
        function attach_sub(id)
        {
             var theNode = document.getElementById('file'+id);             
             document.getElementById('myFile').removeChild(theNode);
        }
</script>
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 添加信息</td>
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
            <form action="?act=add" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();">
			<input type="hidden" name="tic" value="<?=$tic?>">
			<tr>
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
      <td bgcolor="#FFFFFF"><input name="news_title" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>是否推荐：</strong></td>
      <td bgcolor="#FFFFFF"><input type="radio" name="tuijian" value="yes">
        是
          <input name="tuijian" type="radio" value="no" checked>
          否</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>视频分类：</strong></td>
      <td bgcolor="#FFFFFF"><select name="cat_id" id="select">
        <option value="">请选择视频分类</option>
        <?php
                    sub_class(1,"");
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
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>视频缩略图：</strong></td>
      <td bgcolor="#FFFFFF"><input type="file" name="img_thumb" id="img_thumb"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>视频上传：</strong></td>
      <td bgcolor="#FFFFFF">
	  <div id="content">
		
		
		<div class="fieldset flash" id="fsUploadProgress">
			<span class="legend">快速上传</span>	  </div>
		<div id="divStatus">0 个文件已上传</div>
			<div>
				<span id="spanButtonPlaceHolder" title="浏览文件"></span>←点击空白处浏览文件
				<input name="button" type="button" disabled="disabled" id="btnCancel" style="margin-left: 2px; font-size: 8pt; height: 29px;" onClick="swfu.cancelQueue();" value="取消所有上传" />
				&nbsp;&nbsp;<span style="color:#FF0000">请上传 FLV 格式的视频，视频大小请不要超过10M</span></div>
</div>
<script language="javascript">
getFile
</script>
	  </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>发布时间：</strong></td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=date("Y-m-d H:i:s",time()+8*3600)?>"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>显示顺序：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_order" type="text" style="width:100px;" class="inputuser" onBlur="this.className='inputuser'" value="255">　　数值越小越靠前</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>资讯简介：</strong></td>
      <td bgcolor="#FFFFFF"><textarea name="news_desc" class="inputuser" style="width:450px;height:100px" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"></textarea></td>
      </tr>
  </table>
</DIV>


<DIV class=tagContent id=tagContent1>


<INPUT name="content" id="myFCKeditor" style="DISPLAY: none" type=hidden>
<INPUT id="myFCKeditor___Config" style="DISPLAY: none" type=hidden>
<IFRAME id="myFCKeditor___Frame" src="/FCKeditor/editor/fckeditor.html?InstanceName=myFCKeditor&amp;Toolbar=Default" frameBorder=0 width=100% scrolling=no height=500>
</IFRAME>

</DIV>

</DIV></DIV>
<SCRIPT type=text/javascript>
function selectTag(showContent,selfObj){
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
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="添加" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
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
  <tr>
    <td align="center" height="25">
          <center>
            技术支持：网科创想&nbsp;029-85458571&nbsp;<a href="http://www.xanet.net" target="_blank">www.xanet.net</a>
          </center></td>
  </tr>
</table>
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
		$tuijian = !empty($_POST['tuijian']) ? trim($_POST['tuijian']) : '';
		$news_desc = !empty($_POST['news_desc']) ? $_POST['news_desc'] : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		//img_thumb img_src
		$img_thumb = "";
		$small_img = "";
		$news_order = !empty($_POST['news_order']) ? intval($_POST['news_order']) : '';
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		
		$brand_id=$tic;
		/*上传附件*/
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
		$sql = "INSERT INTO wkcx_content(cat_id,brand_id,tuijian,news_title,news_desc,news_content,add_time,img_thumb,news_url,type,news_order,small_img) 
						VALUES('$cat_id','$brand_id','$tuijian','$news_title','$news_desc','$news_content','$add_time','$img_thumb','$news_url','1','$news_order','$small_img')";
		//echo $sql;exit;
		if($db->query($sql))
		{
		
		  	$last_id = mysql_insert_id();
				$file = $_FILES['file_url']['name'];
				for($i=0;$i<count($file);$i++)
				{
					$exname=@strtolower(substr($file[$i],(strrpos($file[$i],'.')+1)));
					$file_url = getnames($exname);//上传后文件所在的路径、、写入数据库
					
				
					@move_uploaded_file($_FILES['file_url']['tmp_name'][$i], $file_url);
					$file_url=str_replace("..","",$file_url);
					if(!empty($exname))
					{
						$file_desc = $_POST['file_desc'][$i];
						$sql = "insert into wkcx_xiangce(img_bthumb,img_desc,add_time,red_id) values('$file_url','$file_desc','$add_time','$last_id')";
						$db->query($sql);
						
						$sql = "SELECT * FROM wkcx_xiangce    WHERE img_bthumb!=''  and red_id='$last_id' ORDER BY  add_time DESC LIMIT 0,6";
						$res = $db->query($sql);
						$dd="";
						
						while($row = $db->getarray($res))
						{
						$ee="../".$row['img_bthumb']; 
						$arr=getimagesize($ee);
						$ww=$arr[0];
						$ww1=$arr[1];
							
						$dd.="<image>
  <url>".$row['img_bthumb']."</url> 
 <caption>
 <![CDATA[ <font size='50'></font> 
  ]]> 
  </caption>
  <width>".$ww."</width> 
  <height>".$ww1."</height> 
  </image>\r\n";
						}

			
$str="<?xml version=\"1.0\" encoding=\"utf-8\" ?> 

<gallery frameColor=\"0xFFFFFF\" frameWidth=\"15\" imagePadding=\"20\" displayTime=\"6\" enableRightClickOpen=\"true\">
".$dd."
 </gallery>";
file_put_contents("../xiangce/photo_".$last_id.".xml",$str);
	
					}
				}
				urlMsg('添加成功','goods_list.php');
				unset($_SESSION['tic']);
				
			
		}  
		else
		{
			goBakMsg("添加失败");	
		}
		mysql_close($db->connect());
	}
?>
</div>
</BODY></HTML>
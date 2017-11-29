<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理登陆页面</title>
<style>
*{
font-size:12px;
}
body{ background:url(http://www.xanet.net/adv/l_bg.jpg) top center}
.border{
 height:40px; width:270px;border:1px solid #BBBBBB; background-color:#FFF; line-height:40px;font-size:14px; ime-mode:disabled; 
 text-indent:10px; color:#999999
}

.btn1,.btn2{text-indent:10px; width:140px; height:40px;background-repeat:no-repeat;border:0px;cursor:pointer!important;cursor:hand; display:inline}
.btn1{  background-image:url(lo_qi.gif); }
.btn2{  background-image:url(lo_ho.gif); }

.btn3{width:86px; height:33px; background-image:url(images/main-pic.gif); background-repeat:no-repeat;border:0px; float:left; margin-left:31px; cursor:pointer!important;cursor:hand; display:inline}
.btn3{ background-position:-12px -11px}
.btn3:hover{ background-position:-111px -11px}



</style>
<SCRIPT LANGUAGE="JavaScript">
<!--
function killErrors()

{

return true;

}

window.onerror = killErrors;

function reloadcode(){
      var verify=document.getElementById('safecode');
      verify.setAttribute('src','../../includes/authimg.php?id='+Math.random());
}
/*判断用户名密码*/
function fLoginFormSubmit(){
	var fm = window.document.form1;
	var user = fm.username;
	user.value = fTrim( user.value); //Trim the input value.

	if( user.value =="") {
		window.alert("\请输入您的用户名");
		user.focus();
		event.returnValue = false;
		return false;
	}

	if( fm.password.value.length =="") {
		window.alert("\请输入您的密码");
		fm.password.focus();
		event.returnValue = false;
		return false;
	}

	
}
function fInitUserName()
{
	var fm = window.document.form1;
	var name = "";
	if( visitordata.data != null)
	{
		name = visitordata.data[0][0];
		//fm.remUser.checked = true;
		fm.username.autocomplete="on";
		//fm.secure.checked = (visitordata.data[0][3]==1);
	}else{
		fm.username.autocomplete="off";
		//fm.remUser.checked = getCookie("ntes_mail_noremember")!="true";
	}

	if( name != ""){
		fm.username.value = name;
		fm.password.focus();
	}else{
		fm.username.focus();
	}
}
function fTrim(str)
{
	return str.replace(/(^\s*)|(\s*$)/g, "");
}
var visitordata = new Cookie( document, "nts_mail_user", document.domain);
visitordata.load();


/*文本框样式*/
function $( id ){return document.getElementById( id );}


	function fEvent(sType,oInput){
		switch (sType){
			case "focus" :
				oInput.isfocus = true;
			case "mouseover" :
				oInput.style.borderColor = '#9ecc00';
				break;
			case "blur" :
				oInput.isfocus = false;
			case "mouseout" :
				if(!oInput.isfocus){
					oInput.style.borderColor='#84a1bd';
				}
				break;
		}
	}

try{
	if(!document.all){
		document.cookie="Coremail=;domain=163.com;path=/;expires="+(new Date()).toGMTString();
	}
}catch(e){}


//-->
</SCRIPT>
<!--[if lte IE 6]>
<script src="DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('div, ul, img, li, input , a');
    </script>
<![endif]--> 

</head>

<body onLoad="Onblurb()">
<table width="900" height="161" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="161"><img src="logo.png"></td>
  </tr>
</table>

<table width="900" height="309" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="674" height="30"><img src="meiyitian.png" /></td>
    <td width="274" valign="bottom">&nbsp;</td>
    <td width="52">&nbsp;</td>
  </tr>
  <tr>
    <td height="254" valign="top">
	<iframe style="width:582px; height:234px; margin:0 auto;" allowtransparency="true" src="http://www.xanet.net/adv/adv.php" frameborder="0" scrolling="no">
		</iframe>
	</td>
    <td valign="top">
	
	<form id="form1" name="form1" method="post" action="../logincheck.php" onSubmit="return fLoginFormSubmit();">
      <table width="100%" height="233" border="0" cellpadding="0" cellspacing="1">
        
        <tr>
          <td height="60" valign="top"><input type="text" class="border" name="username"  onMouseOver="fEvent('mouseover',this)" onMouseOut="fEvent('mouseout',this)" maxlength="10" value="用户名" onFocus="Onfocus()" onBlur="Onblur()" id="search" /></td>
        </tr>
        <tr>
          <td height="60" valign="top"><input type="password" name="password" class="border" onMouseOver="fEvent('mouseover',this)" onMouseOut="fEvent('mouseout',this)" maxlength="20" value=""  onfocus="Onfocusb()" onBlur="Onblurb()" id="searchb" /></td>
        </tr>
        <tr>
          <td height="60" valign="top"><table width="160" height="24" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="96"><input type="text"  name="imgpost"  id="vdcode" style="width:80px;" class="border"  onfocus="Onfocusc()" onBlur="Onblurc()" value="验证码" /></td>
              <td width="73" align="right"><img src="../../includes/authimg.php" name="img1" border="1" id="safecode" onClick="reloadcode()" style="cursor:hand"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="60" align="left">
			<input value="" type="submit" class="btn1" onMouseOver="this.className='btn2'" onMouseOut="this.className='btn1'" />			</td>
          </tr>
      </table>
      </form>
    </td>
    <td background="images/big.jpg" style="background-repeat:repeat-x; background-position:right;">&nbsp;</td>
  </tr>
  <tr>
    <td height="250">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="900" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
<!--    <td height="40" align="center">
	<iframe style="width:900px; height:60px; margin:0 auto; border:0; background:none;" allowtransparency="true" src="http://www.xanet.net/adv/foot.php" frameborder="0" scrolling="no"> </iframe></td>-->
  </tr>
</table>
<script type="text/javascript">
var Search=document.getElementById("search");
var Searchb=document.getElementById("searchb");
var vdcode=document.getElementById("vdcode");
function Onfocus()
{
 if(Search.value=="用户名")
 {
  Search.value="";
 }
}
function Onblur()
{
 if(Search.value=="")
 {
  Search.value="用户名";
 }
}


function Onfocusb()
{
 if(Searchb.value=="")
 {
  Searchb.value="";
  document.getElementById("searchb").style.background='#FFFFFF';
 }
}
function Onblurb()
{
 if(Searchb.value=="")
 {
  Searchb.value="";
  document.getElementById("searchb").style.background='url(mm.gif) no-repeat #FFF';
 }
}


function Onfocusc()
{
 if(vdcode.value=="验证码")
 {
  vdcode.value="";
 }
}
function Onblurc()
{
 if(vdcode.value=="")
 {
  vdcode.value="验证码";
 }
}
</script>
</body>
</html>


function swf_include(url,widthNum,hightNum,Access,bgColor,wMode,vars){
	var codeStr = "";
	codeStr += "<object classid=\"clsid:d27cdb6e-ae6d-11cf-96B8-444553540000\"";
	codeStr += "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9.0.47.0\" width=\""+widthNum+"\" height=\""+hightNum+"\">";
	codeStr += "<param name=\"allowScriptAccess\" value=\""+Access+"\" />";
	codeStr += "<param name=\"movie\" value=\""+url+"\" />";
	codeStr += "<param name=\"flashvars\" value=\""+vars+"\" />";
	codeStr += "<param name=\"menu\" value=\"false\" />";
	codeStr += "<param name=\"quality\" value=\"high\" />";
	codeStr += "<param name=\"wmode\" value=\""+wMode+"\" />";
	codeStr += "<param name=\"bgcolor\" value=\""+bgColor+"\" />";
	codeStr += "<embed src=\""+url+"\" flashvars=\""+vars+"\" allowScriptAccess=\""+Access+"\" menu=\"false\" quality=\"high\" wmode=\""+wMode+"\"";
	codeStr += "devicefont=\"true\" bgcolor=\""+bgColor+"\"  width=\""+widthNum+"\" height=\""+hightNum+"\" align=\"middle\" type=\"application/x-shockwave-flash\"";
	codeStr += "pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\">";
	codeStr += "</embed>";
	codeStr += "</object>";
	document.write(codeStr);
}
//For JcStesPlayer
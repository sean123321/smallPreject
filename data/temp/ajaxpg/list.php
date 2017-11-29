<?php
header("Content-type:text/html;charset=utf-8");//输出编码,避免中文乱码
?>
<html>
<head>
<title>ajax分页演示</title>
<script language="javascript" src="ajaxpg.js"></script>
</head>
<body>
<div id="result">
<?php

$page=isset($_GET['page'])?intval($_GET['page']):1;        //这句就是获取page=18中的page的值，假如不存在page，那么页数就是1。
$num=5;                                      //每页显示10条数据

$db=mysql_connect("localhost","root","cool2009") or die("数据库连接失败");;           //创建数据库连接
mysql_select_db("ajax",$db);                 //选择要操作的数据库

/*
首先咱们要获取数据库中到底有多少数据，才能判断具体要分多少页，具体的公式就是
总数据库除以每页显示的条数，有余进一。
也就是说10/3=3.3333=4 有余数就要进一。
*/
mysql_query("SET NAMES 'utf8'");

$result=mysql_query("select * from cr_userinfo");
$total=mysql_num_rows($result); //查询所有的数据

$url='list.php';//获取本页URL

//页码计算
$pagenum=ceil($total/$num);                                    //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num;                                        //获取limit的第一个参数的值，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。

//开始分页导航条代码：
$pagenav="显示第 <B>".($total?($offset+1):0)."</B>-<B>".min($offset+10,$total)."</B> 条记录，共 $total 条记录 ";

//如果只有一页则跳出函数：

if($pagenum<1) return false;

$pagenav.="<a href=javascript:dopage('result','$url?page=1');>首页</a> ";
if($prepg) $pagenav.=" <a href=javascript:dopage('result','$url?page=$prepg');>前页</a> "; else $pagenav.=" 前页 ";
if($nextpg) $pagenav.=" <a href=javascript:dopage('result','$url?page=$nextpg');>后页</a> "; else $pagenav.=" 后页 ";
$pagenav.=" <a href=javascript:dopage('result','$url?page=$pagenum');>尾页</a> ";
$pagenav.="</select> 页，共 $pagenum 页";

//假如传入的页数参数大于总页数，则显示错误信息
if($page>$pagenum){
      $page=$pagenum;
}

$info=mysql_query("select * from cr_userinfo limit $offset,$num");   //获取相应页数所需要显示的数据
while($it=mysql_fetch_array($info)){
       echo $it['title'];
       echo "<br>";
}                                                              //显示数据
  echo"<br>";
  echo $pagenav;//输出分页导航

?>
</div>
</body>
</html>

<?php phpinfo(); ?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Cloud System 雲端檔案系統</title>
<style type="text/css">
body {
	background-image: url(./images/bg.png);
}
td.tool {
	border-bottom-style:double;
	border-bottom-color:#C03;
	border-width:2px;
}
tr.vertical {
	//vertical-align:middle;	
	//text-align:center;
}
</style>
</head>

<body>
<table align="center" width="1000" bgcolor="#FFFFFF">
<tr><td><img src="images/logo.png" /></td></tr>
<tr>
  <td>
  <table align="center" width="600">
  <tr><td><? echo "<a href=\"view.php?user=".$_GET["user"]."&ndir=".$_GET["ndir"]."\">檔案檢視</a>" ?></td><td>檔案管理</td><td>管理介面</td><td><a href="changelog.php">Change Log</a></td><td><a href="about.php">關於</a></td></tr>
  </table>
  <?
  if($_GET["upp"]!="dis")
  	echo "<form method=\"get\" name=\"form1\">請輸入欲觀看之使用者目錄：<input name=\"user\" type=\"text\"  /></form><br />";
  include 'icons.php';
  include 'function.php';
  if(count($_GET)>0)
  {
	  if(count($_GET["ndir"])>0) //如果網址列有切換資料夾的話
 	 {
 		//echo "dir: ".$dir." ndir=".$_GET["ndir"]."<br>";;
		$dir=$dir.$_GET["ndir"];
 	 }
	 /*變數紀錄區*/
	 $userlen=strlen($_GET["user"]);
	$path="/home/".$_GET["user"]."/www";
	if(!file_exists($path."/".$dir)) //切換目錄
	{
		sign("error");
		echo "Page Not Found!!<p>";
		exit(0);
	}
	else
		chdir($path."/".$dir);
	//變數顯示
	/*
	echo "<i>您當前的網域(HTTP_HOST)是：".$_SERVER['HTTP_HOST']."</i><br>";
	echo "<i>目前所在的絕對路徑(getcwd)：".getcwd()."</i><br>";
	echo "path: ".$path." + dir: ".$dir." + ndir: ".$_GET["ndir"]."<br>";
	echo "<i>目前所在的資料夾(path.dir)：".basename($path."/".$dir)."</i><br>";
	echo "<i>資料夾/檔案 所在資料夾(pathpart)：".$pathpart['dirname']."</i><br>";*/
	$pathpart=pathinfo($path.$dir);
	$file=scandir($path."/".$dir);
	$filenum=count($file);
	
	echo "<table width=\"900\" align=\"center\"><tr><td align=\"left\" colspan=\"6\">";
	if($_GET["ndir"]!=NULL)
		echo "<h1><a href=\"manage.php?user=".$_GET["user"]."\"><img width=90 src=\"images/folder_public.png\"></a>".$_GET["ndir"]."</h1><p>";
	else
		echo "<h1><img width=90 src=\"images/folder_public.png\">"."/主目錄"."</h1><p>";
	echo "</td></tr>";
	
	//==========================================================
	if(($_GET["ndir"]!=NULL)&&$_GET["upp"]!="dis") //回上層資料夾
	{
		echo "<tr><td class=\"tool\" colspan=\"2\">";
		echo "<img width=\"64\" src=\"images/upper.png\">";
		echo "<a href=http://".$_SERVER['HTTP_HOST']."/manage.php?user=".$_GET["user"]."&ndir=".substr(str_replace(" ","%20",trim($pathpart['dirname'])),$userlen+10).">回上層資料夾</a><br>";
		echo "</td><td class=\"tool\" align=\"center\" colspan=\"2\">";
		archive();
		echo "選擇性打包";
		echo "</td><td class=\"tool\" align=\"right\" colspan=\"2\">";
		share();
		echo "<a href=\"http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."&upp=dis\">分享此頁面</a><br>";
	}
	echo "</td></tr>";
	//==========================================================
	$capacity=shell_exec("df -h | grep home");
	list($c_dev, $c_total, $c_used, $c_free, $c_percent, $c_mount) = preg_split("[    ]",$capacity);
	echo "<tr><td colspan=\"6\" align=\"right\">總共有$c_total 剩餘$c_free :: 已使用百分率: $c_percent</td></tr>";
	echo "<tr><td class=\"tool\">&nbsp;</td><td class=\"tool\">檔案名稱</td><td class=\"tool\">檔案類型</td><td class=\"tool\">大小</td><td class=\"tool\">最後修改</td><td class=\"tool\">選取</td></tr>";
	if(count($file[2])==0) //資料夾沒有檔案
	{
		//var_dump ($file);
		echo "<tr><td colspan=\"3\" align=\"center\">";
		sign("oops");
		echo "資料夾沒有檔案喔！";
		echo  "</td></tr>";
	}
	//==========================================================
	for($i=2;$i<$filenum;$i++)
	{
		echo "<tr>";
		if(is_dir($file[$i])==1) //如果這個檔案是資料夾的話
		{
			echo "<td>";
			folder();
			echo "</td><td>";
			print_r("<a href=http://".$_SERVER['HTTP_HOST']."/manage.php?user=".$_GET["user"]."&ndir=".str_replace(" ","%20",trim($_GET["ndir"]))."/".str_replace(" ","%20",trim($file[$i])).">".$file[$i]."</a>");
			echo "</td><td>資料夾</td><td></td><td>".date("Y F d H:i:s.",filemtime($file[$i]))."</td><td><input type=\"checkbox\" name=\"".$file[$i]."\" id=\"".$file[$i]."\"/></td>";
		}
		else //檔案
		{
			echo "<td>";
			extension($file[$i]);
			echo "</td><td>";
		  print_r("<a href=http://".$_SERVER['HTTP_HOST']."/~".$_GET["user"].str_replace(" ","%20",trim($dir))."/".str_replace(" ","%20",trim($file[$i])).">".$file[$i]."</a>");
		  echo "</td><td>";
		  ext_zhtw($file[$i]);
		  echo "</td><td>".size($file[$i])."</td><td>".date("Y F d H:i:s.",filemtime($file[$i]))."</td><td><input type=\"checkbox\" name=\"".$file[$i]."\" id=\"".$file[$i]."\"/></td>";
		}
		echo "</tr>";
	}
	//==========================================================
	echo "</table>";
  }
   ?>
</td></tr>
</table>
<div align="center"><font color="#FFFFFF">Copyright © Ted Shihhung Lin</font></div>
</body>
</html>
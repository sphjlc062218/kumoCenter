<?php
function extension($filename)
{
	//echo pathinfo($filename, PATHINFO_EXTENSION);
	//echo "<br>";
	switch(strtolower(pathinfo($filename, PATHINFO_EXTENSION))) 
	{
		case "pdf":
			echo "<img width=64 src=\"images/extension/adobe_pdf.png\">";
			break;
		case "docx":
			echo  "<img width=\"64\" src=\"images/extension/docx.png\">";
			break;
		case "doc":
			echo  "<img width=\"64\" src=\"images/extension/doc.png\">";
			break;
		case "pptx":
			echo "<img src=\"images/extension/pptx_win-64_32.png\">";
			break;
		case "ppt":
			echo  "<img width=\"64\" src=\"images/extension/ppt.png\">";
			break;
		case "jpeg":
		case "jpg":
			?><img style="width:30px;"src="images/extension/jpg.png"><?php
			break;
		case "png":
			echo "<img width=64 src=\"images/extension/png.png\">";
			break;
		case "tif":
			echo "<img width=64 src=\"images/extension/tiff.png\">";
			break;
		case "nef":
			echo "<img width=64 src=\"images/extension/nef.png\">";
			break;
		case "html":
		case "htm":
			echo "<img width=\"64\" src=\"images/extension/html.png\">";
			break;
		case "rar":
			echo  "<img width=\"64\" src=\"images/extension/rar.png\">";
			break;
		case "tar":
			echo  "<img width=\"64\" src=\"images/extension/tar.png\">";
			break;
		case "dmg":
			echo  "<img width=\"64\" src=\"images/extension/dmg.png\">";
			break;
		case "apk":
			echo  "<img width=\"64\" src=\"images/extension/apk.gif\">";
			break;
		case "ttc":
			echo  "<img width=\"64\" src=\"images/extension/font.png\">";
			break;
		case "psd":
			echo  "<img width=\"64\" src=\"images/extension/psd.png\">";
			break;
		case "7z":
			echo  "<img width=\"64\" src=\"images/extension/7z.png\">";
			break;
		case "nrg":
			echo  "<img width=\"64\" src=\"images/extension/Nero.png\">";
			break;
		case "iso":
			echo  "<img width=\"64\" src=\"images/extension/iso.png\">";
			break;
		case "asp":
		case "jsp":
		case "php":
			?><img style="width:30px;"src="images/extension/webdoc.png"><?php
			break;
		case "mov":
			echo  "<img width=\"64\" src=\"images/extension/mov.png\">";
			break;
		case "rtf":
			echo  "<img width=\"64\" src=\"images/extension/rtf.png\">";
			break;
		case "txt":
			echo  "<img width=\"64\" src=\"images/extension/txt.png\">";
			break;
		case "zip":
			echo  "<img width=\"64\" src=\"images/extension/zip.png\">";
			break;
		case "exe":
			echo  "<img width=\"64\" src=\"images/extension/exe.png\">";
			break;
		case "m4a":
		case "mp3":
			?><img style="width:30px;"src="images/extension/music.png"><?php
			break;
		case "mp4":
			echo  "<img width=\"64\" src=\"images/extension/mp4.png\">";
			break;
		default:
			?><img style="width:30px;"src="images/extension/other.png"><?php
	}
	//return $picurl;
}

function sign ($type)
{
	switch($type)
	{
		case "oops":
			?><img style="width:80px;" src="images/sign/oops.png"><?php
			break;
		case "error":
			?><img style="width:80px;" src="images/sign/Error.png"><?php
			break;
		case "back":
			?><img style="width:30px;" src="images/sign/upper.png"><?php
	}
}
function folder()
{
	?><img style="width:30px;" src="images/folder.png"><?php
}

function share()
{
	echo "<img width=\"48\" src=\"images/share.png\">";
}

function archive()
{
	echo "<img width=\"64\" src=\"images/archive.png\">";
}
?>
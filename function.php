<?php 
//<link href="css/bootstrap.css" rel="stylesheet">

function size($f_size)
{
	$a_bytes=filesize($f_size);
    if ($a_bytes < 1024) {
        return $a_bytes .' B';
    } elseif ($a_bytes < 1048576) {
        return round($a_bytes / 1024, 2) .' KB';
    } elseif ($a_bytes < 1073741824) {
        return round($a_bytes / 1048576, 2) . ' MB';
    } elseif ($a_bytes < 1099511627776) {
        return round($a_bytes / 1073741824, 2) . ' GB';
    } elseif ($a_bytes < 1125899906842624) {
        return round($a_bytes / 1099511627776, 2) .' TB';
    } elseif ($a_bytes < 1152921504606846976) {
        return round($a_bytes / 1125899906842624, 2) .' PB';
    } elseif ($a_bytes < 1180591620717411303424) {
        return round($a_bytes / 1152921504606846976, 2) .' EB';
    } elseif ($a_bytes < 1208925819614629174706176) {
        return round($a_bytes / 1180591620717411303424, 2) .' ZB';
    } else {
        return round($a_bytes / 1208925819614629174706176, 2) .' YB';
    }
}

function ext_zhtw($filename)
{
	switch(strtolower(pathinfo($filename, PATHINFO_EXTENSION))) 
	{
		case "pdf":
			echo "Adobe PDF文件";
			break;
		case "docx":
			echo  "MS Word 2007/2010文件";
			break;
		case "doc":
			echo  "MS Word 97-2003文件";
			break;
		case "pptx":
			echo "MS PowerPoint 2007/2010文件";
			break;
		case "ppt":
			echo  "MS PowerPoint 97-2003文件";
			break;
		case "jpeg":
		case "jpg":
			echo "JPEG圖檔";
			break;
		case "png":
			echo "PNG圖檔";
			break;
		case "tif":
			echo "TIFF圖檔";
			break;
		case "nef":
			echo "Nikon RAW file";
			break;
		case "html":
		case "htm":
			echo "Web document";
			break;
		case "rar":
			echo  "RAR archive";
			break;
		case "tar":
			echo  "TAR archive";
			break;
		case "dmg":
			echo  "Mac OS image";
			break;
		case "apk":
			echo  "Android application package";
			break;
		case "ttc":
			echo  "Opentype font";
			break;
		case "psd":
			echo  "Adobe Photoshop file";
			break;
		case "7z":
			echo  "7-zip archive";
			break;
		case "nrg":
			echo  "Nero image";
			break;
		case "iso":
			echo  "ISO image";
			break;
		case "php":
			echo  "PHP web file";
			break;
		case "mov":
			echo  "Quicktime video";
			break;
		case "rtf":
			echo  "Rich Text File";
			break;
		case "txt":
			echo  "Text file";
			break;
		case "zip":
			echo  "ZIP archive";
			break;
		case "exe":
			echo  "Windows execute file";
			break;
		case "m4a":
			echo  "Apple iTunes audio";
			break;
		case "mp3":
			echo  "MPEG audio format";
			break;
		case "mp4":
			echo  "MPEG4 media format";
			break;
		default:
			echo "Other";
	}
}

function file_action($user,$dir,$file) {
	$urlpath="user=".$user."&dir=".str_replace(" ","%20",trim($dir))."&file=".str_replace(" ","%20",trim($file));
	//echo $urlpath."<br>";
	switch(strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
		case "JPG":
		case "jpg":
			?><img style="position:relative; left:50%; top:50%; margin-left:-250px;" class="thumbnail" src="picture.php?width=500&<?php echo $urlpath;?>" scrolling="auto"><br />
			<h5 style="text-align:center;"><?php echo $file; ?></h5>
			<p style="text-align:center;"><button type="button" class="btn btn-default btn-sm" onclick="location.href='file.php?<?php echo $urlpath;?>';">
  				<span class="glyphicon glyphicon-download"></span>&nbsp;Download
			</button></p><?php 
			break;
		case "mp3":
		case "m4a":
			?><p><img src="images/extension/music.png" alt="music" /></p><audio src="file.php?<?php echo $urlpath;?>" preload="auto" loop controls>Your browser does not support audio tag!</audio>
			<h5 style="text-align:center;"><?php echo $file; ?></h5>
			<p style="text-align:center;"><button type="button" class="btn btn-default btn-sm" onclick="location.href='file.php?<?php echo $urlpath;?>';">
  				<span class="glyphicon glyphicon-download"></span>&nbsp;Download
			</button></p><?php
			break;
		case "mov":
			?><video controls="controls">
            	<source src="file.php?<?php echo $urlpath; ?>" type="video/mp4"/>
                 Your browser does not support the <code>video</code> element.
            </video>
			<h5 style="text-align:center;"><?php echo $file; ?></h5>
			<p style="text-align:center;"><button type="button" class="btn btn-default btn-sm" onclick="location.href='file.php?<?php echo $urlpath;?>';">
  				<span class="glyphicon glyphicon-download"></span>&nbsp;Download
			</button></p><?php
			break;
		case "php":
		case "html":
		case "htm":
			break;
		default:
			?><div style="width:200px; height:200px;position:relative; left:50%; top:50%; margin-top:80px; margin-left:-100px;">
                <div style="margin: 15px 0px 0px; display: inline-block; text-align: center; width: 200px;">
                	<div style="display: inline-block; padding: 2px 4px; margin: 0px 0px 5px; border: 1px solid rgb(204, 204, 204); text-align: center; background-color: rgb(255, 255, 255);"><a href="http://localtimes.info/Asia/Taiwan/Kao_Hsiung/" style="text-decoration: none; font-size: 13px; color: rgb(0, 0, 0);"><img src="http://localtimes.info/images/countries/tw.png"="" border=0="" style="border:0;margin:0;padding:0"=""> Kao+Hsiung</a>
                    </div>
					<script type="text/javascript" src="http://localtimes.info/clock.php?continent=Asia&country=Taiwan&city=Kao Hsiung&cp1_Hex=000000&cp2_Hex=FFFFFF&cp3_Hex=000000&fwdt=192&ham=0&hbg=0&hfg=0&sid=0&mon=0&wek=0&wkf=0&sep=0&widget_number=125"></script>
                </div>
            </div><?php
	}
}

?>
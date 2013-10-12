<?php
// <link href="css/bootstrap.css" rel="stylesheet">

require('icons.php');
require('function.php');
if($user) {
	$userlen=strlen($user);
	$basepath="/home/".$user."/www";
	if(count($_GET["dir"])>0) //如果網址列有切換資料夾的話
	{
		$dir=$dir.$_GET["dir"];
	}
	if(file_exists($basepath."/".$dir)) //切換目錄
	{
		chdir($basepath."/".$dir);
		$pathpart=pathinfo($basepath.$dir);
		$file=scandir($basepath."/".$dir);
		$filenum=count($file);
	}
}

//變數顯示

/*echo "<i>您當前的網域(HTTP_HOST)是：".$_SERVER['HTTP_HOST']."</i><br>";
echo "<i>目前所在的絕對路徑(getcwd)：".getcwd()."</i><br>";
echo "basepath: ".$basepath." + dir: ".$dir." + ndir: ".$_GET["dir"]."<br>";
echo "<i>目前所在的資料夾(path.dir)：".basename($basepath."/".$dir)."</i><br>";
echo "<i>資料夾/檔案 所在資料夾(pathpart)：".$pathpart['dirname']."</i><br>";*/
?>
<?php require('urlspace.php'); ?>	
<div style="padding-top:30px; margin:20px; height:500px;">
    <div class="panel panel-success" style="float:left; width:49%; height:500px; margin-right:5px;">
        <div class="panel-heading">
            <h3 class="panel-title">File List</h3>
        </div>
        <div class="panel-body" style="height:90%; overflow-y:auto;">
        	<table class="table" style="width:98%;">
            	<tr>
                	<td></td>
                	<td>Filename</td>
                    <td>Type</td>
                    <td>Size</td>
                    <td>Last modified</td>
                </tr>
                <?php if(!file_exists($basepath."/".$dir)) {?>
                <tr>
                	<td colspan="5" style="text-align:center; vertical-align:middle; font-size:20px;"><?php sign("error"); ?>Page not found！</td>
                </tr>
                <?php } else {
					if($_GET['dir']!=NULL) { ?>
                    <tr>
                    	<td><?php sign("back"); ?></td>
                        <td><a href="?user=<?php echo $user; ?><?php $tmpstr=substr(str_replace(" ","%20",trim($pathpart['dirname'])),$userlen+10); if($tmpstr) {?>&dir=<?php echo $tmpstr; }?>">..</a></td><td></td><td></td><td></td>
                    </tr>

				<?php }
					for($i=2;$i<$filenum;$i++) { ?>
					<tr>
						<?php if(is_dir($file[$i])==1) {//如果這個檔案是資料夾的話 ?>
							<td><?php folder(); ?></td>
							<td><?php print_r("<a href=?user=".$user."&dir=".str_replace(" ","%20",trim($dir))."/".str_replace(" ","%20",trim($file[$i])).">".$file[$i]."</a>"); ?></td>
							<td>Folder</td>
							<td></td>
							<td><?php echo date("Y-m-d H:i:s",filemtime($file[$i])); ?></td>
						<?php } else {//檔案?>
							<td><?php extension($file[$i]); ?></td>
							<td><a href="?user=<?php echo $user."&dir=".str_replace(" ","%20",trim($dir))."&file=".str_replace(" ","%20",trim($file[$i])); ?>"><?php echo $file[$i]; ?></a></td>
							<td><?php ext_zhtw($file[$i]); ?></td>
							<td><?php echo size($file[$i]); ?></td>
							<td><?php echo date("Y-m-d H:i:s",filemtime($file[$i])); ?></td>
						<?php } ?>
					</tr>
					<?php } ?>
            <?php } ?>
            </table>
        </div>
    </div>
    <div class="panel panel-warning" style="width:49%; height:500px; float:right; margin-left:5px;">
        <div class="panel-heading">
            <h3 class="panel-title">File Preview</h3>
        </div>
        <div class="panel-body" style="text-align:center;">
        	<?php file_action($user,$dir,$_GET['file']); ?>
        </div>
    </div>
</div>
<?php
if($_GET['width'])
	$width=$_GET['width'];
if($_GET['user'])
	$user=$_GET['user'];
if($_GET['dir'])
	$dir=$_GET['dir'];
if($_GET['file'])
	$file=$_GET['file'];
	$path="/home/".$user."/www".$dir."/".$file;
if(file_exists($path)) {
	include('tool/picture_resize.php');
	header('Content-Type: image/jpg'); 
	$image = new SimpleImage(); 
	
	$image->load($path); 
	$image->resizeToWidth($width); 
	$image->output();
}
?>
<?php
if($_GET['user'])
	$user=$_GET['user'];
if($_GET['dir'])
	$dir=$_GET['dir'];
if($_GET['file'])
	$file=$_GET['file'];
	$path="/home/".$user."/www".$dir."/".$file;
if(file_exists($path)) {
	header("Content-type:application");
    header("Content-Length: " .(string)(file_get_size($path)));
    header("Content-Disposition: attachment; filename=".$file);
    readfile($path);
}

function file_get_size($file) {
    //open file
    $fh = fopen($file, "r"); 
    //declare some variables
    $size = "0";
    $char = "";
    //set file pointer to 0; I'm a little bit paranoid, you can remove this
    fseek($fh, 0, SEEK_SET);
    //set multiplicator to zero
    $count = 0;
    while (true) {
        //jump 1 MB forward in file
        fseek($fh, 1048576, SEEK_CUR);
        //check if we actually left the file
        if (($char = fgetc($fh)) !== false) {
            //if not, go on
            $count ++;
        } else {
            //else jump back where we were before leaving and exit loop
            fseek($fh, -1048576, SEEK_CUR);
            break;
        }
    }
    //we could make $count jumps, so the file is at least $count * 1.000001 MB large
    //1048577 because we jump 1 MB and fgetc goes 1 B forward too
    $size = bcmul("1048577", $count);
    //now count the last few bytes; they're always less than 1048576 so it's quite fast
    $fine = 0;
    while(false !== ($char = fgetc($fh))) {
        $fine ++;
    }
    //and add them
    $size = bcadd($size, $fine);
    fclose($fh);
    return $size;
}
?>
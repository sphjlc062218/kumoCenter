<div style="margin:20px; height:20px;">
    <div style="width:150px; width:49%; float:left; margin-right:5px; margin-top:10px;" class="input-group">
        <span class="input-group-addon">Path:</span>
        <input class="form-control" name="path" type="text" value="<?php if($_GET['dir']) echo $dir; else echo "/";?>" disabled>
    </div>
    <div class="alert alert-info" style="width:49%; margin-left:5px; float:right;">
        <b>Space:</b>
        <?php 
        $capacity=shell_exec("df -h | grep home");
        list($c_dev, $c_total, $c_used, $c_free, $c_percent, $c_mount) = preg_split("[    ]",$capacity);
        echo "總共有$c_total 剩餘$c_free :: 已使用百分率: $c_percent";
        ?>
    </div>
</div>
<?php
	if($_GET['user'])
		$user=$_GET['user'];
?>
<!doctype html>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<meta charset="UTF-8">
<title>Kumo Center</title>
<style>

</style>
</head>

<body>
    <nav class="navbar navbar-default" role="navigation" style="margin:20px;">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">KumoCenter</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
          		<li class="active"><a href="#">View</a></li>
                <li><a href="#">Manage</a></li>
                <li><a href="#">Change Log</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="#">User:<?php echo $user; ?></a></li>
                <li><div style="width:150px; margin:5px;" class="input-group">
                	<span class="input-group-addon">@</span>
                    <form>
                    	<input class="form-control" name="user" type="text" placeholder="Username">
                    </form>
                </div></li>
            </ul>
        </div>
    </nav>
    <?php require('view.php'); ?>
    <footer>Copyright 2013 © Ted Shihhung Lin</footer>
</body>
</html>
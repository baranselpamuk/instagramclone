<?php
DATE_DEFAULT_TIMEZONE_SET('AFRICA/NAIROBI');
require('dbconnect.php');
session_start();
$id=$_SESSION['user'];
$sth=$conn->prepare( "SELECT * FROM users where user_id=:uid") ;
$sth->execute(array(':uid'=>$id));
$roww=$sth->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['insert']))
	{
	$content=$_POST['content'];
		$date_posted =date("Y-m-d", strtotime("now"));
		$time_posted =date("Y-m-d H:i:s",strtotime("now"));
$stmt=$conn->prepare('insert into post(content,date_posted,time_posted,user_id)values(?,?,?,?)');
$stmt->bindparam(1,$content);
$stmt->bindparam(2,$date_posted);
$stmt->bindparam(3,$time_posted);
$stmt->bindparam(4,$id);
$stmt->execute();
header('location:view.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
#ww{
position:relative;
top:100px;
}
</style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="http://localhost/instagram">J|socials</a>
</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li class=""><a href="post.php"><span class="glyphicon glyphicon-plus"></span></a></li>
<li class=""><a href="activity_log.php"><span class="glyphicon glyphicon-calendar"></span></a></li>
<li class=""><a href="myprofile.php"><span class="glyphicon glyphicon-user"></span></a></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench">Settings
<b class="caret"></span></b></a><!--dropdown menu--->	
<ul class="dropdown-menu">
<!--<li class=""><a href="profile.php">Profile settings</a></li>-->
<li class=""><a href="edit.php">General settings</a></li>
<li class="divider"></li>
<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
</ul>
</li>
</ul>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-body">
<form method="post" enctype="multipart/form-data" role="form" />
<label class="label-control" for="content">CONTENT</label>
<div class="form-group">
    <textarea class="form-control rounded-0" name="content" rows="10" placeholder="your post here______" /></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="insert">
<span class="glyphicon glyphicon-ok">
</span>
</button>
</div> 
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

        
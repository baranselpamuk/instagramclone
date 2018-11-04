<?php
error_reporting(~E_NOTICE);
require_once('dbconnect.php');
session_start();
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
body{
    background:#F6F6F6;   
}

#button{
position:relative;
top:70px;
left:20px;
}

#cg{
position:relative;
top:70px;
left:20px;
}
.avatar4{
	position:relative;
    vertical-align: middle;
    width: 200px;
    height: 200px;
    border-radius: 200%;
	float:left;
}

.p{
position:relative;
top:90px;
left:1px;
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
<div class="col-md-6 col-md-push-3">
<div class="panel panel-default">
<div class="panel-body">
<b><p class="text-primary"><strong>EDIT PROFILE</strong></p></b><br /><hr />
<b><p class="text-primary"><strong>CHANGE PASSWORD</strong></p></b><br /><hr />
<b><p class="text-primary"><strong>PRIVACY AND SECURITY</strong></b></p><br /><hr />
<b><p class="text-info"><strong>THE ABOVE FEATURES IS UNDER CONSTRUCTION</strong></p></b><hr /><br />
<b><p class="text-info"><strong>BELOW IS A LIST OF UPCOMING FEATURES</strong></p></b><br /><br />
<ol>
<b><li class="text-danger">LAST SEEN</li></b>
<b><li class="text-danger"> FOLLOW & UNFOLLOW</li></b>
<b><li class="text-danger">ACTIVATE & DEACTIVATE ACCOUNT</li></b>
<b><li class="text-danger">TRACKING USERS LAST LOG OUT TIME & DATE</li></b>
</ol>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>  
</html>
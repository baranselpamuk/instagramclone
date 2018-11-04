<?php
error_reporting(~E_NOTICE);
require_once('dbconnect.php');
session_start();
 
	/*$sth=$conn->prepare( "SELECT * FROM users left join bio on users.mem_id =bio.mem_id where mem_id=:mid") ;
if($sth->execute(array(':mid'=>$id)))
{
$roww=$sth->fetch(PDO::FETCH_ASSOC);
$count=$sth->rowcount();
}
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="/style.css">
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
<a class="navbar-brand" href="http://localhost/jsocial">J|socials</a>
</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li class=""><a href="#"><span class="glyphicon glyphicon-map-marker"></span></a></li>
<li class=""><a href="#"><span class="glyphicon glyphicon-heart"></span></a></li>
<li class=""><a href="myprofile.php"><span class="glyphicon glyphicon-user"></span></a></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench">Settings
<b class="caret"></span></b></a><!--dropdown menu--->	
<ul class="dropdown-menu">
<li class=""><a href="profile.php">Profile settings</a></li>
<li class=""><a href="#">General settings</a></li>
<li class="divider"></li>
<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out">Logout</span></a></li>
</ul>
</li>
</ul>
</div>
</nav>
<div class="container">
<div class="row">
<div class="panel panel-default">
<div class="panel-body">
<img src="images/chuoni.jpg" alt="Avatar" class="avatar4">
<div class="col-lg-6">
<a href="edit.php" ><button class="btn btn-default" id="button" style="width:100px;
height:40px;"> <b>Edit Profile</b></button></a>
<a href="setting.php"><span class="glyphicon glyphicon-cog" id="cg"></a></span>
</div>
<div class="col-sm-6">
<p class="p"><a href="post.php">0 posts </a>&nbsp;&nbsp;&nbsp;
<a href="follower.php">1 follower<?php echo $roww['website'] ; ?></a>&nbsp;&nbsp;&nbsp;<a href="following.php">100 following</a></p>
</div>

			
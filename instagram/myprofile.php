<?php
require('dbconnect.php');
session_start();
$id=$_SESSION['user'];
$sth=$conn->prepare( "SELECT * FROM users where user_id=:id") ;
$sth->execute(array(':id'=>$id));
$row=$sth->fetch(PDO::FETCH_ASSOC);
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
.avatar
{
	position:relative;
    vertical-align: middle;
    width: 100px;
    height: 100px;
    border-radius: 70%;
	float:right;
	bottom:550px;
	clear:both;
	left:0.1%;
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
			<div class="col-md-6">
			<div class="panel panel-default">
			<div class="panel-body">
			<a href="add_profile.php"><span class="glyphicon glyphicon-plus">COMPLETE YOUR PROFILE ONCE</a></span>                                                                  
	              </div>
</div>
</div>	
<?php
$id=$_SESSION['user'];
$query=$conn->query("select * from users left join profile on users.user_id=profile.user_id where users.user_id ='$id'");		  
                 while($row=$query->fetch())
				 {
					 ?>
					 <div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
					 <?php echo "FULL NAME".'<p class="text-primary">'. $row['name'];?></p><br />
					  <?php echo "PHONE".'<p class="text-primary">'. $row['phone'];?></p><br />
					 <?php echo "WEBSITE".'<p class="text-primary">'. $row['website'];?></p><br />
				 <?php echo "E MAIL".'<p class="text-primary">'. $row['email'];?></p><br />
					  <?php echo "BIO".'<p class="text-primary">'. $row['bio'];?></p><br />
					   <?php echo "GENDER".'<p class="text-primary">'. $row['gender'];?></p><br />
					    <?php echo "YOU WORKED ON THIS PROFILE ON".'<p class="text-primary">'. date("d/m/y",strtotime($row['date_edited']));?></p><br />
					 <?php echo "YOU WORKED ON THIS PROFILE SINCE".'<p class="text-primary">'. date("h:i:A",strtotime($row['time_edited']));  ?></p><br />
					 
					<img src="uploads/<?php echo $row['photo']; ?>" class="avatar" /><!--width="250px" height="250px" />-->
					 <?php
				 }
				 ?>
				 </div>
				 </div>
				 </div>
				 </div>
				 </div>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>  
</html> 
 
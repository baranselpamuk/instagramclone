<?php
DATE_DEFAULT_TIMEZONE_SET('AFRICA/NAIROBI');
require('dbconnect.php');
function start_session()
{
	$_SESSION['user']='';
	session_start();
if(empty($_SESSION['user']))
{
	header("Location:index.php");
	exit();
	}
}
echo start_session();
function db_query()
{
	$conn=connect();
$stmt=$conn->prepare( "SELECT * FROM users where user_id=:uid") ;
if($stmt->execute(array(':uid'=>$_SESSION['user'])))
{
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	$count=$stmt->rowcount();
	}
	}
	echo db_query();
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
#ww{
position:relative;
width:1400px;
max-width:100%;
height:350px;
bottom:30px;
}

#tt{
position:relative;
text-align: justify;
max-width:100%;
width:300px;
margin:auto;
height:auto;
right:20%;
top:190px;
height:200px;
}

	/*.avatar {
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
	float:left;
}

.avatar2 {
	position:relative;
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
	float:left;
	top:80px;
	clear:both;
	left:0.1%;
}

.avatar3 {
	position:relative;
    vertical-align: middle;
    width: 50px;
    height: 50px;
    border-radius: 50%;
	float:left;
	top:150px;
	clear:both;
	left:0.1%;
}
#asside{
position:relative;
background-color:#FFF;
box-shadow: 0 2px 10px 0 rgba(1, 1, 1, 0.2);
text-align: justify;
max-width:100%;
width:600px;
margin:auto;
height:auto;
float:left;
top:50px;
}



#side{
position:relative;
background-color:#FFF;
box-shadow: 0 2px 10px 0 rgba(1, 1, 1, 0.2);
text-align: justify;
max-width:100%;
width:800px;
margin:auto;
height:auto;
float:left;
top:10px;
left:1px;
}
*/
#aside{
position:relative;
background-color:#FFF;
box-shadow: 0 2px 10px 0 rgba(1, 1, 1, 0.2);
text-align: justify;
max-width:100%;
width:600px;
margin:auto;
height:auto;
float:left;
top:100px;
left:1px;
border-radius:5px;
box-shadow: 0 5px 10px 0 rgba(1, 1, 1, 0.2);
}
.avatar
{
	position:relative;
    vertical-align: middle;
    width: 100px;
    height: 100px;
    border-radius: 50%;
	float:right;
	bottom:30px;
	clear:both;
	left:1%;
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
<?php
			$id=$_SESSION['user'];
$query = $conn->query("SELECT * FROM users inner join activity on users.user_id =activity .user_id WHERE users.user_id = '$id'");
$query->execute();
	
	if($query->rowCount() > 0)
	{
		while($row=$query->fetch(PDO::FETCH_ASSOC))
		{
			?>		
<?php echo "DEAR"."\n"."\n".strtoupper($row['name'])."\n"."\n"."YOU LAST LOGIN WAS"."\n".date('h:i:A',strtotime($row['time_loged']));?><br /><br /><br />
<?php
	}
	}
?>	
</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-body">
<b><p class="text-danger">YOU ARE NOW A MEMBER OF THIS NETWORK SINCE</p><b /><br />
	         <?php
			$id=$_SESSION['user'];
	$query = $conn->query("SELECT * FROM users WHERE user_id='$id'");
	while($row = $query->fetch(PDO::FETCH_ASSOC))
	{
			?>
				<?php echo date('D:M:Y',strtotime($row['date_joined']))."\n".date('h:i:s:A',strtotime($row['time_joined']));?><br /><br />
<?php
	}
?>
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
 
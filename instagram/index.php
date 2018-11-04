<?php
DATE_DEFAULT_TIMEZONE_SET('AFRICA/NAIROBI');
require_once('dbconnect.php');
session_start();
if (isset($_SESSION['user'])!=""){
	header("Location:view.php");
	exit;
}
function escape_input($values){
		$values = trim($values);
		$values = htmlspecialchars($values);

		return $values;//u can use ur own functions just as the way u use built in functions
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['login'])){
			$email=escape_input($_POST['email']);
			$password=escape_input($_POST['password']);
			
			$sth=$conn->prepare("SELECT * FROM users WHERE email=?");
			$sth->execute([$email]);//used an array
			$row=$sth->fetch(PDO::FETCH_ASSOC);
			$count=$sth->rowcount();
			if (password_verify($password, $row['password']) && $count > 0 | $count==1){
				$_SESSION['user'] = $row['user_id'];
				$time_loged =date("Y-m-d H:i:s",strtotime("now"));
				$stmt=$conn->prepare('insert into activity(time_loged,user_id)VALUES(?,?)');
				$stmt->bindparam(1,$time_loged);
				$stmt->bindparam(2,$_SESSION['user']);
				$stmt->execute();
				header('location:view.php');
			}else{
				$_SESSION['msg']='<span class="text text-danger">
				<b>Something went wrong</b></span>';
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--->
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
#ww{
position:relative;
top:200px;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-6 col-sm-push-3" id="ww">
<?php
	if(isset($_SESSION['msg']))
	{
			?>
<?php
echo $_SESSION['msg'];
	}
?>
            <?php
			unset($_SESSION['msg']);
		?>  
<form method="post" enctype="multipart/form-data" class="form-horizontal">
<label class="control-label"></label>
<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Email" required="required" />
    </div>
<label class="control-label"></label>
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="Password" required="required" />
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="login">
<span class="glyphicon glyphicon-log-in">
</span>
</button>
<center>
<a href="register.php">Kayıt Ol</a>
</center>
</div> 
</body>
</html>

        
<?php
DATE_DEFAULT_TIMEZONE_SET('AFRICA/NAIROBI');
require_once("dbconnect.php");
session_start();
function escape_input($values)
	{
		$values = trim($values);
		$values = htmlspecialchars($values);

		return $values;
	}
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
if(isset($_POST['register']))
{
$name=escape_input($_POST['name']);
$email=escape_input($_POST['email']);
$password=escape_input($_POST['password']);
$time_joined =date("Y-m-d H:i:s",strtotime("now"));
$date_joined =date("Y-m-d", strtotime("now"));
if(empty($name))
{
	$_SESSION['msg']="name is required";
}
if(empty($email))
{
	$_SESSION['msg']="Email adress is required";
}
 if(empty($password))
{
	$_SESSION['msg']="Password is required";
}
switch($name)
{
	case 'soapopera':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'iron man':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'mission impossible':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'keeping up with the kardashians':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;//tv shows
	case 'pussy':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'dick':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'butt':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'boobs':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'breasts':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;//parts of the body
	case 'monkey'://animals
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'football':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'basketball':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'voleball':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'tenis':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'karate':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'judo':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'dojo':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;//sport
	case 'banana'://fruits
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;
	case 'rice':
	$_SESSION['msg']='Sorry it is important to use your real name';
	break;//food
	default:
	//add more names
}
$stmt=$conn->prepare('select name from users where name=?');
$stmt->execute([$name]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowcount();
if($count > 0)
{
	$_SESSION['msg']='<span class="text-danger">Sorry name already taken</span> ';
}
$stmt=$conn->prepare('select password from users where password=?');
$stmt->execute([$password]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowcount();
if($count>0)
{
	$_SESSION['msg']='<span class="text-danger">Password you trying to enter already taken</span>';
}
$stmt=$conn->prepare('select email from users where email=?');
$stmt->execute([$email]);
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$count=$stmt->rowcount();
if($count > 0)
{
	$_SESSION['msg']='<span class="text-danger">Sorry Email Already Taken try using another email</span>';
}
if(!isset($_SESSION['msg']))
{
$encrypt = password_hash($password, PASSWORD_DEFAULT);
$sth=$conn->prepare("INSERT INTO users(name,email,password,time_joined,date_joined)VALUES(?,?,?,?,?)");
$sth->bindparam(1,$name,PDO::PARAM_STR);
$sth->bindparam(2,$email,PDO::PARAM_STR);
$sth->bindparam(3,$encrypt,PDO::PARAM_STR);
$sth->bindparam(4,$time_joined,PDO::PARAM_STR);
$sth->bindparam(5,$date_joined,PDO::PARAM_STR);
if($sth->execute())
{
$_SESSION['msg']="You are now the member of this Network.....";
header("refresh:1;index.php");
                                }
                     }
    }
	}
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
#ww{
position:relative;
top:100px;
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
?>
            <?php
			unset($_SESSION['msg']);
	}
		?>  
<form method="POST" enctype="multipart/form-data" >
<label class="control-label">FULL NAME:</label>
<div class="form-group">
<input type="text" class="form-control" name="name"  required="required"/>
</div>
<label class="control-label">E-MAIL:</label>
<div class="form-group">
<input type="email" class="form-control" name="email" required="required"/>
</div>
<label class="control-label">PASSWORD:</label>
<div class="form-group">
<input type="password" class="form-control" name="password" required="required"/>
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="register">
<span class="glyphicon glyphicon-log-in">
</span>
</button>
</div> 
</body>
</html>

        
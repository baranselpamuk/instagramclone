<?php
DATE_DEFAULT_TIMEZONE_SET('AFRICA/NAIROBI');
require_once('dbconnect.php');
//$conn=connect();
session_start();
$id=$_SESSION['user'];
$sth=$conn->prepare( "SELECT * FROM users where user_id=:id") ;
$sth->execute(array(':id'=>$id));
$row=$sth->fetch(PDO::FETCH_ASSOC);
//if($_SERVER['REQUEST_METHOD']=='POST')
//{
	if(isset($_POST['submit']))
	{
		$website=$_POST['website'];
		$bio=$_POST['bio'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$time_edited =date("Y-m-d H:i:s",strtotime("now"));
		$date_edited =date("Y-m-d", strtotime("now"));
		$photo=$_FILES['photo']['name'];
		$tmp_dir=$_FILES['photo']['tmp_name'];
		$size=$_FILES['photo']['size'];
		$upload_dir='uploads/';
		$extension = strtolower(pathinfo($photo,PATHINFO_EXTENSION)); //lower image extension from .JPG to .jpg or whatever
		$photo=basename($photo).'.'.$extension;//basename return uploaded file name
		$stmt=$conn->prepare('select photo from profile where photo = ?');
        $stmt->execute([$photo]);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        $count=$stmt->rowcount();
        if($count > 0)
{
	$show_error='Photo already exist';
}
		if($photo >5000000)
		{
$show_error='Photo too big try 5MB or less';
		}
		switch($extension)
		{
			case 'pdf':
			$show_error='PDF files not allowed';
			break;
			case 'html':
			$show_error='HTML html files not allowed';
			break;
			case 'mp4':
			$show_error='MP4 files not allowed';
			break;//add more unsuported file formats
			default:
		}
move_uploaded_file($tmp_dir,$upload_dir.$photo);
if(!isset($show_error))
		{
			
			//$stmt = $conn->prepare("UPDATE profile SET website=:website,bio=:bio,gender=:gender,phone=:phone,photo=:photo,date_edited=:date_edited,time_edited=:time_edited WHERE user_id=:id");
			$stmt = $conn->prepare("INSERT INTO profile (website,bio,gender,phone,photo,date_edited,time_edited,user_id)VALUES(:ww,:bb,:gg,:pp,:ph,:dt,:tm,:uid)");
			$stmt->bindParam(':ww',$website);
			$stmt->bindParam(':bb',$bio);
			$stmt->bindParam(':gg',$gender);
			$stmt->bindParam(':pp',$phone);
			$stmt->bindParam(':ph',$photo);
			$stmt->bindParam(':dt',$date_edited);
			$stmt->bindParam(':tm',$time_edited);
			$stmt->bindParam(':uid',$id);
			if($stmt->execute())
			{
				header("location:myprofile.php");
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
<nav class="navbar navbar-default" role="navigation"><!--add navbar fixed top--->
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
<?php
if(isset($show_error))
{
	?>
	<div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign">
				</span> <strong>
				<?php echo $show_error; ?></strong>
            </div>
			<?php
}
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="form-horizontal" />
<div class="form-group">
<label class="control-label" for="website">WEBSITE</label>
<input class="form-control" type="text" name="website" placeholder="your website" />
</div>
<div class="form group">
<label class="label-control" for="bio">BIO</label>
    <textarea class="form-control rounded-0" name="bio" rows="10" placeholder="your bio here______" /></textarea>
</div><br />
<div class="form-group">
<label class="control-label" for="phone">PHONE</label>
<input class="form-control" type="text" name="phone" placeholder="your phone" />
</div>
<div class="form-group">
<label class="control-label" for="gender">GENDER</label>
<select class="form-control" name="gender" />
<option>MALE</option>
<option>FEMALE</option>
<option>NOT SPECIFIED</option>
</select>
</div><br />
<div class="form-group">
<label class="control-label" for="photo">PHOTO.</label>
<input class="input-group" type="file" name="photo" accept="image/*" />
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="submit" />
<span class="glyphicon glyphicon-save">
</button>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

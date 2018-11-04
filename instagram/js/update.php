<?php
error_reporting(~E_NOTICE);
require_once('dbconnect.php');
//session_start();
if(isset($_GET['mem_id']))
{
	$id= $_GET['mem_id'];
	$sth=$conn->prepare( "SELECT * FROM users left join bio on users.mem_id=bio.mem_id where mem_id=:mid") ;
if($sth->execute(array(':mid'=>$id)))
{
$roww=$sth->fetch(PDO::FETCH_ASSOC);
$count=$sth->rowcount();
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
<form method="post" enctype="multipart/form-data" >
<label class="control-label">FIRST NAME:</label>
<div class="form-group">
<input type="text" class="form-control" name="fname"/>
    </div>
<label class="control-label">LAST NAME:</label>
<div class="form-group">
<input type="text" class="form-control" name="lname" />
</div>
<label class="control-label">FULL NAME:</label>
<div class="form-group">
<input type="text" class="form-control" name="fullname" />
</div>
<label class="control-label">E-MAIL:</label>
<div class="form-group">
<input type="email" class="form-control" name="email" />
</div>
<label class="control-label">GENDER:</label>
<div class="form-group">
<select class="form-control" style="width:100px;"  name="country" placeholder="Your country" value="<?php echo $country; ?>" />
<option></option>
   <option>MALE</option>
   <option>FEMALE</option>
   <option>NOT SPECIFIED</option>
   </select>
   </div>
   <div class="form-group">
   <label class="control-label">WEBSITE:</label>
<div class="form-group">
<input type="text" class="form-control" name="website" />
</div>
<div class="form-group">
   <label class="control-label">BIO:</label>
<div class="form-group">
<input type="text" class="form-control" name="bio" />
</div>
<div class="form-group">
   <label class="control-label">WEBSITE:</label>
<div class="form-group">
<input type="text" class="form-control" name="website" />
</div>
<div class="form-group">
<label class="control-label">Profile Img.</label>
<input class="input-group" type="file" name="img" accept="image/*" /></td>
</div>
<div class="form-group">
   <label class="control-label">PHONE:</label>
<div class="form-group">
<input type="text" class="form-control" name="phone" />
</div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="register">
<span class="glyphicon glyphicon-ok">
</span>
</button>
</div> 
</body>
</html>

        
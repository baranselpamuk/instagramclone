<?php
error_reporting(~E_NOTICE);
require_once('dbconnect.php');
if(isset($_GET['mem_id']))
{
		$id = $_GET['mem_id'];
		$sth = $conn->prepare('SELECT * FROM register WHERE mem_id =:memid');
		$sth->execute(array(':memid'=>$id));
		$row = $sth->fetch(PDO::FETCH_ASSOC);
	}
session_start();
if(isset($_POST['save']))
{
	$photo=$_FILES['photo_name']['name'];
	$tmp_location=$_FILES['photo_name']['tmp_name'];
	$size=$_FILES['photo_name']['size'];
	$mem_id=$_post['mem_id'];
	if(empty($photo))
	{
		$_SESSION['msg']="Image Needed";
	}
		else
		{
	$upload='uploads/';
	$ext=strtolower(pathinfo($photo,PATHINFO_EXTENSION));//lower img extension_loade
	$photo_extension=array();
	$photo_name = rand(1,10).".".$ext;
	array_push($photo_extension,'jpg','mp4','doc','docx','png');
	if(is_array($photo_extension))
	{
	//if(in_array($photo_extension,$ext))
	//{
			move_uploaded_file($tmp_location,$upload.$photo_name);
	sort($photo_name);
	}
	else if($photo_extension!==$photo_extension)
	{
      $_SESSION['msg']="enter allowed extensions";
	}
		}
if(!isset($_SESSION['msg']))
		{
			$sth = $conn->prepare('UPDATE photo set photo_name=:phot, mem_id=memid WHRE mem_id=:memid');
			$sth->bindParam(':phot',$photo_name);
			$sth->bindParam(':memid',$id);
			if($sth->execute())
			{
				$_SESSION['msg']= "Every thing is well";
				header("refresh:2;view.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				//$errMSG = "error while inserting....";
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

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
            <a class="navbar-brand" href="http://www.codingcage.com" title='Programming Blog'>Coding Cage</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/CRUD">CRUD</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/PDO">PDO</a>
            <a class="navbar-brand" href="http://www.codingcage.com/search/label/jQuery">jQuery</a>
        </div>
 
    </div>
</div>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">add new user. <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>
    

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
<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	
    
    <tr>
    	<td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="photo_name" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="save" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
</div>

    

</div>



</body>
</html>
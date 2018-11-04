<?php
require_once('dbconnect.php');
//error_reporting(~E_NOTICE);
session_start();


//$count=$sth->rowcount();

//$query=$conn->query("select * from users where fname='$fname'");
//$rowww=$query->fetch(PDO::FETCH_ASSOC);
//$fname=$_POST['fname'];
$session_id = $_SESSION['user'];//use in all part of program
//$query = $conn->prepere('select * from users where mem_id = :mem');
//$user_row = $query->fetch();
//$username = $user_row['firstname']." ".$user_row['lastname'];
//$image = $user_row['image'];
$sth=$conn->prepare( "SELECT * FROM users where mem_id=:mid") ;
$sth->execute(array(':mid'=>$session_id));
$roww=$sth->fetch(PDO::FETCH_ASSOC);
if(isset($_GET['post_id']))
	{
		$get_id = $_GET['post_id'];
		$sthh=$conn->prepare( "SELECT * FROM post WHERE post_id=:pid") ;
$sthh->execute(array(':pid'=>$get_id));
$row=$sthh->fetch(PDO::FETCH_ASSOC);
	}
if(isset($_POST['edit']))
	{
	$content=$_POST['content'];	
	$sth=$conn->prepare('update post set content=:cc,mem_id=:mm where post_id=:pid');
	$sth->bindparam(':cc',$content);
	$sth->bindparam(':mm',$session_id);
	$sth->bindparam(':pid',$get_id);
	if($sth->execute())
	{
header('refresh:0;view.php');
//}}
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
<label class="control-label">content:</label>
<div class="form-group">
<input type="text" class="form-control" name="content" value="<?php echo $content ; ?>" required />
    </div>
<div class="form-group">
<button type="submit" class="btn btn-default" name="edit">
<span class="glyphicon glyphicon-ok">
</span>
</button>
</div> 
</body>
</html>

        
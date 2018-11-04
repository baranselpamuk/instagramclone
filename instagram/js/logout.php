<?php
/*session_start();

 if(!isset($_SESSION['id'])){  
	header("Location: index.php");
} else if(!isset($_SESSION['id'])){  
	header("Location: users.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['id']);
	header("Location: index.php");
}


session_start();
session_destroy();
header('location:index.php');

session_start();

if (!isset($_SESSION['userSession'])) {
	header("Location:log_in.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: log_in.php");
}
*/
session_start();
	//unset($_SESSION['user_id']);
	unset($_SESSION['mem_id']);
	
	if(session_destroy())
	{
		header("Location: login.php");
	}
?>







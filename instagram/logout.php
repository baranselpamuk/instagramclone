<?php
require_once('dbconnect.php');
session_start();
unset($_SESSION['user']);
	
	if(session_destroy())
	{
		header("Location: index.php");
	}
?>







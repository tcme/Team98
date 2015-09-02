<?php
	session_start();
	include "../includes/database.php";
	if ($_SESSION['username'] === 'undefined')
	{
	header("location:login.php");
	}
?>
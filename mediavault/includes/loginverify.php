<?php
	session_start();
	include "../includes/database.php";
?>
<!-- Initialises a session with user and connects to database -->

<?php
	if (!isset($_SESSION['username']))
	{
	header("location:login.php");}
?>

<!-- If a user is not registered/logged in, they'll be redirected to login-->
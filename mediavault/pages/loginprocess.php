<?php
	session_start ();
	include "../includes/database.php";
?>

<?php

    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
	$password = hash('sha256', $password);
	
	$sql = "SELECT * FROM users WHERE email = '$username' AND password='$password'";
	$result = mysqli_query ($dbcon, $sql) or die (mysqli_error($dbcon));
	
	$row = mysqli_fetch_array ($result);
	/*Stores all results in an array called $row*/
	
	$count = mysqli_num_rows($result);
	/*Counts the number of rows that are returned from database. If there is one, which would be the user's login details, the below if statement will execute*/
    if ($count==1)
    {
		$_SESSION['username'] = $row['email'];
		header('location:video.php');
    }
    else
    {
		$_SESSION['loginerror'] = "Login details incorrect. Please try again.";
        header('location:login.php');
    }
	
	mysqli_close($dbcon);
?> 
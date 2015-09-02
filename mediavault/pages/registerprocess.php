<?php
	ob_start();
	session_start ();
	include "../includes/database.php";
?>

<?php

    $firstname = mysqli_real_escape_string($dbcon, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($dbcon, $_POST['lastname']);
	$username = mysqli_real_escape_string($dbcon, $_POST['username']);
	$password = mysqli_real_escape_string($dbcon, $_POST['password']);

	if (strlen($password)<8)
	{
	$_SESSION["regerr1"]="Password must be a minimum of 8 characters";
	header("location:register.php");
	exit();
	}
	$password = hash('sha256', $password);

	$sql = "SELECT * FROM users WHERE email = '$username'";
	$result = mysqli_query ($dbcon, $sql) or die (mysqli_error($dbcon));

	$numrow = mysqli_num_rows ($result);

	if($numrow > 0)
	{
	$_SESSION["regerr2"]= "Email address already used, please choose another.";
	header("location:register.php");
	exit();
	}
	elseif ($username == ""|| $password == "")
	{
	$_SESSION["regerr3"]= "Please fill in all required fields.";
	header("location:register.php");
	exit();
	}
	else
	{
	$sql="INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstname', '$lastname', '$username', '$password')";
	$result=mysqli_query($dbcon, $sql) or die (mysqli_error($dbcon));
	$_SESSION["regsuccess"]="New account created! Please login.";
	header("location:login.php");
	}

	mysqli_close($dbcon);
?>

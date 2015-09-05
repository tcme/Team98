<?php
	/*Included php script to connect to the database, include to this should be on every page that utilises the database*/
	$dbcon = mysqli_connect ("localhost", "ec2-user", "Team98" "mediavault");

	if (mysqli_connect_errno($dbcon)){
		echo "Unable to connect to the server:" . mysqli_connect_error();
	exit();

	}
?>
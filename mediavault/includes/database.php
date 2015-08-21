<!-- Included php script to connect to the database, include to this should be on every page that utilises the database -->

<?php
	$dbcon = mysqli_connect ("localhost", "ec2-user", "password", "mediavault");

	if (mysqli_connect_errno($dbcon))
	{
	echo "Unable to connect to the server:" . mysqli_connect_error();
	exit();
	}
?>

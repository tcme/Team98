<?php
	session_start ();
	include "../includes/database.php";
	
	$fileName = basename($_FILES["mediaFile"]["name"]);
	$size = ($_FILES["mediaFile"]["size"]) / 1000;
	
	$randomDigit= rand(0000,9999);
	$target_dir= "../images/";
	$target_file = $target_dir . $randomDigit . "_" . $fileName;
	$user = $_SESSION['username'];
	
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	$sql = "SELECT * FROM mediatype";
	$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));
	while($row=mysqli_fetch_array($result)){
		if($row["mediavariety"] == $fileType){
			$fileTypeID = $row["mediaID"];
		}
	}
			
	if (($fileType == 'gif') || ($fileType == 'jpeg') || ($fileType == 'jpg') || ($fileType == 'png') || ($fileType == 'mp3') || ($fileType == 'wav') || ($fileType == 'm4a') || ($fileType == 'wma') || ($fileType == 'mobi') || ($fileType == 'pdf') || ($fileType == 'epub') || ($fileType == 'mpg') || ($fileType == 'mpeg') || ($fileType == 'mp4') || ($fileType == 'avi') || ($fileType == 'mkv'))
	{
		$sql="INSERT INTO linkandmeta (link, filename, filesize, mediaID, userID) VALUES ('$target_file', '$fileName', '$size', '$fileTypeID', '$user')";
		$result=mysqli_query($dbcon, $sql) or die (mysqli_error($dbcon));
			
		move_uploaded_file($_FILES['mediaFile']['tmp_name'], $target_file);	
		$fileID = mysqli_insert_id($dbcon);
				
		if($result)
		{
			$_SESSION["success"]= "File Added!";
			header("location:video.php");
		}
		else
		{
			$_SESSION["error"]= "Something went wrong. Please try again.";
			header("location:video.php");
		}
	}
	else
	{
		$_SESSION['error'] = $fileName ." failed to upload";
		header("location:video.php");
	}
	
	mysqli_close($dbcon);// close the database connection
?> 
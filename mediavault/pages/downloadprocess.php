<?php
	ob_start();
	session_start ();
	include "../includes/database.php";
?>

<?php

    $file = basename($_GET['file']);
	$file = '../images/'.$file;

	if(!$file){ // file does not exist
		die('file not found');
	} else {
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file");
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: binary");
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		// read the file from disk
		readfile($file);
	}

	mysqli_close($dbcon);
?>

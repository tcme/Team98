<?php
	session_start();
	include "../includes/database.php";
?>

<?php
	$name = $_POST['name'];
		unlink($name);
		$sql = "DELETE linkandmeta.* FROM linkandmeta WHERE link='$name'";
		
		$result = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon));
		
		$postID = mysqli_insert_id($dbcon);
		
		if($result)
		{
			$_SESSION['success'] = 'Product deleted successfully!';
			header("location:video.php");
		}
	
	mysqli_close($dbcon);//close the database connection

?>
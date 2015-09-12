<?php
	session_start ();
	$pageTitle = "Buy our stuff!"; //Filling in here for the moment
	$scriptLibCSS = '';
	include "../includes/database.php";
	include "../includes/header.php";
?>

<div class="content">
	<?php
		echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.6/d3.min.js' charset='utf-8'></script>";
		include "../includes/navigation.php";
	
		$sql = "SELECT filename, filesize, mediavariety FROM linkandmeta, mediatype WHERE linkandmeta.mediaID = 		
		mediatype.mediaID";
		$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));

		echo "<div id='items' class='row'>";
		echo "<div class='col-xs-12'>";

		/* At the moment it prints to the screen, but I will be parsing the PHP and using D3JS, 
		   a Javascript framework to implement the visualisation. */

		while ($row=mysqli_fetch_array($result)) {
			echo "<div class='col-xs-3 itemer' id ='file'>";
			echo "{$row[0]}";
			echo "</div>";
		}

		echo"</div></div>";

		echo '<script type ="javascript">var queryResults = $result;</script>';
		echo '<script src ="../js/d3_vis.js"></script>'; //This is the script for the visualisation, not yet implemented. 
	?>

</div>

<?php
	include "../includes/footer.php";
?>
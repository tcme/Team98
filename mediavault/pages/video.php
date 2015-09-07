<?php
	session_start();
	$pageTitle = "Your videos";
	$scriptLibCSS = '';
	include "../includes/database.php";
	include "../includes/header.php";
	include "../includes/navigation.php";
	include "../includes/loginverify.php";
?>

<div class="content">
	<h1>Your Videos</h1>

	<?php
		echo "<p>Welcome back, ".$_SESSION['username']."</p>";
	?>

	<div id="allMedia">
		<hr>
		<?php
				$sql = "SELECT * FROM linkandmeta";
				$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));

				echo "<div id='items' class='row'>";
				echo "<div class='col-xs-12'>";
				
				echo "<p>You currently have <strong>";			
				$counter = 0;
				while($row=mysqli_fetch_array($result)){
					if($row["filename"] != ""){
						$counter++;
					}
				}
				echo ($counter);
				echo "</strong> files of this media stored</p>";
				echo "</div>";
				
				include "../includes/upload.php";

				$sql = "SELECT * FROM linkandmeta
						inner join mediatype on linkandmeta.mediaID = mediatype.mediaID";
				$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));
				while($row=mysqli_fetch_array($result)){

					echo "<div class='col-xs-3 itemer'>";
					echo "<img src='{$row["link"]}' class='img-responsive' alt='{$row["filename"]}'></img>";
					echo "<div id='deets'>";
					echo "<p><strong>{$row["filename"]}</strong></p>";
						
						$size = $row["filesize"];
						
						if ($size < 1000){
							$size = $size . " KB";
						}
						else if ($size >= 1000 && $size < 1000000){
							$size = $size / 1000 . " MB";
						}
						else{
							$size = $size/1000000 . " GB";
						}
						$name = $row["link"];
					echo"<p><strong>".$size."</strong></p></div>";
					echo'<form action="deleteprocess.php" method="post" enctype="multipart/form-data"><input type="submit" class="button form-control" value="Delete" onclick="';
					echo"return confirm('Are you sure you wish to delete this?');";
					echo'"/>';
					echo '<input type="hidden" name="name" value="'.$name.'">';
					echo '</form>';
					echo "</div>";

				}

				echo "</div>";
				echo"</div>";

		?>
	</div>
</div>

<?php
	include "../includes/footer.php";
?>
<?php
	session_start();
	$pageTitle = "Your videos";
	$scriptLibCSS = '';
	include "../includes/database.php";
	include "../includes/header.php";
	include "../includes/navigation.php";
	include "../includes/loginverify.php";
?>

<div id="maincontent">
	<h1>Your Videos</h1>

	<?php
		echo "<p>Welcome back, ".$_SESSION['username']."</p>";
	?>

	<div id="allMedia">
		<hr>
		<?php
				$sql = "SELECT * FROM linkandmeta";
				$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));
				$int_col=1;

				echo "<div id='items' class='row'>";
				echo "<div class='col-xs-12'>";
				echo "<p>You currently have <strong>";
				echo count($row=mysqli_fetch_array($result));
				echo "</strong> files of this media stored</p>";

				while($row=mysqli_fetch_array($result)){
					if ($int_col ==1){

						echo "<div class='itemRow row'>";
					}

					echo "<div class='col-xs-3 itemer'>";
					echo "<img src='' class='img-responsive' alt='{$row["filename"]}'></img>";
					echo "<div id='deets'>";
					echo "<p><strong>{$row["filename"]}</strong>{$row["mediavariety"]}</p>";
					echo"<p><strong>{$row["filesize"]}</strong></p></div>";
					echo "</div>";


					if ($int_col ==3){

						echo"</div>";
						$int_col = 1;
					}
					else{
					$int_col++;
					}

				}

				echo "</div>";
				echo"</div>";

		?>
	</div>
</div>

<?php
	include "../includes/footer.php";
?>
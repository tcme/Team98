<?php
	session_start ();
	$pageTitle = "Buy our junk!";
	$scriptLibCSS = '';
	include "../includes/database.php";
	include "../includes/header.php";
?>

<div class="content">
  <?php

      include "../includes/navigation.php";

			$sql = "SELECT * FROM products";
			$result = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));
			$int_col=1;

			echo "<div id='items' class='row'>";
			echo "<div class='col-xs-12'>";
			while($row=mysqli_fetch_array($result)){
				if ($int_col ==1){

					echo "<div class='itemRow row'>";
				}

				echo "<div class='col-xs-3 itemer'>";
				echo "<img src='../images/thumbs/{$row["thumb"]}' class='img-responsive' alt='{$row["name"]}'></img>";
				echo "<div id='deets'>";
				echo "<p class='lefter'><strong>$ {$row["price"]}</strong></p>";
				echo"<input class='buyit' type='button' name='productpage' value='Add to cart' onclick='addtocart(".$row['productID'].")'/></div>";
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

<?php
	include "../includes/footer.php";
?>
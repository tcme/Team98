<?php
	session_start ();
	$pageTitle = "Registration";
	$scriptLibCSS = "";
	include "../includes/database.php";
	include "../includes/header.php";
?>

</table>
</nav>

	<div id="maincontent" class="row">
		<div class="col-xs-6 col-xs-push-3">
			<h1>Media Vault Registration</h1>

			<p class="centretext">Please enter information required below to gain access to your own media vault</p>
			<p class="centretext"><em>Please note password must be 8 characters or more</em></p>
			
			<div>
				<form action="registerprocess.php" method="post">
					<label>First Name</label> <input type="text" name="firstname"/><br/>
					<label>Last Name</label> <input type="text" name="lastname"/><br/>
					<label>Email address*</label> <input type="text" name="username"/><br/>
					<label>Password*</label> <input type="password" name="password"/><br/>
					<input class="centrebutt" type="submit" name="registersubmit" value="Sign up!"/>
				</form>
			</div>
		
			<a href="login.php" alt="back">Back</a>
		</div>
		
		<?php 
		if (isset($_SESSION["regerr1"]))
		{
			echo "<p class='error'>".$_SESSION["regerr1"]."</p>";
			unset ($_SESSION["regerr1"]);
		}
		elseif (isset($_SESSION["regerr2"]))
		{
			echo "<p class='error'>".$_SESSION["regerr2"]."</p>";
			unset ($_SESSION["regerr2"]);
		}
		elseif (isset($_SESSION["regerr3"]))
		{
			echo "<p class='error'>".$_SESSION["regerr3"]."</p>";
			unset ($_SESSION["regerr3"]);
		}
		else
		{
			echo "";
		}
		?>
		
	</div>


<?php
	include "../includes/footer.php";
?>
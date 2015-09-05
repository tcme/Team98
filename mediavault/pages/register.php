<?php
	session_start ();
	$pageTitle = "Registration";
	/* The included php scripts */
	include "../includes/database.php";
	include "../includes/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-6 col-xs-push-3">
			<h1>Media Vault Registration</h1>

			<p>Please enter information required below to gain access to your own media vault</p>
			<p><em>Please note password must be 8 characters or more</em></p>

			<div>
				<form action="registerprocess.php" method="post">
					<div>
						<label>First Name</label>
						<input class="form-control" type="text" name="firstname"/><br/>
					</div>
					<div>
						<label>Last Name</label>
						<input class="form-control" type="text" name="lastname"/><br/>
					</div>
					<div>
						<label>Email address*</label>
						<input class="form-control" type="text" name="username"/><br/>
					</div>
					<div>
						<label>Password*</label>
						<input class="form-control" type="password" name="password"/><br/>
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

					<div class="inline-block">
						<input class="button form-control" type="submit" name="registersubmit" value="SIGN UP"/>
					</div>
					<div class="inline-block">
						<a class="button-link" href="login.php" alt="back"><button type="button" class="button form-control">BACK</button></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include "../includes/footer.php";
?>
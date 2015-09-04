<?php
session_start ();
$pageTitle = "Media Vault Login";
$scriptLibCSS = "";

/* included php modules */
include "../includes/database.php";
include "../includes/header.php";
?>

<!--CSS stylesheet-->
<link href="../css/login.css" rel="stylesheet" type="text/css"/>

<?php
include "../includes/navigation.php";
?>
<div id="screen">

	<div class="center-content">
		<div class="content-centered">

				<form action="loginprocess.php" method="post">
					<div id="login-form">

						<!-- login form -->
						<h1>Welcome back to your media vault</h1>

						<div id="login-fields">
							<label>Email address</label></br>
							<input type="text" name="username" class="form-control" value="" required="required" autofocus/><br/>
							<label>Password</label></br>
							<input type="password" name="password" class="form-control" value="" required="required"/><br/>
						</div>
						
						<?php
						if (isset($_SESSION["regsuccess"]))
						{
							echo "<p class='success'>".$_SESSION["regsuccess"]."</p>";
							unset ($_SESSION["regsuccess"]);
						}
						elseif (isset($_SESSION["loginerror"]))
						{
							echo "<p class='error'>".$_SESSION["loginerror"]."</p>";
							unset ($_SESSION["loginerror"]);
						}
						else
						{
							echo "";
						}
						?>
					</div>

					<input id="submit-button" type="submit" name="login" value=" LOGIN "/>

				</form>

				<p>Can't log in? Register <strong><a href="register.php" alt="Registration page">here</a></strong>. Already logged in? Logout <strong><a href="logout.php" alt="Registration page">here</a></strong>.</p>

		</div>
	</div>

	<div>
		<?php
		include "../includes/footer.php";
		?>
	</div>

</div>

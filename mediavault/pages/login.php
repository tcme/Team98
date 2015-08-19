<?php
	session_start ();
	$pageTitle = "Media Vault Login";
	$scriptLibCSS = "";
	include "../includes/database.php";
	include "../includes/header.php";
?>

	<div id="maincontent" class="row">
		<h1 class="col-xs-12">Welcome back to your media vault</h1>
		<div id="loginer" class="row">
			<form action="loginprocess.php" method="post" class="col-xs-6">
				<label>Email address</label> <input class="spaceman" type="text" name="username" value="" required="required" autofocus="autofocus"/><br/>
				<label>Password</label> <input class="spaceman" type="password" name="password" value="" required="required" autofocus="autofocus"/><br/>
				<input type="submit" name="login" value="Login"/>
			</form>
			
			<p class="col-xs-6">Can't log in? Register <strong><a href="register.php" alt="Registration page">here</a></strong>. Already logged in? Logout <strong><a href="logout.php" alt="Registration page">here</a></strong>.</p>	
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

<?php
	include "../includes/footer.php";
?>
<?php
  session_start();
  $pageTitle = "Media Vault - Login";
  /* The included php scripts */
  include "../includes/database.php";
  include "../includes/header.php";
?>

<!--CSS stylesheet-->
<link href="../css/login.css" rel="stylesheet" type="text/css"/>

<!-- The total screen realistate below the navbar -->
<div class="content centered-outer">
  <div class="centered-inner">

      <h1>Welcome back to your media vault</h1>

      <!-- the login form -->
      <form class="inline-block left-aligned" action="loginprocess.php" method="post">
        <div>
          <label>Email address:</label>
          <input type="text" name="username" class="form-control" value="" required="required" autofocus="autofocus"/>
          </br>
        </div>
        <div>
          <label>Password:</label></br>
          <input type="password" name="password" class="form-control" value="" required="required" autofocus="autofocus"/>
          </br>
        </div>

        <!-- returns messages for submission success or errors -->
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

        <div class="center-aligned">
          <div class="inline-block">
              <input class="button form-control" type="submit" name="login" value=" LOGIN "/>
          </div>
        </div>
      </form>

      <p>Can't log in? Register <strong><a href="register.php" alt="Registration page">here</a></strong>. Already logged in? Logout <strong><a href="logout.php" alt="Registration page">here</a></strong>.</p>

  </div>
</div>

<?php
  include "../includes/footer.php"
?>



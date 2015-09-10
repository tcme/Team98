<!-- The specific navigation CSS -->
<link href="../css/navigation.css" rel="stylesheet" type="text/css" />

<!-- The structure of the navbar *built on bootstrap navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <!-- navbar brand and link to home -->
      <a href = "../pages/login.php">
      <img src="../images/nav_splash.png" alt="media.vlt" height="50px"/>
      </a>
      <!-- navbar collapse button -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Holds the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <?php
        if (isset($_SESSION['username'])){
          include "../includes/navlists.php";
        }
      ?>
    </div>
  </div>
</nav>
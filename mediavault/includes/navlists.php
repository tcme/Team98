<!-- list of left oriented navigation links -->
<ul class='nav navbar-nav'>
<li><a href='../pages/home.php'>Home</a></li>
<li><a href='../pages/video.php'>Video</a></li>
<li><a href='../pages/audio.php'>Audio</a></li>
<li><a href='../pages/images.php'>Images</a></li>
<li><a href='../pages/books.php'>Books</a><li>
<li><a href='../pages/info.php'>Account Info</a></li>
</ul>

<form class = "navbar-form navbar-left" role = "search">

	<div class = "form-group">
	
		<input type = "text" class = "form-control" name = "search" placeholder = "Search">

	<button class = "btn btn-default" type = "submit" formaction ="search.php" formmethod ="get">Search</button>

	</div>
</form>

<!-- list of right oriented navigation links -->
<ul class='nav navbar-nav navbar-right'>
<li><a href='../pages/logout.php' class='navText'>Logout</a></li>
</ul>
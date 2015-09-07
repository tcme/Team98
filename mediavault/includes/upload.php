<!-- The structure of the navbar *built on bootstrap navbar -->
<div id="upload" class="col-xs-12">
	<input class="button form-control" type="submit" value="Upload" onclick="viewUploadArea()">
	<?php
	if (isset($_SESSION["success"]))
		{echo "<p class='success'>".$_SESSION["success"]."</p>";
		unset ($_SESSION["success"]);}
	elseif(isset($_SESSION["error"]))
		{echo "<p class='error'>".$_SESSION["error"]."</p>";
		unset ($_SESSION["error"]);}
	else
		{echo "";}
	?>
	<div class="uploadVisibility">
		<h2>Please choose a file to upload</h2>
		<form action="uploadprocess.php" method="post" enctype="multipart/form-data">	
			<div><label>Browse:</label> <input type="file" name="mediaFile"required/></div>
			<div><input type="submit" class="button form-control" name="uploadFile" onclick="dontViewUploadArea()" value="Upload"/></div>
		</form>
	</div>

</div>
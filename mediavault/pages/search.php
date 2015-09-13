<?php
	session_start ();
	$pageTitle = "Search Results";
	$scriptLibCSS = "";
	include "../includes/database.php";
	include "../includes/header.php";
	include "../includes/nav.php";
?>

</table>
</nav>

<div class="content">
	<h1>Search results</h1>
</div>

<?php

	$term = mysqli_real_escape_string($dbcon, $_GET['search']);//prevent SQL injection
	$punctuation = array(", ", ". ", ";", "/", "\\", "!", "?");//create an array containing possible punctuation between words
	$term = str_replace($punctuation, " ", $term);//replace punctuation with a space
	$common = array("and", "or", "the", "of");//create an array containing common words that you don't want to search for
	$sql = "SELECT * FROM linkandmeta WHERE userID = '" . $_SESSION["username"]. "' AND (filename LIKE '%" . $term[0] . "%')";

	foreach($common as $word) {
		$term = preg_replace("/\b\s$word\b/i", '', $term);//make the common words case insensitive and replace with no space
	}

	$term = explode(" ", ($term));//split the search terms into separate word
	

	for($i=1; $i<count($term); $i++) {
		$sql = $sql."OR (filename LIKE '%" . $term[i] . "%')"; //searches for matches to subsequent search terms by looping through 			each additional term
	}

	$result1 = mysqli_query($dbcon, $sql) or die(mysqli_error($dbcon)); //run the query
	$numrow1 = mysqli_num_rows($result1); //count the number of rows returned

	if(empty($_GET['search'])) { //display if no search term entered 
		echo "<p>No search term entered.</p>";
	} elseif($numrow1 ==0) { //display if no matches to search
		echo "<p>Sorry, no results found for ";
		
		foreach($term as $key) { //loop through each search terms		
			echo"<strong>".$key."</strong> "; //echo each search term
		}
	} elseif ($numrow1 > 0) {
		$term = implode(", ", $term); //join the search terms into one string separated by commas
		//display the terms and the number of results for the search
		echo "<p class='centretext'>Your search for ".$term." has returned <strong>".$numrow1."</strong> results!</p>"; 

		while ($current_row = mysqli_fetch_array($result1)) {
			echo "<blockquote>" . $current_row[2] . " </blockquote>";
		}
	}
	
	mysqli_close($dbcon);// close the database connection
?>

</div>

<?php
	include "../includes/footer.php";
?>
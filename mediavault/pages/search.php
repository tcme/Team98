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

<div id="maincontent4">
	<h1>Search results</h1>

<?php

    $term = mysqli_real_escape_string($dbcon, $_GET['search']);//prevent SQL injection
	
    $punctuation = array(", ", ". ", ",", ".", ":", ": ", "?");//create an array containing possible punctuation between words
	
	$term = str_replace($punctuation, " ", $term);//replace punctuation with a space
	
	$common = array("and", "or", "the", "of");//create an array containing common words that you don't want to search for
	
	foreach($common as $word)
	{
	$term = preg_replace("/\b\s$word\b/i", '', $term);//make the common words case insensitive and replace with no space
	}
	
	$term = explode(" ", ($term));//split the search terms into separate word
	
	$sql1 = "SELECT * FROM blog INNER JOIN category USING (catID) WHERE (postTitle LIKE '%".$term[0]."%' OR postContent LIKE '%".$term[0]."%')"; //searches for matches to first search term
	
	for($i=1; $i<count($term); $i++)
	{
	$sql1 = $sql1."OR (postTitle LIKE '%".$term[$i]."%' OR postContent LIKE '%".$term[$i]."%')"; //searches for matches to subsequent search terms by looping through each additional term
	}
	
	$result1 = mysqli_query($dbcon, $sql1) or die(mysqli_error($dbcon)); //run the query
	$numrow1 = mysqli_num_rows($result1); //count the number of rows returned 
	
	$sql2 = "SELECT * FROM products INNER JOIN prodcat USING (prodCatID) WHERE (name LIKE '%".$term[0]."%' OR description LIKE '%".$term[0]."%')"; //searches for matches to first search term
	
	for($i=1; $i<count($term); $i++)
	{
	$sql2 = $sql2."OR (name LIKE '%".$term[$i]."%' OR description LIKE '%".$term[$i]."%')"; //searches for matches to subsequent search terms by looping through each additional term
	}
	
	$result2 = mysqli_query($dbcon, $sql2) or die(mysqli_error($dbcon)); //run the query
	$numrow2 = mysqli_num_rows($result2); //count the number of rows returned
	
	if(empty($_GET['search'])) //display if no search term entered
	{
	echo "<p>No search term entered.</p>";
	}
	elseif($numrow1 ==0 && $numrow2 ==0) //display if no matches to search
	{
	echo "<p>Sorry, no results found for ";
		foreach($term as $key) //loop through each search terms
		{
		echo"<strong>".$key."</strong> "; //echo each search term
		}
	}
	elseif ($numrow1 > 0)
	{
	$term = implode(", ", $term); //join the search terms into one string separated by commas
	echo "<p class='centretext'>Your search for ".$term." has returned <strong>".$numrow1."</strong> results!</p>"; //display the terms and the number of results for the search
	
		while ($row = mysqli_fetch_array($result1)) //loop through results for each match
		{
			echo "<div class='blogSearch'>";
			echo "<h2><a class='blacker' href='newspost.php?postID=" .$row['postID']. "'>" . $row['postTitle'] . "</a></h2>";
			echo "<p><em>posted on ".date("F jS Y",strtotime($row['postDate'])). " by ". $row['postAuthor']. " in ". $row['category']. "</em></p>";
			echo "<p>" . (substr(($row['postContent']),0,200)) . "... ". "<a class='blacker' href='newspost.php?postID=" . $row['postID'] ."'>"."read more"."</a>";
			echo "</div>";
		}
	}
	elseif ($numrow2 > 0)
	{
	$term = implode(", ", $term); //join the search terms into one string separated by commas
	echo "<p class='centretext'>Your search for ".$term." has returned <strong>".$numrow2."</strong> results!</p>"; //display the terms and the number of results for the search
	
		while ($row = mysqli_fetch_array($result2)) //loop through results for each match
		{
			echo "<div class='contact'>";
			echo "<div class='details'>";
			echo "<img src='../images/thumbs/".($row['thumb']). "'". 'width=250 height=250 alt="Product image"' . "/>";
			echo "<p><strong>Product:</strong> ".$row['name']."<br/>";
			echo "<strong>Category:</strong> ".$row['category']."<br/>";
			echo "<strong>Price:</strong> ".$row['price']."<br/>";
			echo "<strong>Description:</strong> ".$row['description']. "</p><br/>";
			echo "</div>";
			echo "</div>";
		}
	}
	else
	{
	}
	
	mysqli_close($dbcon);// close the database connection
?> 
</div>

<?php
	include "../includes/footer.php";
?>
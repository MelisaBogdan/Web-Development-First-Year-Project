<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
 
	$oldTitle = $_POST['oldtitle'];

	$sql="SELECT * FROM p ORDER BY ID DESC";
	$r=$conn->query($sql);
	if(($r->num_rows) >0)
	{
		while($row = $r->fetch_assoc()){
			$p=$row['title'];
			$id=$row['ID'];
			if($p == $oldTitle ){
				// when it finds the right post in the databse, the loop ends then deletes it
				$ID=$id;
				$sql = "DELETE FROM p WHERE ID='$ID'"; //updates the sql table 
				break;
			} 	 
		}
	}

	if(($r->num_rows) >0)
	{
		while($row = $r->fetch_assoc()){
			$pp=$row['date'];
			$p=$row['title'];
			$ppp=$row['post'];
		// showing each post on screen
			echo '<div class="a"> ';
			echo "$pp";
			echo '</div>';
			echo "<h3><b>$p</b></h3>";
			echo "<br>";
			echo "<i>$ppp</i>";
			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			 echo "<hr>"; 
		}
	}
		
	
	
	
	  if ($conn->query($sql) === TRUE) // making sure the database is updated
		{               
			echo "<script>alert('You succesfully deleted a post.'); window.location.href='http://localhost/WEB/viewBlog.php';</script>";
		} else {             
			echo "Error: " . $sql . "<br>" . $conn->error;          
		}        
   
?>

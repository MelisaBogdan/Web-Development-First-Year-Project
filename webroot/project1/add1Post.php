
<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
	

	$Title = $_POST['oldtitle']; 
	$Comment = $_POST['newpost']; 
	

	$sql="SELECT * FROM p ORDER BY ID DESC";
	$r=$conn->query($sql);
	if(($r->num_rows) >0)
	{
		while($row = $r->fetch_assoc()){
			$title=$row['title'];
			$date=$row['date'];
			$post=$row['post'];
			$id=$row['ID'];

			if($title == $Title ){
				// finds the matching title in the database & adds comment 
				$sql = "UPDATE p SET  title='$title', post='$post', ID='$id',comment='$Comment' WHERE ID=$id "; //updates the sql table 
				break;
				}
			}
	}
	
	  if ($conn->query($sql) === TRUE) // making sure the database is updated
		{               
			echo "<script>alert('You succesfully updated a post.'); window.location.href='http://cakephp-mysql-persistent-melisaecs417.bde1.qmul-eecs.openshiftapps.com/project1/viewBlog.php';</script>";
		} else {             
			echo "Error: " . $sql . "<br>" . $conn->error;          
		}        
   
?>
</html>

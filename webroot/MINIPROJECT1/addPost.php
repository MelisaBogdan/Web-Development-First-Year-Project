<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST"); 
	$dbport = getenv("MYSQL_SERVICE_PORT"); 
	$dbuser = getenv("DATABASE_USER"); 
	$dbpwd = getenv("DATABASE_PASSWORD"); 
	$dbname = getenv("DATABASE_NAME"); 
	// Create connection 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect oof"); 
	
	$title = $_POST['title']; 
	$date =date('Y-m-d H:i:s');
	$post = $_POST['text']; 
	$ID=$_SESSION['id'] ;
		$sql = "INSERT INTO post(date,title,post,ID) 
		VALUES('$date','$title','$post','$ID')";
	
		// make sure the database is updated
		if ($conn->query($sql) === TRUE) 
		{               
			echo "<script>alert('You succesfully added a post.'); window.location.href='http://localhost/WEB/viewBlog.php';</script>";
		} else {             
			echo "Error: " . $sql . "<br>" . $conn->error;          
		}        
   
?>

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
	$ID=$_POST['id'] ;
		$sql = "INSERT INTO postt(date,title,post) VALUES('$date','$title','$post')";
	
		// make sure the database is updated
		if ($conn->query($sql) === TRUE) 
		{               
			echo "<script>alert('You succesfully added a post.');</script>";
			header("Location: viewBlog.php");
		} else {             
			echo "Error: " . $sql . "<br>" . $conn->error;          
		}        
   
?>

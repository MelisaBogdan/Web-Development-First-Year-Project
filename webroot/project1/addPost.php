<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
	
	$title = $_POST['title']; 
	$datee =date('Y-m-d H:i:s');
	$post = $_POST['text']; 
	$m=3;
	//insert the post data in table p
		$sql = "INSERT INTO p(date,title,post,comment,month) VALUES('$datee','$title','$post', ' ', $m)";

	  if ($conn->query($sql) === TRUE) // make sure the database is updated
		{               
			echo "<script>alert('You succesfully added a post.'); window.location.href='http://cakephp-mysql-persistent-melisaecs417.bde1.qmul-eecs.openshiftapps.com/project1/viewBlog.php';</script>";
		} else {             
			echo "Error: " . $sql . "<br>" . $conn->error;          
		}        
   
?>

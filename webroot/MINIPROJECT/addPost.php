<?php
	session_start();
	$user ='root';
	$pass = '';
	$db= 'testdb';
	// connection to XAMPP database
	$conn= new mysqli('localhost', $user,$pass,$db,"3306") or die("unable to connect oof");
	
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
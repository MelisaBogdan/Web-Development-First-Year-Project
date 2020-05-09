<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");

	//getting the user variable from the database
	$query = "SELECT user FROM currentuser WHERE ID = '1'";
	$username =@mysqli_query($conn, $query);
	$row = mysqli_fetch_row($username);
	$user = $row[0]; 
	echo "$user";

	// choosing which menu to display based on database info
	if($user == "visitor"){
		header("Location: menuUser.html");
	} else if($user == "admin"){
		header("Location: menuAdmin.html");
	} else{
		echo "ERROR";
	}

		   
	
	 



	

	
?>

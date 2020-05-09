<?php
	session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
	
	$userr = "mel@gmail.com";
	$passs = "pass";
	$adminUser= "admin@gmail.com";
	$adminPass= "admin"; 
	//updating database for user details
		#$sql = "INSERT INTO testt(ID,keyUser,keyPass)  VALUES('1',' ',' ')"; 
		$sql = "UPDATE testt SET User='$userr', Pass='$passs' WHERE ID=1";    # add to the row where ID=1
		if ($conn->query($sql) === TRUE) 
		{               
			echo "yey";
		} else {             
			echo "Erro: " . $sql . "<br>" . $conn->error;          
		}         
	//insert in database admin details
		$sqll = "INSERT INTO admin(user,pass) VALUES('$adminUser','$adminPass')"; 	   
	if ($conn->query($sql) === TRUE) 
	{               
		echo "yeyy";
	} else {             
		echo "Error: " . $sql . "<br>" . $conn->error;          
	}       

	$sqll = "INSERT INTO currentuser(user) VALUES('')"; //set space for user status in database to be updated later
	if ($conn->query($sqll) === TRUE) 
	{               
		echo "yeyy";
	} else {             
		echo "Error: " . $sql . "<br>" . $conn->error;          
	}       

	header("Location: myWebsite.html");
?> 

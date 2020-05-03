<?php
	$user ='root';
	$pass = '';
	$db= 'testdb';
	// connection to XAMPP database
	$conn= new mysqli('localhost', $user,$pass,$db,"3306") or die("unable to connect oof");
	
	$userr = "melisa@gmail.com";
	$passs = "pass";
	#if ($_SERVER['REQUEST_METHOD'] == 'POST')
	#{ 
		#This is to ensure that the INSERT query does not run EVERY TIME the page is loaded, even if no form was submitted.     
		$sql = "INSERT INTO test3(ID,keyUser,keyPass)  #create the row
		VALUES('1',' ',' ')"; 
		$sql = "UPDATE test3 SET keyUser='$userr', keyPass='$passs'  # add to the row where ID=1
			WHERE ID=1";    
	#}
	if ($conn->query($sql) === TRUE) 
	{               
		
	} else {             
		echo "Error: " . $sql . "<br>" . $conn->error;          
	}           

	header("Location: myWebsite.html");
?> 
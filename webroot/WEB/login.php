<?php

session_start();
$Eemail =$_POST['EMAIL']; 
$Ppass = $_POST['PASSWORD'];

//checking if the variable username is set in the previour page
if (isset($Eemail) && isset($Ppass) // when not empty
 {
        // Set variables to represent data from my database
        $email = "abc@gmail.com";
        $pass = "1234";
      //  $id = "1234";
       // echo $_GET["EMAIL"];
		//echo $_GET["PASSWORD"];
		// collects data after submitting (saves it in var email and var pass)
        

        //  password & username entered correctly
    if ($email == $Eemail && $pass == $Ppass) 
    {
        $_SESSION['EMAIL'] = $Eemail;
        $_SESSION['pass'] = $Ppass;
 

        header("Location : addPost.html"); // redirecting
    } else {
		 echo 'Wrong email adress or password.'
	}
} else {
	echo 'One or both of the fields are empty.'
} 


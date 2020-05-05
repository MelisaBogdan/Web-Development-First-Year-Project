<!DOCTYPE html>

<head>
	<script type="text/javascript" src="JavaScript.js"></script>
</head>

<!--CSS STYLE -->
<style>
	div.b{ /* the green  part */
    margin: -12% -50% -200% -20%;
    padding: 0% 27% 35% 29.5%;
	background-color:#90EE90;
	border-radius: 25px;	
	font-size: 130%;
	color: black;
	}



	div.a{
		text-align:right;  /*for date&time */
	}

	hr{
	width: 665px;
    height: 0.5px;
    background-color: black;
    margin-right:5px;
	margin-left:-110px;
	}

	html{
	margin: 5% 5% 0% 5%;
    padding: 0% 27% 35% 29.5%;
	background-color: #D3D3D3; 
	border-radius: 5px;	
	}#90EE90

</style>

<html>
	<?php
	session_start();
	$user ='root';
	$pass = '';
	$db= 'testdb';
	// connection to XAMPP database
	$conn= new mysqli('localhost', $user,$pass,$db,"3306") or die("unable to connect");

	$title = $_POST['title']; 
	$date =date('Y-m-d H:i:s');
	$post = $_POST['text'];

?>
</html>
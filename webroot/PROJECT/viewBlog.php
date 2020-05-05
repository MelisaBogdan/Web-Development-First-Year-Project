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



	div.c{    
	 /* for button 'another post'   */
	  font-size: 40px;	
	  text-align:left;
	  margin-left:-500px;
	  margin-right:200px;
	  margin-top: -400px;
	  background-color: #F0FFFF;
	  border-radius: 25px;
	  padding: 13px 13px;
	  display: inline-block;
	}  
	
	div.d{    
	 /* for button 'back to website'   */
	  font-size: 40px;	
	  text-align:left;
	  margin-left:-500px;
	  margin-right:200px;
	  margin-top: -400px;
	  background-color: #F0FFFF;
	  border-radius: 25px;
	  padding: 13px 13px;
	  display: inline-block;

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
	$dbhost = getenv("MYSQL_SERVICE_HOST"); 
	$dbport = getenv("MYSQL_SERVICE_PORT"); 
	$dbuser = getenv("DATABASE_USER"); 
	$dbpwd = getenv("DATABASE_PASSWORD"); 
	$dbname = getenv("DATABASE_NAME"); 
	// Create connection 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect oof");

	$sql= "SELECT count(ID) AS total FROM postt";
	$result=mysqli_query($conn,$sql);
	$val=mysqli_fetch_assoc($result);
	$numRows=$val['total']; // the number of total rows so far in the database 
	echo '<div class="c"> ';
		echo '<button onclick="redirect()">ADD ANOTHER POST</button>';
		echo '<button onclick="goBackToWebsite()">BACK TO WEBSITE</button>';
	echo '</div>';

	echo '<div class="b"> ';
	//posting every post we have in the database so far based on an id 
    for ($i = 1; $i <= $numRows; $i++) { 
		$query = "SELECT title FROM postt WHERE ID='$i' ";
		$title =@mysqli_query($conn, $query);
		$row = mysqli_fetch_row($title);
		$p = $row[0];

		$query = "SELECT date FROM postt WHERE ID='$i'";
		$date =@mysqli_query($conn, $query);
		$row1 = mysqli_fetch_row($date);
		$pp = $row1[0];

		$query = "SELECT post FROM postt WHERE ID='$i'";
		$post =@mysqli_query($conn, $query);
		$row2 = mysqli_fetch_row($post);
		$ppp = $row2[0];

		echo '<div class="a"> ';
		echo "$pp";
		echo '</div>';
		echo "<h3><b>$p</b></h3>";
		echo "<br>";
		echo "<i>$ppp</i>";
		echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
	 echo "<hr>";
	  }

	

?>

	
</html>

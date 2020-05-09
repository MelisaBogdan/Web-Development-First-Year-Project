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
	 /* for button 'back to website'  */
	  font-size: 40px;	
	  text-align:left;
	  margin-left:-300px;
	  margin-right:200px;
	  margin-top: -400px;
	  background-color: #F0FFFF;
	  border-radius: 25px;
	  padding: 13px 13px;
	  display: inline-block;
	}  
	
	div.d{    
	 /* for button  'another post'   */
	  font-size: 40px;	
	  text-align:left;
	  margin-left:-700px;
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
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
	
	$sql= "SELECT count(ID) AS total FROM p";
	$result=mysqli_query($conn,$sql);
	$val=mysqli_fetch_assoc($result);
	$numRows=$val['total']; // the number of total rows so far in the database 
	echo '<div class="c"> ';
		
		echo '<button onclick="goBackToWebsite()">BACK TO WEBSITE</button>';
	echo '</div>';

	echo '<div class="b"> ';
	//posting every post we have in the database so far based on an id 
	$sql="SELECT * FROM p ORDER BY ID DESC";
	$r=$conn->query($sql);
	$ct=0;
	if(($r->num_rows) >0)
	{
		while($row = $r->fetch_assoc()){
			$pp=$row['date'];
			$p=$row['title'];
			$ppp=$row['post'];
			$comment=$row['comment'];
			$month=$row['month'];

		if($month == '03'){  // the wanted month 03=March
			$ct=$ct+1;
			echo '<div class="a"> ';
			echo "$pp";
			echo '</div>';
			echo "<h3><b>$p</b></h3>";
			echo "<br>";
			echo "<i>$ppp</i>";
			echo "<br>";
			echo "<br>";
		
			if($comment!="" || $comment!=null){ //when the post has comments
			    echo "<br>";
				echo "<h4>Comments: </h4>";
				echo "<br>";
				echo "$comment";
			}
			// creating space between posts
			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			 echo "<hr>";
		}
		
	  }
	  if($ct == '0')
		{
			echo "<br>";echo "<br>";echo "<br>";
			echo "NO POSTS AVAILABLE";
		}
	}
		
?>

</html>

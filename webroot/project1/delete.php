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
	.login {
	  background-color: #F0FFFF;
	  border-radius: 25px;
	  padding: 14px 14px;
	  text-align: center;
	  display: inline-block;
	  font-size: 16px;
	  margin-left:60px;
	}
	div.c{    
	 /* for button 'menu'   */
	  font-size: 40px;	
	  text-align:left;
	  margin-left:-400px;
	  margin-right:200px;
	  margin-top: -500px;
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
		echo '<button onclick="redirectMenuAdmin()">BACK TO MENU</button>';
	echo '</div>';

	echo '
	<div style="width:999px; margin-right:auto; margin-left:-450px;  margin-top:-10px;">
	<p><p>
		<table>
			<form  name ="inputT" method="post" action="delete2.php" onsubmit="return preventDefault()">
				<tr>
					<td>Title of the post you want to delete</td>
					<td><input type="textarea" name="oldtitle"  id="title" placeholder="TYPE HERE" size="98"></td>
				</tr>
				</tr><tr></tr><tr></tr><tr></tr><tr></tr><tr>	
				<div class="login" >
					<input type="submit" value="Submit" name="Submit" />
				</div>
			 </form> 
		</table>
	</div>	 
		 ';
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";echo "<br>";echo "<br>";
	echo '<div class="b"> ';
	//posting every post we have in the database so far based on an id 
    $sql="SELECT * FROM p ORDER BY ID DESC";
	$r=$conn->query($sql);
	if(($r->num_rows) >0)
	{
		while($row = $r->fetch_assoc()){
			$pp=$row['date'];
			$p=$row['title'];
			$ppp=$row['post'];
			$comment=$row['comment'];
			echo '<div class="a"> ';
			echo "$pp";
			echo '</div>';
			echo "<h3><b>$p</b></h3>";
			echo "<br>";
			echo "<i>$ppp</i>";
			
			if($comment!="" || $comment!=null){ //when the post has comments
			    echo "<br>";
				echo "<h4>Comments: </h4>";
				echo "<br>";
				echo "$comment";

			}

			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			 echo "<hr>";
		}
	}
	   
?>
</html>

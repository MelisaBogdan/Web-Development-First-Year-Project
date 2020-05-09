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

	//buttons
	echo '<div class="c"> ';
		echo '<button onclick="redirectMenuUser()">BACK TO MENU</button>';
	echo '</div>';

	//text fields
	echo '
	<div style="width:999px; margin-right:auto; margin-left:-450px;  margin-top:-10px;">
	<p><p>
		<table>
			<form  name ="inputT" method="post" action="add1Post.php" onsubmit="return preventDefault()">
				<tr>
					<td>Type the title of the post you want to add comments to</td>
					<td><input type="text" name="oldtitle"  id="title" placeholder="TYPE HERE" size="98"></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				
				<tr>
					<td>Type the content for the comment</td>
					<td><textarea name="newpost" cols= "80" rows="10" placeholder="WRITE HERE"></textarea></td>
					
				</tr>
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
	//display all posts in the database based on an id in desc order
	   $sql="SELECT * FROM p ORDER BY ID DESC";
		$r=$conn->query($sql);
		if(($r->num_rows) >0)
		{
			while($row = $r->fetch_assoc()){
				$pp=$row['date'];
				$p=$row['title'];
				$ppp=$row['post'];
				echo '<div class="a"> ';
				echo "$pp";
				echo '</div>';
				echo "<h3><b>$p</b></h3>";
				echo "<br>";
				echo "<i>$ppp</i>";
				echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
				 echo "<hr>";
			}
		}
	echo '</div>';
	?>
	</html>

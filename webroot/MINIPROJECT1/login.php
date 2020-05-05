<?php
	session_start();
    $dbhost = getenv("MYSQL_SERVICE_HOST"); 
	$dbport = getenv("MYSQL_SERVICE_PORT"); 
	$dbuser = getenv("DATABASE_USER"); 
	$dbpwd = getenv("DATABASE_PASSWORD"); 
	$dbname = getenv("DATABASE_NAME"); 
	// Create connection 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect oof");


#Get info from database
$query = "SELECT User FROM testt WHERE ID = '1'";
$username =@mysqli_query($conn, $query);
$row1 = mysqli_fetch_row($username);
$Username = $row1[0];


$query = "SELECT Pass FROM testt WHERE ID= '1'";
$password =@mysqli_query($conn, $query);
$row2 = mysqli_fetch_row($password);
$Password = $row2[0]; 



//if the user is already logged in:
if( isset($_SESSION['loged']) && $_SESSION['loged']==true) {
	echo "<script>alert('Already logged in.');</script>";
	header("Location: addPost.html")

	//if not empty
} else if (isset($_POST['USERNAME']) && isset($_POST['PASSWORD']) ) 
{
	if ($_POST['USERNAME'] == $Username && $_POST['PASSWORD'] == $Password) 
			{
				$_SESSION['loged']= true;		
				header("Location: addPost.html"); // redirecting
			}else echo "<script>alert('Wrong username or password.');</script>"; header("Location: login.html");	
}

?>


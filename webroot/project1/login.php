<?php
session_start();
	$dbhost = getenv("MYSQL_SERVICE_HOST");
	$dbport = getenv("MYSQL_SERVICE_PORT");
	$dbuser = getenv("DATABASE_USER");
	$dbpwd = getenv("DATABASE_PASSWORD");
	$dbname = getenv("DATABASE_NAME"); 
	// Creates connection $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname); 
	$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname) or die("unable to connect ");
	

#Get info from database for normal user
$query = "SELECT User FROM testt WHERE ID = '1'";
$username =@mysqli_query($conn, $query);
$row1 = mysqli_fetch_row($username);
$Username = $row1[0]; 

$query = "SELECT Pass FROM testt WHERE ID= '1'";
$password =@mysqli_query($conn, $query);
$row2 = mysqli_fetch_row($password);
$Password = $row2[0]; 
//--------------------------------------

#Get info from database for admin
$query = "SELECT user FROM admin WHERE ID = '1'";
$u =@mysqli_query($conn, $query);
$row3 = mysqli_fetch_row($u);
$user = $row3[0]; 

$query = "SELECT pass FROM admin WHERE ID= '1'";
$p =@mysqli_query($conn, $query);
$row4 = mysqli_fetch_row($p);
$pass = $row4[0]; 


#if user is already logged in:
if( isset($_SESSION['loged']) && $_SESSION['loged']==true ) {
	echo "<script>alert('Already logged in.'); window.location.href='http://cakephp-mysql-persistent-melisaecs417.bde1.qmul-eecs.openshiftapps.com/project1/addPost.html';</script>";

} else if (isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])) {

	if ($_POST['USERNAME'] == $Username && $_POST['PASSWORD'] == $Password) // validating input for normal user
			{
				$_SESSION['id'] = 1;
				$_SESSION['loged']= true;
				$sql = "UPDATE currentuser SET user='visitor' WHERE ID=1"; #updates the database with the current user: visitor for normal user
				if ($conn->query($sql) === TRUE) 
				{               
					echo "yeyy";
				} else {             
					echo "Error: " . $sql . "<br>" . $conn->error;          
				}      

				header("Location: addPost.html"); // redirecting to post

			}else if($_POST['USERNAME'] == $user && $_POST['PASSWORD'] == $pass) {#for admin
				
				$_SESSION['loged']= true;
				$sql = "UPDATE currentuser SET user='admin' WHERE ID=1"; #updates the database with the current user: admin for admin
				if ($conn->query($sql) === TRUE) 
					{               
						echo "yeyy";
					} else {             
						echo "Error: " . $sql . "<br>" . $conn->error;          
					}      
				header("Location: addPost.html"); 
			}else echo "<script>alert('Wrong username or password.'); window.location.href='http://cakephp-mysql-persistent-melisaecs417.bde1.qmul-eecs.openshiftapps.com/project1/addPost.html';</script>";
} 


?>


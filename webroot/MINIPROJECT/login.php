<?php
	session_start();
    $user ='root';
	$pass = '';
	$db= 'testdb';
	// connection to XAMPP database
	$conn= new mysqli('localhost', $user,$pass,$db,"3306") or die("unable to connect oof");
	
	$userr = "melisa@gmail.com";
	$passs = "pass";
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{ 
		#This is to ensure that the INSERT query does not run EVERY TIME the page is loaded, even if no form was submitted.     
		$sql = "INSERT INTO testf(ID,keyUser,keyPass)  #create the row
		VALUES('1',' ',' ')"; 
		$sql = "UPDATE testf SET keyUser='$userr', keyPass='$passs'  # add to the row where ID=1
			WHERE ID=1";    
	}



#Get info from database
$query = "SELECT keyUser FROM testdb.test3 WHERE ID = '1'";
$username =@mysqli_query($conn, $query);
$row1 = mysqli_fetch_row($username);
$Username = $row1[0]; 
#echo "$Username"; just testing !

$query = "SELECT keyPass FROM testdb.test3 WHERE ID= '1'";
$password =@mysqli_query($conn, $query);
$row2 = mysqli_fetch_row($password);
$Password = $row2[0]; 


#if the user is already logged in:
if( isset($_SESSION['loged']) && $_SESSION['loged']==true) {
	echo "<script>alert('Already logged in.'); window.location.href='http://localhost/WEB/addPost.html';</script>";

} else if (isset($_POST['USERNAME']) && isset($_POST['PASSWORD'])) #if not empty
{
	if ($_POST['USERNAME'] == $Username && $_POST['PASSWORD'] == $Password) 
			{
				$_SESSION['id'] = 1;
				$_SESSION['loged']= true;
				#$_SESSION['USERNAME'] = $Eemail;
				#$_SESSION['PASSWORD'] = $Ppass;
				
				header("Location: addPost.html"); // redirecting
			}else echo "<script>alert('Wrong username or password.'); window.location.href='http://localhost/WEB/login.html';</script>";
}

?>


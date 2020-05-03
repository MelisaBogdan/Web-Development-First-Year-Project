<?php
	session_start();
	session_destroy();
	echo "<script>alert('You succesfully logged out.'); window.location.href='http://localhost/WEB/index.php';</script>";
?>
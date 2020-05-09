<?php
	session_start();
	session_destroy();
	echo "<script>alert('You succesfully logged out.');window.location.href='http://cakephp-mysql-persistent-melisaecs417.bde1.qmul-eecs.openshiftapps.com/project1/myWebsite.html'</script>";
?>

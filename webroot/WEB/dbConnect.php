<?php
    $db = new mysqli("xxxxxxxxxxxxxxxxxxxxxxx", "xxxxxxxxxxxxx", "xxxxxxxxxxxxx", "xxxxxxxxxxx");
    if($db->connect_errno > 0){
        die('Unable to connect to database [' . $db->connect_error . ']');
    }
?>
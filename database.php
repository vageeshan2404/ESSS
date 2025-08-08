<?php
   $host="localhost";
   $user="root";
   $pass="";
   $db="login";
   $mysqli=new mysqli($host,$user,$pass,$db);
    if($mysqli->connect_error){
        echo  "Failed to connect DB".$mysqli->connect_error;
    }
    return $mysqli;
?>
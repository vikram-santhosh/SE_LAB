<?php

    $user = "root";
    $database = "tourist";
    $password = "";
    $host = "localhost";
    $error = "Could not establish Connection";
    

if(!(mysql_connect($host,$user,$password)) || !(mysql_select_db($database))){
    
    die($error);
    //echo "connected";
}
//echo "connected";

?>
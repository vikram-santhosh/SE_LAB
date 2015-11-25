<?php
require('db_connect.inc.php');

if (isset($_POST["opt"])) {
	$val = $_POST["opt"];

    //echo $val ; 
    $queryA = "SELECT `$val` FROM `poll`" ;
    $queryB = "SELECT `total` FROM `poll`";
        
    if((@$queryA_run = mysql_query($queryA)) && (@$queryB_run = mysql_query($queryB))){
            
        $current = mysql_result($queryA_run,0,`$val`);
        $curr_total = mysql_result($queryB_run,0,`total`);

        $inc_total = $curr_total + 1;
        $inc = $current + 1;
        echo $inc_total . "<br>";
        $queryA_update = "UPDATE `poll` SET `$val` = '$inc'";
        $queryB_update = "UPDATE `poll` SET `total` = '$inc_total'";
            if((@$queryA_update_run = mysql_query($queryA_update))&&(@$queryB_update_run = mysql_query($queryB_update))){
 
            echo "value updated";
            header("Location:http://localhost/poll/result.php");
        }

}
    
}
?>
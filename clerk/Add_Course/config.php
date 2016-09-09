<?php
/*connecting to a DATABASE*/
$link = mysqli_connect("localhost", "root", "", "transcript");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
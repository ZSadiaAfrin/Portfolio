<?php
//for project connect to database

$hostname='localhost';
$hostuser_name='root';//by defult root value
$host_pass='';//by defult blank
$db_name='raze';
//this function we can connect this project to database
$db_connection=mysqli_connect($hostname,$hostuser_name,$host_pass,$db_name);



// if($db_connection){ //if we need to see this connection successfully
//     echo "done";
// }


?>
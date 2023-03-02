<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM logos WHERE id=$id";
$select_status_res = mysqli_query($db_connection, $select_status);
$after_assoc = mysqli_fetch_assoc($select_status_res);
if($after_assoc['status']==1){
    $update="UPDATE logos SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update);
    header('location:add_logo.php');
}
else{
    $update="UPDATE logos SET status=0 ";
    mysqli_query($db_connection,$update);

    
    $update2="UPDATE logos SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update2);
    header('location:add_logo.php');
}

?>
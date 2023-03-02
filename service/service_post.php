<?php
session_start();
require '../login_check.php';
require '../db.php';


$icon= $_POST['icon'];
$title= $_POST['title'];

$desp= mysqli_real_escape_string($db_connection,$_POST['desp']);

// $feat_image = $_POST['feat_image'];



$insert_service = "INSERT INTO services(icon,title,description)VALUES('$icon','$title','$desp')";
$insert_service_res= mysqli_query($db_connection, $insert_service);
// $after_assoc = mysqli_fetch_assoc($insert_service_res);
// echo $after_assoc['title'];


header("location:service.php");










?>
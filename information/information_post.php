<?php  
session_start();
require '../db.php';


$id=$_GET['id'];
$title = $_POST['title'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$insert = "INSERT INTO informations(title,address,phone,email)VALUES('$title','$address','$phone','$email')";
mysqli_query($db_connection, $insert);
header("location:infomation.php");














?>
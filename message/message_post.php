<?php
session_start();
require '../db.php';
require '../login_check.php';

//set default time zone in dhaka
date_default_timezone_set('Asia/Dhaka');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date=date("Y/m/d h:i:s");

$insert = "INSERT INTO messages(name,email,message,date)VALUES('$name','$email','$message','$date')";
mysqli_query($db_connection, $insert);


$_SESSION['success'] = "Messages has been send successfully";
header("location:../index.php#contact");


?>
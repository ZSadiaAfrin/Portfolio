<?php
session_start();
require '../login_check.php';
require '../db.php';


$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$description= mysqli_real_escape_string($db_connection,$_POST['desp']);
$location = $_POST['location'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$insert = "INSERT INTO contacts(sub_title,title,desp,location,address,phone,email)VALUES('$sub_title','$title','$description','$location','$address','$phone','$email')";
mysqli_query($db_connection, $insert);
header("location:contact.php");






// $insert = "INSERT INTO menus(menu_name,section_id)VALUES('$menu_name','$section_id')";
// mysqli_query($db_connection, $insert);
// header("location:menu.php");










?>
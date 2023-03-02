<?php
session_start();
require '../login_check.php';
require '../db.php';
$icon=$_POST['icon'];
$link=$_POST['link'];

$insert="INSERT INTO social_informations (icon,link)VALUES('$icon','$link')";
mysqli_query($db_connection,$insert);

header('location:info_social.php');




?>
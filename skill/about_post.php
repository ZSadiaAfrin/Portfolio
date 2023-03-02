<?php
session_start();
require '../login_check.php';
require '../db.php';
$intro=$_POST['intro'];
$title=$_POST['title'];
$description=$_POST['description'];


$update_banner="UPDATE abouts SET intro='$intro',title='$title', description='$description'";
$update_banner_res=mysqli_query($db_connection,$update_banner);




header("location:skill.php");




?>
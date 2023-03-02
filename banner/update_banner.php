<?php
session_start();
require '../login_check.php';
require '../db.php';
$sub_title=$_POST['sub_title'];
$title=$_POST['title'];
$description=$_POST['description'];


$update_banner="UPDATE banners SET sub_title='$sub_title',title='$title', description='$description'";
$update_banner_res=mysqli_query($db_connection,$update_banner);




header("location:edit_banner.php");




?>


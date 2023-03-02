<?php
session_start();
require '../login_check.php';
require '../db.php';

$title = $_POST['title'];
$desp = $_POST['desp'];
$percentage = $_POST['percentage'];
$insert = "INSERT INTO skills (title,desp,percentage)VALUES('$title','$desp','$percentage')";
mysqli_query($db_connection, $insert);
header("location:skill.php");






?>
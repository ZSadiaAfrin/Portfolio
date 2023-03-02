<?php
session_start();
require '../login_check.php';
require '../db.php';


$menu_name = $_POST['menu_name'];
$section_id = $_POST['section_id'];





$insert = "INSERT INTO menus(menu_name,section_id)VALUES('$menu_name','$section_id')";
mysqli_query($db_connection, $insert);
header("location:menu.php");










?>
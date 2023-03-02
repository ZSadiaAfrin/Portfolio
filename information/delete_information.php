<?php
session_start();
require '../db.php';

$id=$_GET['id'];



$delete="DELETE FROM informations WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="Information Deleted Successfully";
header("location:information.php");

?>
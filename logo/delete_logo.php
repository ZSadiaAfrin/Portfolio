<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM logos WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="Logo Deleted Successfully";
header("location:add_logo.php");

?>
<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM images WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="User Deleted Successfully";
header("location:image.php");

?>
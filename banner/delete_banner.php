<?php
session_start();
require '../db.php';

$id=$_GET['id'];



$delete="DELETE FROM banner_photos WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="Banner Image Deleted Successfully";
header("location:edit_banner.php");

?>
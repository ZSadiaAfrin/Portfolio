<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM testimonials WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="User Deleted Successfully";
header("location:testimonial.php");

?>
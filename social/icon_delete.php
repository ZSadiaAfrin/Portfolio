<?php
session_start();
require '../db.php';

$id=$_GET['id'];



$delete="DELETE FROM social WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="Icon Deleted Successfully";
header("location:social.php");

?>
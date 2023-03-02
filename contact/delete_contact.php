<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM contacts WHERE id=$id";
mysqli_query($db_connection,$delete);

$_SESSION['delete']="Contact Deleted Successfully";
header("location:contact.php");

?>
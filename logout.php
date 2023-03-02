<?php 
session_start();

session_destroy();
header("location:/raze/login.php");


?>
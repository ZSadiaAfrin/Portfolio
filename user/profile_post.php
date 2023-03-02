<?php 
    session_start();
     require '../db.php';

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $id=$_POST['id'];
    $after_hash=password_hash($password,PASSWORD_DEFAULT);

    if(empty($password)) {
        $update= "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        mysqli_query($db_connection,$update);
        header("location:../dashboard.php");
    }
    else{
        $update="UPDATE users SET name='$name', email='$email', password='$after_hash'  WHERE id=$id";
        mysqli_query($db_connection,$update);
        header("location:../dashboard.php");
    }





?>
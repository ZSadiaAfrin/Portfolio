<?php
require '../db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$after_hash=password_hash($password,PASSWORD_DEFAULT);
//for update user tabel data we need id so take edit_user id
$id=$_POST['id'];
if (empty($password)) {
    # code...if password filed empty we update only name and email
    //we go data base for we need update query
    $update="UPDATE users SET name='$name',email='$email' WHERE id=$id"; 
    mysqli_query($db_connection,$update);
    header("location:users.php");
}
else {
    //password field not empty
    $update="UPDATE users SET name='$name',email='$email',password='$after_hash' WHERE id=$id"; 
    mysqli_query($db_connection,$update);
    header("location:users.php");

}


?>
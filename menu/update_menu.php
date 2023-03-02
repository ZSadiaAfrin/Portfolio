<?php
require '../db.php';
$menu_name=$_POST['menu_name'];
$section_id=$_POST['section_id'];

//for update user tabel data we need id so take edit_user id
$id=$_POST['id'];

    # code...if password filed empty we update only name and email
    //we go data base for we need update query
    $update="UPDATE menus SET menu_name='$menu_name',section_id='$section_id' WHERE id=$id"; 
    mysqli_query($db_connection,$update);
    header("location:menu.php");



?>
<?php
session_start();
require '../login_check.php';
require '../db.php';

$uploaded_file=$_FILES['photo'];
$after_explode=explode('.', $uploaded_file['name']);
$extension=end($after_explode);
$file=$uploaded_file['name'];
$allowed_extension=array('jpg','jpeg','png','webp','PNG');
if (in_array($extension,$allowed_extension)) {
    if ($uploaded_file['size']<=1000000) {
        // $new_location=$uploaded_file['tmp_name']
        $insert="INSERT into banner_photos (photo)VALUES('$file')";
        mysqli_query($db_connection,$insert);
       $last_id= mysqli_insert_id($db_connection);
       $file_name= $last_id.".".$extension;
       $new_location="../uploads/banner/".$file_name;
       move_uploaded_file($uploaded_file['tmp_name'],$new_location);
       $update="UPDATE banner_photos SET photo='$file_name' WHERE id=$last_id";
       mysqli_query($db_connection,$update);
       header("location:edit_banner.php");
    
       

    }
    else {
        $_SESSION['error']='File size is too large';
        header("location:edit_banner.php");
    }

    
}
else {
    $_SESSION['error']='Invalid extension';
    header("location:edit_banner.php");
}

?>

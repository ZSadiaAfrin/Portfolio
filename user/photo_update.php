<?php 
session_start();
require '../db.php';
$uploaded_file=$_FILES['photo'];
$id=$_POST['id'];
$after_explod=explode('.',$uploaded_file['name']);

$extension=end($after_explod);
$allowed_extension=array('jpg','png','gnf','PNG');
if (in_array($extension,$allowed_extension)) {
    if ($uploaded_file['size']<=100000) {
        // for delete previous image 
        // $select_img="SELECT * FROM users  WHERE id=$id";
        // $result=mysqli_query($db_connection,$select_img);
        // $after_assoc_img=mysqli_fetch_assoc($result);
        // echo $after_assoc_img['photo'];
        // $delete_form="../uploads/user/".$after_assoc_img['photo'];
        // unlink($delete_form);
        $select="SELECT * FROM users WHERE id=$id";
        $select_img=mysqli_query($db_connection,$select);
        $after_assoc_img_photo=mysqli_fetch_assoc($select_img);
        $dlt="../uploads/user/".$after_assoc_img_photo['photo'];
        unlink($dlt);
        

        

    
        // for uploded file
        $file_name=$id .'.'. $extension;
        $new_location='../uploads/user/' . $file_name; // for upload file
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update="UPDATE users SET photo='$file_name' WHERE id=$id";
        mysqli_query($db_connection,$update);
        header("location:profile.php");
    }
    else {
        $_SESSION['error']='File size is too large!Max file length is 1mb';
        header("location:profile.php");
    }
}
else{
    $_SESSION['error']='Invalid Extension';
    header("location:profile.php");
}


?>
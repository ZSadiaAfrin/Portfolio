<?php
require '../db.php';
$logo=$_FILES['logo'];
$after_explod=explode('.', $logo['name']);
$extension=end($after_explod) ;
$name=$logo['name'];


$allowed_extension=array('jpg','jpeg','gif','webp','PNG','png');
if(in_array($extension, $allowed_extension)){
   if ($logo['size'] <= 100000) {
    $insert="INSERT INTO logos (logo)VALUES('$name')";
    mysqli_query($db_connection,$insert);
    $last_id=mysqli_insert_id($db_connection);
    $file_name=$last_id.'.'.$extension;
    $new_location="../uploads/logo/". $file_name;
    move_uploaded_file($logo['tmp_name'],$new_location);
    $update ="UPDATE logos SET logo='$file_name' WHERE id=$last_id";
    mysqli_query($db_connection,$update);
    header("location:add_logo.php");
    
   }
   else{
    $_SESSION['error']="File size to  large!Max length is 1MB";
    header("location:add_logo.php");
   }

}
else{
    $_SESSION['error']="Invalid extension";
    header("location:add_logo.php");
}





?>
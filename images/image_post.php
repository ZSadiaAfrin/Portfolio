<?php
session_start();
require '../login_check.php';
require '../db.php';


$kufa_image= $_FILES['kufa_image'];


 $insert = "INSERT INTO images(kufa_image)VALUES('$kufa_image')";
 mysqli_query($db_connection, $insert);
header("location:image.php");



// $insert = "INSERT INTO testimonials(desp,sub_title,title)VALUES('$desp','$sub_title','$title')";
// mysqli_query($db_connection, $insert);
// header("location:testimonial.php");

$last_id = mysqli_insert_id($db_connection);
$after_explode = explode('.', $kufa_image['name']);
$extension = end($after_explode);
$allowed = array('jpg', 'png','jpeg', 'PNG', 'gif');
if (in_array($extension,$allowed)) {
    if ($kufa_image['size'] <= 1000000) {
        //
        $select="SELECT * FROM images WHERE id=$last_id";
        $select_img=mysqli_query($db_connection,$select);
        $after_assoc_img_photo=mysqli_fetch_assoc($select_img);
        $dlt="../uploads/kufa/".$after_assoc_img_photo['kufa_image'];
        unlink($dlt);






        $file_name = $last_id. '.' .$extension;
        $new_location = "../uploads/kufa/". $file_name;
        move_uploaded_file($kufa_image['tmp_name'],$new_location);
        $update_name = "UPDATE images SET kufa_image='$file_name' WHERE id=$last_id";
        mysqli_query($db_connection,$update_name,);
    }
        else{
            header('location:image.php');
        }
 }


 //feat image
 
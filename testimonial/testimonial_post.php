<?php
session_start();
require '../login_check.php';
require '../db.php';


$test_image= $_FILES['test_image'];
$desp = mysqli_real_escape_string($db_connection,$_POST['desp']);
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];




$insert = "INSERT INTO testimonials(desp,sub_title,title)VALUES('$desp','$sub_title','$title')";
mysqli_query($db_connection, $insert);
header("location:testimonial.php");

$last_id = mysqli_insert_id($db_connection);
$after_explode = explode('.', $test_image['name']);
$extension = end($after_explode);
$allowed = array('jpg', 'png','jpeg', 'PNG', 'gif');
if (in_array($extension,$allowed)) {
    if ($test_image['size'] <= 1000000) {
        //
        $select="SELECT * FROM testimonials WHERE id=$last_id";
        $select_img=mysqli_query($db_connection,$select);
        $after_assoc_img_photo=mysqli_fetch_assoc($select_img);
        $dlt="../uploads/testimonial/".$after_assoc_img_photo['test_image'];
        unlink($dlt);






        $file_name = $last_id. '.' .$extension;
        $new_location = "../uploads/testimonial/". $file_name;
        move_uploaded_file($test_image['tmp_name'],$new_location);
        $update_name = "UPDATE testimonials SET test_image='$file_name' WHERE id=$last_id";
        mysqli_query($db_connection,$update_name,);
    }
        else{
            header('location:testimonial.php');
        }
 }


 //feat image
 
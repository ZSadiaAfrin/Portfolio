<?php
session_start();
require '../login_check.php';
require '../db.php';


$user_id = $_POST['user_id'];
$category = $_POST['category'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];
$desp = mysqli_real_escape_string($db_connection,$_POST['desp']);
$thumbnail = $_FILES['thumbnail'];
// $feat_image = $_POST['feat_image'];



$insert = "INSERT INTO works(user_id,category,sub_title,title,desp)VALUES('$user_id','$category','$sub_title','$title','$desp')";
mysqli_query($db_connection, $insert);
header("location:work.php");

$last_id = mysqli_insert_id($db_connection);
$after_explode = explode('.', $thumbnail['name']);
$extension = end($after_explode);
$allowed = array('jpg', 'png','jpeg', 'PNG', 'gif');
if (in_array($extension,$allowed)) {
    if ($thumbnail['size'] <= 1000000) {
        //
        $select="SELECT * FROM works WHERE id=$last_id";
        $select_img=mysqli_query($db_connection,$select);
        $after_assoc_img_photo=mysqli_fetch_assoc($select_img);
        $dlt="../uploads/work/thumb/".$after_assoc_img_photo['thumb'];
        unlink($dlt);






        $file_name = $last_id. '.' .$extension;
        $new_location = "../uploads/work/thumb/". $file_name;
        move_uploaded_file($thumbnail['tmp_name'],$new_location);
        $update_name = "UPDATE works SET thumb='$file_name' WHERE id=$last_id";
        mysqli_query($db_connection,$update_name,);
    }
        else{
            header('location:work.php');
        }
 }
 else{
    header('location:work.php');
 }
 //feat image
 $feat_image = $_FILES['feat_image'];
 $after_explode2 = explode('.', $feat_image['name']);
$extension2 = end($after_explode2);
$allowed2 = array('jpg', 'png','jpeg', 'PNG', 'gif');
if (in_array($extension2,$allowed2)) {
    if ($feat_image['size'] <= 1000000) {

        $select1="SELECT * FROM works WHERE id=$last_id";
        $select_img1=mysqli_query($db_connection,$select1);
        $after_assoc_img_photo=mysqli_fetch_assoc($select_img1);
        $dlt="../uploads/work/feat/".$after_assoc_img_photo['feat_image'];
        unlink($dlt);





        $file_name2 = $last_id. '.' .$extension2;
        $new_location = "../uploads/work/feat/". $file_name2;
        move_uploaded_file($feat_image['tmp_name'],$new_location);
        $update_name2 = "UPDATE works SET feat_image='$file_name2' WHERE id=$last_id";
        mysqli_query($db_connection,$update_name2);
    }
        else{
            header('location:work.php');
        }
 }
 else{
    header('location:work.php');
 }








?>
<?php  
session_start();
require '../db.php';


$id=$_GET['id'];


$select_icon_status="SELECT * FROM social_informations WHERE id=$id";
$select_icon_status_res=mysqli_query($db_connection,$select_icon_status);
$after_assoc_status=mysqli_fetch_assoc($select_icon_status_res);
//total count icon
$select_icon_status2="SELECT COUNT(*) as total_active_icon FROM social_informations WHERE status=1";
$select_icon_status2_res=mysqli_query($db_connection,$select_icon_status2);
$after_assoc_status2=mysqli_fetch_assoc($select_icon_status2_res);



if ($after_assoc_status['status'] ==0) {
    if ($after_assoc_status2['total_active_icon'] < 4){
        $update_status="UPDATE social_informations SET status=1 WHERE id=$id";
        mysqli_query($db_connection,$update_status);
        header('location:info_social.php');
    }
     else{
         $_SESSION['limit'] = "not more than 4 are active";
         header("location:info_social.php");
     }   
}

else{ 
     
    if($after_assoc_status2['total_active_icon']>2){
        $update_status1="UPDATE social_informations SET status=0 WHERE id=$id";
        mysqli_query($db_connection,$update_status1);
        header('location:info_social.php');
    }
     else{
     $_SESSION['limit'] = " minimum 2 icons are active";
        header("location:social.php");
    }   
}











?>
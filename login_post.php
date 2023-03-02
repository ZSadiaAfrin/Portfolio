<?php




    session_start();
    require 'db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $select="SELECT COUNT(*) as paisi FROM users WHERE email='$email'";
    $select_res=mysqli_query($db_connection,$select);
    $after_assoc=mysqli_fetch_assoc($select_res);

    

    if($after_assoc['paisi'] == 1){
        $select2="SELECT * FROM users WHERE email='$email' ";
        $select_res2=mysqli_query($db_connection,$select2);
        $after_assoc2=mysqli_fetch_assoc($select_res2);
        echo $after_assoc2['password'];
        if(password_verify($password , $after_assoc2['password']) ) {
            
            $_SESSION['login_korche']="login korcha";
            $_SESSION['id']=$after_assoc2['id'];
            header('location:dashboard.php');
        }
        else {
            $_SESSION['wrong_pass'] = "Wrong password";
            header('location:login.php');
        }


    }
        else{
            $_SESSION['invalid'] = "Invalid Email Address";
            header('location:login.php');

            }
        
    



?>

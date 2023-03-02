<?php
// for session start to trasfer date this page to another page
session_start();

//connect another page by "require"
require 'db.php';


// print_r($_POST);
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$after_hash=password_hash($password,PASSWORD_DEFAULT);

$upper=preg_match('@[A-Z]@', $password);
$lower=preg_match('@[a-z]@', $password);
$number=preg_match('@[0-9]@', $password);
$spsl=preg_match('@[#,$,%,^,&,*]@', $password);

$flag=true;

//name
if(empty($name)){

    $_SESSION['nam']="please enter your name";
    $flag=false;
    header('location:register.php');
}
//email
if(empty($email)){

    $_SESSION['email']="please enter your email";
    $flag=false;
    header('location:register.php');
}
else{
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $_SESSION['email']="please enter with email formate";
        $flag=false;
        header('location:register.php');
    }
}
//password
if(empty($password)){

    $_SESSION['pass']="please give your password";
    $flag=false;
    header('location:register.php');
}
else{
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
    $_SESSION['pass'] = "Password must contain 1 upper case,1 lower case,1 number,1 symbole and at least 8 charceter!";
    $flag=false;
    header('location:register.php');

    }
}
// if all good
if($flag){
   $insert="INSERT INTO users(name,email,password)VALUES('$name','$email','$after_hash')";
   mysqli_query($db_connection,$insert);

//   redirect to another page with header function
$_SESSION['success']="Registered successfully";
header('location:register.php');
}


//if any fild are miss
else{
    // when output is false then it going register page with whice value is fill
    $_SESSION['nam_value']="$name";
    $_SESSION['email_value']="$email";
    header('location:register.php');
}


?>
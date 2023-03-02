<?php
session_start();
require 'db.php';
$id=$_GET['id'];

$select_user="SELECT * FROM users WHERE id=$id";
$select_user_res=mysqli_query($db_connection,$select_user);
//for need one user to edit information
$after_assoc=mysqli_fetch_assoc($select_user_res);



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  
    <!-- fontawasam link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- js link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
   .pass-field{
    position: relative;
   }
   .pass-field i{
    position:absolute;
    top:31px;
    right:0;
    width:40px;
    background:teal;
    text-align:center;
    line-height:40px;
    color:#fff;
    border-radius:o 10px 10px 0;
   }
  </style>
  </head>
  <body>
   <div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    <form action="update_user.php" method="POST">
                        <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                            <input type="text" name="name" class="form-control" value="<?=$after_assoc['name'];?>">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="email" class="form-control" value="<?=$after_assoc['email'];?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" >Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>

  </body>
</html>s
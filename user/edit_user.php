<?php
session_start();
require '../login_check.php';
require '../db.php';
$id=$_GET['id'];

$select_user="SELECT * FROM users WHERE id=$id";
$select_user_res=mysqli_query($db_connection,$select_user);
//for need one user to edit information
$after_assoc=mysqli_fetch_assoc($select_user_res);

?>

<?php 
    require '../dashboard_parts/header.php';
  ?>

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
   <?php 
    require '../dashboard_parts/footer.php';
  ?>


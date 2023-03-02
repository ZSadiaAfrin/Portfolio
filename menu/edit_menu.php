<?php
session_start();
require '../login_check.php';
require '../db.php';
$id=$_GET['id'];

$select_user="SELECT * FROM menus WHERE id=$id";
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
                    <h3>Edit Menu</h3>
                </div>
                <div class="card-body">
                    <form action="update_menu.php" method="POST">
                        <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" value="<?=$id?>">
                            
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-level">Menu Name</label>
                        <input type="text" name="menu_name" class="form-control">
                         </div>

                         <div class="mb-3">
                        <label for="" class="form-level">Section Id</label>
                        <input type="text" name="section_id" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" >Update Menu</button>
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


<?php 
session_start();
require '../db.php';
require '../dashboard_parts/header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Profile Info <?=$after_assoc['name']?></h3>
                </div>
                <div class="card-body">
                    <form action="profile_post.php" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="<?=$after_assoc['id']?>">

                            <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" value="<?=$after_assoc['email']?>">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Updated</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- update for image -->
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Update Profile Image <?=$after_assoc['name']?></h3>
                </div>
                <?php if(isset($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?=$_SESSION['error']?></div>
                    <?php }unset($_SESSION['error']) ?>
                <div class="card-body">
                    <form action="photo_update.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="<?=$after_assoc['id']?>">                           
                        </div>
                        <div class="mb-3">
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Updated Photo</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php  require '../dashboard_parts/footer.php' ;  ?>
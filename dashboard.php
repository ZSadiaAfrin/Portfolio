<?php 
session_start();
require 'db.php';
require 'login_check.php';

?>


<?php require 'dashboard_parts/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-header">
                    <h3 >Welcome To Dashborad <strong><?=$after_assoc['name']?></strong> </h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut minus, rerum sed commodi eos beatae hic ipsum iure.</p>
                </div>

            </div>
        </div>
    </div>
</div>
<?php require 'dashboard_parts/footer.php' ?>
        
           
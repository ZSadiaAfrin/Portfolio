<?php
session_start();
require '../login_check.php';
require '../db.php';
$select = "SELECT * FROM skills";
$select_res = mysqli_query($db_connection, $select);

// for about section
$select_about = "SELECT * FROM abouts";
$select_about_res = mysqli_query($db_connection, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_res);


?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-8" style="height: auto;">
    <table class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Desp</th>
                <th>Percentage</th>
                <th>Status</th>
            </tr>
            <?php foreach ($select_res as $sl=>$skill) {
                # code...
             ?>
            <tr>
                <td><?=$sl+1?></td>
                <td><?=$skill['title']?></td>
                <td><?=$skill['desp']?></td>
                <td><?=$skill['percentage']?></td>
                <td>
                    <a  class="btn btn-<?=$skill['status']==1?'success':'light'?>" href="skill_status.php?id=<?=$skill['id']?>"><?=$skill['status']==1?'Active':'Deactivate'?></a>
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
    <div class="col-lg-4 ">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>Add Skill</h3>
            </div>
            <div class="card-body">
                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                    <label for="" class="form-level">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Desp</label>
                        <input type="text" name="desp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Percentage</label>
                        <input type="number" name="percentage" class="form-control">
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- new about -->
    <<div class="col-lg-8">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>About Information</h3>
            </div>
            <div class="card-body">
                <form action="about_post.php" method="POST">
                    <div class="mb-3">
                    <label for="" class="form-level">Introduction</label>
                        <input type="text" name="intro" class="form-control" value="<?=$after_assoc_about['intro']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Title</label>
                        <input type="text" name="title" class="form-control"  value="<?=$after_assoc_about['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Description</label>
                        <input type="text" name="description" class="form-control" value="<?=$after_assoc_about['description']?>">
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<?php 
  require '../dashboard_parts/footer.php';
?>
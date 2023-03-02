<?php
session_start();
require '../login_check.php';
require '../db.php';
$select = "SELECT * FROM works";
$select_res = mysqli_query($db_connection, $select);

// for about section
$select_about = "SELECT * FROM abouts";
$select_about_res = mysqli_query($db_connection, $select_about);
$after_assoc_about = mysqli_fetch_assoc($select_about_res);

//for users
// $select_users = "SELECT * FROM users";
//  $select_users_res = mysqli_query($db_connection, $select_users);
//  $after_assoc_user = mysqli_fetch_assoc($select_users_res);









?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-8" style="height: auto;">
    <table class="table table-responsive">
            <tr>
                <th>SL</th>
                <th>User_Id</th>
                <th>Category</th>
                <th>Sub_Title</th>
                <th>Title</th>
                <th>Desp</th>
                <th>Thumbnail</th>
                <th>Feat_Image</th>
            </tr>
            <?php foreach ($select_res as $sl=>$work) {
                # code...
             ?>
            <tr>
                <td><?=$sl+1?></td>
                <td>
                    <?php
                        $user_id = $work['user_id'];
                        $select_users = "SELECT * FROM users WHERE id=$user_id";
                        $select_users_res = mysqli_query($db_connection, $select_users);
                        $after_assoc_user = mysqli_fetch_assoc($select_users_res);
                         echo $after_assoc_user['name'];
                    
                    
                    ?>


                </td>
                <td><?=$work['category']?></td>
                <td><?=substr($work['sub_title'],0,10)?></td>
                <td><?=substr($work['title'],0,10)?></td>
                <td><?=substr($work['desp'],0,10)?></td>
                <td>
                    <img width="50" src="../uploads/work/thumb/<?=$work['thumb']?>" alt="image">
                </td>
                <td>
                    <img width="50" src="../uploads/work/feat/<?=$work['feat_image']?>" alt="image">
                </td>
            </tr>
            <?php } ?>
        </table>

    </div>
    <div class="col-lg-4">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>Add work</h3>
            </div>
            <div class="card-body">
                <form action="work_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="" class="form-level">Category</label>
                    <input type="hidden" name="user_id" class="form-control" value="<?= $after_assoc['id']; ?>">
                    
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Sub title</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Description</label>
                       <textarea name="desp" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Featured Image</label>
                        <input type="file" name="feat_image" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Add work</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- new about -->
    <div class="col-lg-8">
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
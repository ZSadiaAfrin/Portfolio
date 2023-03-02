<?php
session_start();
require '../login_check.php';


// for banner
require '../db.php';
$select_banner="SELECT * FROM banners";
$select_banner_res=mysqli_query($db_connection,$select_banner);
$after_assoc_banner=mysqli_fetch_assoc($select_banner_res);

// for banner photo
$select_banner_photo="SELECT * FROM banner_photos";
$select_banner_photo_res=mysqli_query($db_connection,$select_banner_photo);




?>
<?php 
  require '../dashboard_parts/header.php';
?>

<div class="row">
    <div class="col-lg-6">
        <div class="card" style="height:auto ;">
            <div class="card-header">
                <h3>Edit Banner Info</h3>
            </div>
            <div class="card-body">
                <form action="update_banner.php" method="POST">
                    <div class="mb-3">
                        <input type="text" name="sub_title" class="form-control"
                            value="<?=$after_assoc_banner['sub_title']?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" value="<?=$after_assoc_banner['title']?>">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="description" class="form-control" value="<?=$after_assoc_banner['description']?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit Banner Image</h3>
            </div>
            <div class="card-body">
            
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th>Active</th>
                    </tr>

                    <?php foreach ($select_banner_photo_res as $SL => $photo) {
                        # code...
                    ?>
                    
                    <tr>
                        <td><?=$SL+1?></td>
                        <td><img width="50" src="../uploads/banner/<?=$photo['photo']?>" alt=""></td>
                        <td><a href="photo_status.php?id=<?=$photo['id']?>" class="btn btn-<?=($photo['status'])==1?'success':'light'?>"><?=($photo['status'])==1?'Active':'Deactive'?></a></td>

                        <td>
                        <button  data-id="delete_banner.php?id=<?=$photo['id']?>" 
                            class="btn btn-danger delete_btn">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
               

                </table>

               
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Upload Banner Image</h3>
            </div>
            <div class="card-body">
                <form action="update_banner_photo.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" name="photo" class="form-control">
                    </div>       
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    



</div>



<?php 
  require '../dashboard_parts/footer.php';
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $('.delete_btn').click(function(){
                      Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                          if (result.isConfirmed) {
                          link=$(this).attr('data-id');
                          window.location.href=link;
                      }
                    })
      });
    </script>
    <?php if(isset($_SESSION['delete'])){?>
      <script>
            Swal.fire(
                      'Deleted!',
                      '<?=$_SESSION['delete']?>',
                      'success'
                        )
      </script>
    <?php } unset($_SESSION['delete'])?>


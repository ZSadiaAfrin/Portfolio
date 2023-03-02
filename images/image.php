<?php
session_start();
require '../login_check.php';
require '../db.php';
$select = "SELECT * FROM images";
$select_res = mysqli_query($db_connection, $select);
?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-8" style="height: auto;">
    <table class="table table-striped">
            <tr>
                <th>SL</th>
                
                <th>Image</th>
                <th>Action</th>
          
            </tr>
            <?php foreach ($select_res as $sl=>$img) {
                
             ?>
            <tr>
                <td><?=$sl+1?></td>
               

                <td>
                    <img width="50" src="../uploads/kufa/<?=$img['kufa_image']?>" alt="image">
                </td>
                <td>
                       <button  data-id="delete_img.php?id=<?=$img['id']?>" 
                        class="btn btn-danger delete_btn">Delete</button>
                </td>
                
            </tr>
            <?php } ?>
        </table>

    </div>
    <div class="col-lg-4">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>Add Image</h3>
            </div>
            <div class="card-body">
                <form action="image_post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="" class="form-level">Image</label>
                        <input type="file" name="kufa_image" class="form-control">
                    </div>
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- new about -->
    

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


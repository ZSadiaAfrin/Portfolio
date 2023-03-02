<?php
session_start();
require '../login_check.php';
require '../db.php';
$select_information="SELECT * FROM informations";
$select_information_res=mysqli_query($db_connection,$select_information);




?>
<?php 
  require '../dashboard_parts/header.php';
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Information</h3>
            </div>
           

            <div class="card-body">
                <form action="information_post.php" method="POST">

                    <div class="mb-3">
                        <label for="" class="form-level">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Phone</label>
                        <input type="tell" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
           

            <div class="card-header">
                <h3>Edit Information </h3>

            </div>
            <div class="card-body">
        
                <table class="table table-responsive">
                   
                        
                    
                    <tr>
                       <th>SL</th>
                       <th>Title</th>
                       <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                       <th>Action</th>
                    </tr>
                    <tr>
                    <?php foreach ($select_information_res as $sl=> $info) {  ?>
                       <td><?=$sl+1?></td>
                       <td><?=$info['title']?></td>
                       <td><?=$info['address']?></td>
                       <td><?=$info['phone']?></td>
                       <td><?=$info['email']?></td>
                       <td>
                       <button  data-id="delete_information.php?id=<?=$info['id']?>" 
                        class="btn btn-danger delete_btn">Delete</button>
                       </td>
                    </tr>
                    <?php  } ?>

                </table>

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




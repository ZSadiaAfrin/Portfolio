<?php
session_start();
require '../login_check.php';
require '../db.php';
$select='SELECT * FROM users';
$select_users= mysqli_query($db_connection,$select);
?>
<?php 
  require '../dashboard_parts/header.php';
?>

   <div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto mt-5">
         <div class="card">
            <div class="card-header text-center">
                <h3>Users List</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($select_users as $key => $user) {
                  
                 ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$user['name']?></td>
                    <td><?=$user['email']?></td>
                    <td><img width="50" src="../uploads/user/<?=$user['photo']?>" alt="photo"></td>
                    <td>

                    <a  href="edit_user.php?id=<?=$user['id']?>" 
                        class="btn btn-info ">Edit</a>

                        <button  data-id="delete.php?id=<?=$user['id']?>" 
                        class="btn btn-danger delete_btn">Delete</button>
                  </td>
                </tr>
                <?php } ?>
            </table>
            </div>
         </div>

        </div>
    </div>
   </div> 
  <!-- jquery link -->
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


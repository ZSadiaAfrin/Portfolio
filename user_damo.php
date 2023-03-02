<?php
session_start();
require '../db.php';
$select='SELECT * FROM users';
$select_users= mysqli_query($db_connection,$select);


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto mt-5">
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
                    <th>Action</th>
                </tr>
                <?php foreach ($select_users as $key => $user) {
                  
                 ?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$user['name']?></td>
                    <td><?=$user['email']?></td>
                    <td>

                    <a  href="edit_user.php?id=<?=$user['id']?>" 
                        class="btn btn-info delete_btn">Edit</a>

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
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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

  </body>
</html>
<?php
session_start();
require '../login_check.php';
require '../db.php';
$select = "SELECT * FROM menus";
$select_res = mysqli_query($db_connection, $select);
?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>See Menus</h3>
            </div>
            <div class="card-body">
            <table class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Menu Name</th>
                <th>Section_id</th>
                <th>Action</th>
            </tr>
            <?php foreach ($select_res as $sl=>$menus) {
                # code...
             ?>
            <tr>
                <td><?=$sl+1?></td>
                <td><?=$menus['menu_name']?></td>
                <td><?=$menus['section_id']?></td>
                <td>
                <a  href="edit_menu.php?id=<?=$menus['id']?>" 
                        class="btn btn-info ">Edit</a>
                </td>
                <td>
                       <button  data-id="delete_menu.php?id=<?=$menus['id']?>" 
                        class="btn btn-danger delete_btn">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </table>
            </div>
        </div>

    </div>
    <div class="col-lg-4">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>Add Menu</h3>
            </div>
            <div class="card-body">
                <form action="menu_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-level">Menu Name</label>
                        <input type="text" name="menu_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Section Id</label>
                        <input type="text" name="section_id" class="form-control">
                    </div>
                  
                    
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Add menu</button>
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


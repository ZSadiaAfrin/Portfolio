<?php
session_start();
require '../login_check.php';
require '../db.php';
$select="SELECT * FROM logos";
$select_res=mysqli_query($db_connection,$select);

?>
<?php 
  require '../dashboard_parts/header.php';
?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Logo List</h3>
                </div>
                <div class="card-body">
                    <Table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_res as $sl=>$logo) {?>
                        <tr>
                            <td><?=$sl+1?></td>
                            <td><img width="100" src="../uploads/logo/<?=$logo['logo']?>"></td>
                            <td><a href="logo_status.php?id=<?=$logo['id']?>" class="btn btn-<?=($logo['status'])==1?'success':'light'?>"><?=($logo['status'])==1?'Active':'Deactive'?></a></td>
                            <td>
                            <button  data-id="delete_logo.php?id=<?=$logo['id']?>" 
                            class="btn btn-danger delete_btn">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>

                    </Table>
                </div>
            </div>
        </div>
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Upload new logo</h3>
                </div>
                <div class="card-body">
                    <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Logo</button>
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


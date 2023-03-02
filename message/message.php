<?php
session_start();
require '../login_check.php';
require '../db.php';


 $select = "SELECT * FROM messages";
 $select_res = mysqli_query($db_connection, $select);
?>
<?php 
  require '../dashboard_parts/header.php';
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Add menu</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Action</th>
                    </tr>
                    <?php  foreach ($select_res as $SL =>$message) {
                        # code...
                      ?>
                    <tr class="<?=($message['status']==0)?'text-black bg-dark':''?>">
                        <td><?=$SL+1?></td>
                        <td><?=$message['name']?></td>
                        <td><?=$message['email']?></td>
                        <td><?=substr($message['message'],0,15).'....more'?></td>
                        <td>
                            <a href="message_view.php?id=<?=$message['id']?>" class="btn btn-info">View</a>
                            <button  data-id="message_delete.php?id=<?=$message['id']?>" 
                            class="btn btn-danger delete_btn">Delete</button>
                        </td>
                    </tr>
                    <?php  } ?>
                    <tr>
                        <?php if (mysqli_num_rows($select_res) == 0) { ?>
                            <td colspan="5" class="text-center text-danger">No data found here</td>
                        <?php } ?>
                    </tr>
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


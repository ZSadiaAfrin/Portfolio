<?php
session_start();
require '../login_check.php';
require '../db.php';
$select = "SELECT * FROM contacts";
$select_res = mysqli_query($db_connection, $select);
?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Contact Information</h3>
                
            </div>
            <div class="card-body">
            
                <table class="table table-responsive">
                    <tr>
                        <th>SL</th>
                        <th>Sub_Title</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_res as $sl => $contact ){?>
                    <tr>
                        <td><?=$sl+1?></td>
                        <td><?=$contact['sub_title']?></td>
                        <td><?=$contact['title']?></td>
                        <td><?=$contact['desp']?></td>
                        <td><?=$contact['location']?></td>
                        <td><?=$contact['address']?></td>
                        <td><?=$contact['phone']?></td>
                        <td><?=$contact['email']?></td>
                        <td>
                        <button  data-id="delete_contact.php?id=<?=$contact['id']?>" 
                        class="btn btn-danger delete_btn">Delete</button>
                       </td>
                        
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


    </div>
    <div class="col-lg-12">
        <div class="card" style="height:auto">
            <div class="card-header">
                <h3>Add Contact Information</h3>
            </div>
            <div class="card-body">
                <form action="contact_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-level">Sub_title</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Description</label>
                        <input type="text" name="desp" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Location</label>
                        <input type="text" name="location" class="form-control">
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


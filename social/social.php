<?php
session_start();
require '../login_check.php';
require '../db.php';
$select_icon="SELECT * FROM social";
$select_icon_res=mysqli_query($db_connection,$select_icon);




?>
<?php 
  require '../dashboard_parts/header.php';
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Edit Social Icon</h3>
            </div>
            <?php
            $fonts = array (
                'fa-facebook',
                'fa-facebook-f',
                'fa-facebook-official',
                'fa-facebook-square',

                'fa-twitter',
                'fa-twitter-square',

                'fa-instagram',

                'fa-youtube',
                'fa-youtube-play',
                'fa-youtube-square',

                'fa-snapchat',
                'fa-snapchat-ghost',
                'fa-snapchat-square',

                'fa-telegram',

                'fa-pinterest',
                'fa-pinterest-p',
                'fa-pinterest-square',

                'fa-whatsapp',

                'fa-linkedin',
                'fa-linkedin-square',
              


            );

            ?>

            <div class="card-body">
                <form action="icon_post.php" method="POST">
                    <div class="mb-3">
                        <?php  foreach ( $fonts as $SL => $icon) { ?>
                            <i style="font-family:fontawesome ;margin-right:5px;font-size:30px" class="fa <?=$icon?>"></i>

                            
                        <?php } ?>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="link" id="icon" class="form-control" placeholder="Link">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Icon</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
           

            <div class="card-header">
                <h3>Edit Social Icons</h3>

            </div>
            <div class="card-body">
            <?php if(isset($_SESSION['limit'])) {   ?> 
            <h5 class="text-danger"><?=($_SESSION['limit'])?></h5>
           <?php  } ?>
                <table class="table table-responsive">
                   
                        
                    
                    <tr>
                       <th>SL</th>
                       <th>Icon</th>
                       <th>Link</th>
                       <th>Status</th>
                       <th>Action</th>
                    </tr>
                    <tr>
                    <?php foreach ($select_icon_res as $sl=> $icon) {  ?>
                       <td><?=$sl+1?></td>
                       <td><?=$icon['icon']?></td>
                       <td><?=$icon['link']?></</td>
                       <td><a href="icon_status_post.php?id=<?=$icon['id']?>" class="btn btn-<?=($icon['status']==1)?'success': 'light'?>"><?=($icon['status'] == 0)?'dective':'active'?></a></td>
                       <td>
                       <button  data-id="icon_delete.php?id=<?=$icon['id']?>" 
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

<script>
    $('.fa').click(function(click){
        
        var icon_class=$(this).attr('class');

        $('#icon').attr('value' ,icon_class);
        
    })
</script>

<!-- for delete social icon -->
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


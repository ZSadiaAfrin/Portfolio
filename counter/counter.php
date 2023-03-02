<?php
session_start();
require '../login_check.php';
require '../db.php';

$select = "SELECT * FROM counters";
$select_res = mysqli_query($db_connection, $select);
?>

<?php 
  require '../dashboard_parts/header.php';
?>


<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Counter</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Icon</th>
                        <th>Number</th>
                        <th>Sub_Title</th>
                        <th>Action</th>
                
                    </tr>
                    <?php  foreach($select_res as $sl=>$counters){
                    ?>
                
                    <tr>
                        <td><?=$sl+1?></td>
                        <td><i class="<?=$counters['icon']?>"></i></td>
                        <td><?=$counters['number']?></td>
                        <td><?=$counters['sub_title']?></td>
                       <td>
                       <button  data-id="delete_count.php?id=<?=$counters['id']?>" 
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
                <h3>Add work</h3>
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
                'fa-flaticon-like',
                'fa-users',
                'fa-hand-o-up',

                'fa-hand-grab-o',
                'fa-hand-lizard-o',
                'fa-hand-o-down',
                'fa-hand-o-left',
                'fa-hand-o-right',
                'fa-hand-o-up',
                'fa-hand-paper-o',
                'fa-hand-peace-o',
                'fa-hand-pointer-o',
                'fa-hand-rock-o',
                'fa-hand-scissors-o',
                'fa-hand-spock-o',
                'fa-hand-stop-o','
                fa-handshake-o',
                'fa-hard-of-hearing',
                'fa-hashtag',
                'fa-hdd-o',
                'fa-header',
                'fa-headphones',
                'fa-heart',
                'fa-arrow-circle-up',
                'fa-calendar',
              


            );

            ?>
            <div class="card-body">
                <form action="counter_post.php" method="POST">
                    <div class="mb-3">
    
                    <div class="mb-3">
                        <?PHP foreach($fonts as $SL => $icon) {  ?>
                            <i  style="font-family:fontawesome ;margin-right:5px;font-size:30px"  class="fa <?=$icon?>"></i>
                        <?php } ?>
             
                    </div>
                    <div class="mb-3">
                    <label for="" class="form-level">Icon</label>
                        <input type="text" name="icon"  id="icon" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Number</label>
                        <input type="text" name="number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-level">Sub_Title</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>
                    
                    <div class="mb-3">
                      <button type="submit" class="btn btn-primary" class="csubmit">Submit Counter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- new about -->
    

<?php 
  require '../dashboard_parts/footer.php';
?>
<!-- for icon add in counter page here we add some counter to see the counter -->
<script>
    $('.fa').click(function(click){
        
        var icon_class=$(this).attr('class');

        $('#icon').attr('value' ,icon_class);
        
    })
</script>


<!-- for delet icon -->
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


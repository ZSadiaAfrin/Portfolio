<?php
session_start();
require '../login_check.php';
require '../db.php';
$id = $_GET['id'];

$update= "UPDATE messages SET status=1 WHERE id=$id";
$select_res = mysqli_query($db_connection, $update);


 $select = "SELECT * FROM messages  WHERE id=$id";
 $select_res = mysqli_query($db_connection, $select);
$message = mysqli_fetch_assoc($select_res);

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
                        <th>Name</th>
                        <td><?=$message['name']?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?=$message['email']?></td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td><?=$message['message']?></td>
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
</div>



<?php 
  require '../dashboard_parts/footer.php';
?>
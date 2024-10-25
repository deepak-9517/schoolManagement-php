<?php include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from query order by query_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if(isset($_REQUEST['action'])){
  echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<div class="container w-100" style="height: 80vh;">
<form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" id="all-notice" name="all_notice">
<div class="container">
    <h1 class="text-center mt-3">All Notices</h1>
    <table class="table m-5 w-100 table-hover">
      <thead class="bg-dark text-white text-center">
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Subject</th>
          <th scope="col">Message</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($rs)) {
        ?>
          <tr class="mt-3">
            <th scope="row"><?= $no++ ?></th>
            <td><?=$data['query_name']?></td>
            <td><?=$data['query_email']?></td>
            <td><?=$data['query_subject']?></td>
            <td><?=$data['query_message']?></td>
            <td>
                <a href="database/db_action.php?action=delete_query&id=<?=$data['query_id']?>" class="btn btn-danger" onclick="return confirm('Do you Want to delete..!')">Delete</a>
              </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <input type="hidden" name="action" />
  <input type="hidden" name="pid" />
</form>
</div>
<?php include('footer.php')?>
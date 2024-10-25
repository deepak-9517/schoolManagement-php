<?php include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from notice order by notice_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if(isset($_REQUEST['action'])){
  echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<a href="add_notice.php?msg=Add Notice" class="btn btn-primary float-end m-5">Add New Notice</a>
<!-- <h1 class="text-center mt-5">All Notices</h1> -->
<div class="container w-100">
<form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" id="all-notice" name="all_notice">
<div class="container">
    <h1 class="text-center mt-3">All Notices</h1>
    <table class="table m-5 w-100 table-hover">
      <thead class="bg-dark text-white text-center">
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Date</th>
          <th scope="col">Notice</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($rs)) {
        ?>
          <tr class="mt-3">
            <th scope="row"><?= $no++ ?></th>
            <td><?=$data['notice_date']?></td>
            <td><?=$data['notice_name']?></td>
            <td>
                <a href="javascript:delete_notice(<?=$data['notice_id']?>)" class="btn btn-danger">Delete</a>
                <a href="add_notice.php?msg=Update_Notice & id=<?=$data['notice_id']?>" class="btn btn-success">Update</a>
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
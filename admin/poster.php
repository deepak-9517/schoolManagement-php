<?php
include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from poster order by poster_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if(isset($_REQUEST['action'])){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<a href="add_poster.php" class="btn btn-primary float-end m-5">Add New Poster</a>
<div class="container w-50">
<form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" id="poster" name="poster">
  <div class="container">
    <h1 class="text-center mt-3">Poster Images</h1>
    <table class="table m-5 w-75">
      <thead class="bg-dark text-white">
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Images</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($rs)) {
        ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><img src="upload/<?= $data['poster_name'] ?>" alt="" height="75" width="75"></td>
            <td><a href="javascript:post_delete(<?= $data['poster_id'] ?>)" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <input type="hidden" name="action" />
  <input type="hidden" name="pid" />
</form>
</div>
<?php include('footer.php') ?>
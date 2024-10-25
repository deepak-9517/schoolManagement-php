<?php
include('header.php');
include('database/db_connect.php');
global $con;
$table=$_REQUEST['q'];
if($table=='sports'){
    $id='sports_id';
    $name='sports_name';
    $image='sports_image';
}elseif($table=='specialclass'){
    $id='special_id';
    $name='special_name';
    $image='special_image';
}
elseif($table=='labs'){
    $id='labs_id';
    $name='labs_name';
    $image='labs_image';
}
$sql = "select * from $table";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if(isset($_REQUEST['action'])){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<a href="add_facilities.php?q=<?=$table?>" class="btn btn-primary float-end m-5">Add New Image</a>
<div class="container w-50">
<form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" id="facilities" name="facilities">
  <div class="container">
    <h1 class="text-center mt-3">All <?=$table?> Images</h1>
    <table class="table m-5 w-75">
      <thead class="bg-dark text-white">
        <tr>
          <th scope="col">S.no</th>
          <th scope="col">Name</th>
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
            <td><?=$data[$name]?></td>
            <td><img src="upload/<?= $data[$image] ?>" alt="" height="75" width="75"></td>
            <td><a href="javascript:facilitie_delete(<?=$data[$id]?>,'<?=$table?>')" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <input type="hidden" name="action" />
  <input type="hidden" name="id" />
  <input type="hidden" name="table" />
</form>
</div>
<?php include('footer.php') ?>
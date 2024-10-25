<?php
include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from gallery order by gallery_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if(isset($_REQUEST['action'])){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<a href="add_gallery.php" class="btn btn-primary float-end m-5">Add Gallery Image</a>
<div class="container w-50">
<form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" id="gallery_form" name="gallery_form">
  <div class="container">
    <h1 class="text-center mt-3">All Images</h1>
    <table class="table m-5 w-75">
      <thead class="bg-dark text-white text-center">
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
            $img=$data['gallery_name'];
            $img=explode(',',$img);
            for($i=0; $i<count($img)-1;$i++){
        ?>
          <tr class="text-center">
            <th scope="row"><?= $no++ ?></th>
            <td><img src="upload/<?= $img[$i] ?>" alt="" height="75" width="75"></td>
            <td><a href="javascript:gallery_delete(<?= $data['gallery_id'] ?>,'<?= $img[$i] ?>')" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php }} ?>
      </tbody>
    </table>
  </div>
  <input type="hidden" name="action" />
  <input type="hidden" name="gid" />
  <input type="hidden" name="gimage" />
</form>
</div>
<?php include('footer.php') ?>
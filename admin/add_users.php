<?php include('header.php');
if (isset($_REQUEST['action'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>'.$_REQUEST['action'].'</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if (isset($_REQUEST['id'])) {
    include('database/db_connect.php');
    global $con;
    $id=$_REQUEST['id'];
    $sql = "select * from notice where notice_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
}
?>
    <h1 class="text-center mt-5">Add Users</h1>
<div class="container w-25 border">
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" name="notice_form">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Enter User Name</label>
            <input type="text" class="form-control mt-3" id="user"  name="user" 
              required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Password</label>
            <input type="text" class="form-control mt-3" id="pwd"  name="pwd" 
              required>
        </div>
        <input type="Submit" value="Add Users" class="btn btn-primary mt-5">
        <input type="hidden" value="add_users" name="action">
        <!-- <input type="hidden" value="<?=$id?>" name="notice_id"> -->
    </form>
</div>
<?php include('footer.php') ?>
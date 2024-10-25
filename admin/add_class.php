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
    $sql = "select * from class where class_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
}
?>
<div class="container w-50">
    <h1 class="text-center mt-5"><?=isset($_REQUEST['msg'])==1? 'Update Fess' : 'Add New Classes'?></h1>
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" name="notice_form">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Class</label>
            <input type="text" class="form-control mt-3 fs-5" id="date" name="class" 
             value="<?php if(isset($data['class_name'])) echo $data['class_name'];?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Monthly Fees</label>
            <input type="text" class="form-control fs-5" name="fess" value="<?php if(isset($data['class_fess'])) echo $data['class_fess'];?>"/>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Admission Fees</label>
            <input type="text" class="form-control fs-5" name="admin" value="<?php if(isset($data['class_admin'])) echo $data['class_admin'];?>"/>
        </div>
        <input type="Submit" value="Update Fess" class="btn btn-primary mt-5"/>
        <input type="hidden" value="update_fess" name="action">
        <input type="hidden" value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id']?>" name="class_id">
    </form>
</div>
<?php include('footer.php') ?>
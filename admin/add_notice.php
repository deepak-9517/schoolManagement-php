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
<div class="container w-50">
    <h1 class="text-center mt-5"><?= $_REQUEST['msg'] ?></h1>
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" name="notice_form">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Select Date</label>
            <input type="date" class="form-control mt-3" id="date" placeholder="name@example.com" name="date" 
             value="<?=$data['notice_date']?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Write Notice</label>
            <Textarea name="notice" class="form-control" rows="5" required><?php if(isset($data['notice_name'])) echo $data['notice_name'];?></Textarea>
        </div>
        <input type="Submit" value="Add Notice" class="btn btn-primary mt-5">
        <input type="hidden" value="add_notice" name="action">
        <input type="hidden" value="<?=$id?>" name="notice_id">
    </form>
</div>
<?php include('footer.php') ?>
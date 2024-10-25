<?php include('header.php');
include('database/function.php');
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
    // $table=$_REQUEST['table'];
    $sql = "select * from topper10 where topper_id=$id";
    // echo $sql;
    // die();
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
}
?>
    <h1 class="text-center mt-5">Add Topper Records</h1>
<div class="container w-50 border">
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5" name="notice_form">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label ">Name</label>
            <input type="text" class="form-control mt-3" id="name" name="name" value="<?php if(isset($data['topper_name'])) echo $data['topper_name'];?>" 
required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label ">Class</label>
            <select name="class" class="form-control" required>
                <?=get_option_value('tclass','tclass_id','tclass_name',$data['topper_class'])?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Percentage</label>
            <input type="text" class="form-control mt-3" id="percentage" name="percentage" value="<?php if(isset($data['topper_percentage'])) echo $data['topper_percentage'];?>"
required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stream</label>
            <input type="text" class="form-control mt-3" id="stream" name="stream" 
            value="<?php if(isset($data['topper_stream'])) echo $data['topper_stream'];?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image</label>
            <input type="file" class="form-control mt-3" id="image" name="image" value="<?php if(isset($data['topper_image'])) echo $data['topper_image'];?>"
required>
        </div>

        <input type="Submit" value="Add Record" class="btn btn-primary mt-5">
        <input type="hidden" value="add_topper" name="action">
        <input type="hidden" value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id'];?>" name="tid">
        
    </form>
</div>
<?php include('footer.php') ?>
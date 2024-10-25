<?php 
include('header.php'); 
// echo $_REQUEST['act'];
if(isset($_REQUEST['act'])){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
    <strong>'.$_REQUEST['act'].'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}
?>

<div class="container w-50 mt-5">
    <h1 class="text-center">Add Poster Image</h1>
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Select Image</label>
            <input type="file" class="form-control mt-3" id="poster" placeholder="name@example.com" name="poster" required> 
        </div>
        <input type="Submit" value="Add Poster" class="btn btn-primary mt-5">
        <input type="hidden" value="addposter" name="action">
    </form>
</div>
<?php include('footer.php') ?>
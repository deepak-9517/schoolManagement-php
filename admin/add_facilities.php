<?php 
include('header.php'); 
$table=$_REQUEST['q'];
if(isset($_REQUEST['action'])){
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
    <strong>'.$_REQUEST['action'].'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
}
?>

<div class="container w-50 mt-5">
    <h1 class="text-center">Add <?=$table?> Image</h1>
    <form action="database/db_action.php" method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Image Type Name</label>
            <input type="text" class="form-control mt-3" id="fname" name="fname" required> 
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label fs-3">Select Image</label>
            <input type="file" class="form-control mt-3" id="fimage" name="fimage" required> 
        </div>
        <input type="Submit" value="Add Image" class="btn btn-primary mt-5">
        <input type="hidden" value="<?=$table?>" name="table">
        <input type="hidden" value="facilities" name="action">
    </form>
</div>
<?php include('footer.php') ?>
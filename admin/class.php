<?php include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from class order by class_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if (isset($_REQUEST['action'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>' . $_REQUEST['action'] . '</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<a href="add_class.php" class="btn btn-primary float-end m-5">Add New Class</a>
<div class="container w-50 mt-5">
    <table class="table">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Class</th>
                <th scope="col">Monthly Fees</th>
                <th scope="col">Adminsion Fees</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="text-center fs-5">
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($rs)) {
            ?>
                <tr>
                    <th scope="row"><?=$no++?></th>
                    <td><?=$data['class_name'] ?></td>
                    <td><?=$data['class_fess'] ?></td>
                    <td><?=$data['class_admin'] ?></td>
                    <td><a href="database/db_action.php?id=<?=$data['class_id']?> & action=class_delete" class="btn btn-danger btn-sm me-1" onclick="return confirm('Do you want to delete...!')">Delete</a><a href="add_class.php?id=<?=$data['class_id']?> & msg=Update Fess" class="btn btn-success btn-sm">Update</a><button onclick="fess_status(<?=$data['class_id']?>,<?=$data['class_status']?>,this)" class="btn btn-primary ms-2 btn-sm" id="status"><?php echo $data['class_status']==0? 'Show':'Hidden'?></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>
<!-- <?=$data['class_id']?>,<?=$data['class_status']?>, -->
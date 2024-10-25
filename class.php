<?php include('header.php');
include('admin/database/db_connect.php');
global $con;
$sql = "select * from class where class_status=1 order by class_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if (isset($_REQUEST['action'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>' . $_REQUEST['action'] . '</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<div class="container w-50 mt-5">
    <table class="table table-hover">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Class</th>
                <!-- <th scope="col">Fees</th> -->
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
                    <td><a href="show_fees.php?id=<?=$data['class_id']?>" class="btn btn-primary">More Details</a></td>
                    <!-- <td><a href="#" class="btn btn-success">Update</a><a href="#" class="btn btn-primary ms-2">show</a></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>
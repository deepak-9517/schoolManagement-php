<?php include('header.php');
include('database/db_connect.php');
global $con;
$sql = "select * from topper10 where topper_class=1";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
if (isset($_REQUEST['action'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show fs-5" role="alert">
 <strong>' . $_REQUEST['action'] . '</strong>
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?><a href="add_acchivements.php" class="btn btn-primary float-end m-5">Add Records</a>
<div class="container w-75 mt-5">
    <h1 class="text-center fs-3">All 10th Toppers</h1>
    <table class="table">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Percentage</th>
                <th scope="col">Stream</th>
                <th scope="col">Image</th>
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
                    <td><?=$data['topper_name'] ?></td>
                    <td><?=$data['topper_class'] ?></td>
                    <td><?=$data['topper_percentage'] ?> %</td>
                    <td><?=$data['topper_stream'] ?></td>
                    <td><img src="upload/<?=$data['topper_image'] ?>" alt="" height="75" width="75"/></td>
                    <td><a href="database/db_action.php?id=<?=$data['topper_id'] ?>& action=delete_acchivement" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete..!')">Delete</a><a href="add_acchivements.php?id=<?=$data['topper_id'] ?>" class="btn btn-success btn-sm">Update</a></td>
                    
                </tr>
            <?php } 
            $sql = "select * from topper10 where topper_class=2";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            ?>
        </tbody>
    </table>
</div>
<div class="container w-75 mt-5">
    <h1 class="text-center fs-3">All 12th Toppers</h1>
    <table class="table">
        <thead class="bg-dark text-center text-white">
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Percentage</th>
                <th scope="col">Stream</th>
                <th scope="col">Image</th>
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
                    <td><?=$data['topper_name'] ?></td>
                    <td><?=$data['topper_class'] ?></td>
                    <td><?=$data['topper_percentage'] ?>%</td>
                    <td><?=$data['topper_stream'] ?></td>
                    <td><img src="upload/<?=$data['topper_image'] ?>" alt="" height="75" width="75"/></td>
                    <td><a href="database/db_action.php?id=<?=$data['topper_id'] ?> & action=delete_acchivement" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete...!')">Delete</a><a href="add_acchivements.php?id=<?=$data['topper_id'] ?>" class="btn btn-success btn-sm">Update</a></td>
                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>
<!-- <?=$data['class_id']?>,<?=$data['class_status']?>, -->
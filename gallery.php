<?php include('header.php');
    include('admin/database/db_connect.php');
?>
<!-- Gallery Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
            <h1 class="mb-5">Gallery</h1>
        </div>
        <div class="row g-4 ps-5">
            <?php
            global $con;
            $sql = "select * from gallery order by gallery_id";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            // $data = mysqli_fetch_assoc($rs);
            while($data=mysqli_fetch_assoc($rs)){
                $data=$data['gallery_name'];
                $data=explode(',',$data);
                for($i=0; $i<count($data)-1; $i++){
            ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="admin/upload/<?=$data[$i]?>" alt="" style="height: 15rem; width:50rem">
                    </div>
                </div>
            </div>
            <?php }} ?>
        </div>
    </div>
</div>
<!-- gallery End -->
<?php include('footer.php') ?>
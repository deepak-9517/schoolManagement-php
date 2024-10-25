<?php include('header.php');
include('admin/database/db_connect.php');
?>
<!-- Team Start -->
<div class="container-xxl py-5 text-center">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Student</h6>
                <h1 class="mb-5">Our 10th Topper Student</h1>
            </div>
            <div class="row g-4">
            <?php
                global $con;
                $sql="select * from topper10 where topper_class=1";
                $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
                while($data=mysqli_fetch_assoc($rs)){
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="admin/upload/<?=$data['topper_image']?>" alt="" style="height: 15rem; width:50rem">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['topper_name']?></h5>
                            <small><?=$data['topper_percentage']?>% (<?=$data['topper_stream']?>)</small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Student</h6>
                <h1 class="mb-5">Our 12th Topper Student</h1>
            </div>
            <div class="row g-4">
            <?php
                global $con;
                $sql="select * from topper10 where topper_class=2";
                $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
                while($data=mysqli_fetch_assoc($rs)){
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="admin/upload/<?=$data['topper_image']?>" alt="" style="height: 15rem; width:50rem">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['topper_name']?></h5>
                            <small><?=$data['topper_percentage']?>% (<?=$data['topper_stream']?>)</small>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Team End -->
<?php include('footer.php')?>
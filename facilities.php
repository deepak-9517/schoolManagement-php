<?php 
include('header.php');
include('admin/database/db_connect.php');
global $con;
$sql = "select * from sports order by sports_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
?>
    <!-- sports Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Sports</h1>
            </div>
            <div class="row g-4 ps-5">
                <?php
                    while($data=mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="admin/upload/<?=$data['sports_image']?>" alt="" style="height: 15rem; width:50rem">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['sports_name']?></h5>
                        </div>
                    </div>
                </div>
                <?php }
                    $sql = "select * from specialclass order by special_id";
                    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                ?>
            </div>
        </div>
    </div>
    <!-- sports End -->
    <!-- class Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Special Classes</h1>
            </div>
            <div class="row g-4 ps-5">
                <?php
                while($data=mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                        <img class="img-fluid" src="admin/upload/<?=$data['special_image']?>" alt="" style="height: 15rem; width:50rem"/>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['special_name']?></h5>
                        </div>
                    </div>
                </div>
                <?php }
                $sql = "select * from labs order by labs_id";
                $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
                ?>
            </div>
        </div>
    </div>
    <!-- class End -->
    <!-- lab Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Labs</h1>
            </div>
            <div class="row g-4 ps-5">
            <?php
                while($data=mysqli_fetch_assoc($rs)){
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                        <img class="img-fluid" src="admin/upload/<?=$data['labs_image']?>" alt="" style="height: 15rem; width:50rem">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><?=$data['labs_name']?></h5>
                        </div>
                    </div>
                </div>
                <?php }?>
                <!-- <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Science Lab</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Computer Lab</h5>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- lab End -->
<?php include('footer.php');?>
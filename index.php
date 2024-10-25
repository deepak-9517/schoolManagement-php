<?php include('header.php');
include('admin/database/db_connect.php');
global $con;
$sql = "select * from poster order by poster_id";
$rs = mysqli_query($con, $sql) or die(mysqli_error($con));
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="modal">
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button me-3" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <img src="img/post3.jpg" alt="" width="500" height="500">
        </div>
    </div>
</div>
<!-- end -->
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div class="owl-carousel header-carousel position-relative">
        <?php
        while ($data = mysqli_fetch_assoc($rs)) {
        ?>
            <div class="owl-carousel-item position-relative">
                <img class="" src="admin/upload/<?= $data['poster_name'] ?>" alt="">
            </div>
        <?php } ?>
    </div>
</div>
<!-- Carousel End -->

<!-- notice -->
<div class="container w-75">
    <div class="alert alert-dark text-center bg-dark text-white fs-3" role="alert">
        Notice Board
    </div>
    <?php
    global $con;
    $sql = "select * from notice order by notice_id desc limit 4";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    while ($data = mysqli_fetch_assoc($rs)) {
        $date = explode('-', $data['notice_date']);
    ?>
        <div class="alert alert-dark text-white fs-5 d-flex flex-row" role="alert">
            <div class="fs-3">
                <div><?= $date[2] . '/' . $date[1] ?> |</div>
            </div>
            <p class="ms-5 text-dark"><?= $data['notice_name'] ?></p>
        </div>
    <?php } ?>
</div>
<!-- end notice -->



<!-- About Start -->
<div class="container-xxl py-5">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
        <h1 class="mb-5">About</h1>
    </div>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="img/post1.jpg" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <p class="mb-4" id="about-text">The Nalanda International School a up affiliated School was established in 1987 under the aegis of “Manorathpur (keshav Nagar)”, Sultanpur. Living up to the founders vision this Society has also been running another premier institution of Sultanpur affiliated to U.P. Board.</p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->


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
            $cnt=0;
            while($data=mysqli_fetch_assoc($rs)){
                $data=$data['gallery_name'];
                $data=explode(',',$data);
                for($i=0; $i<count($data)-1; $i++){
            ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="admin/upload/<?=$data[$i]?>" alt="" style="height: 20rem; width:50rem">
                    </div>
                </div>
            </div>
            <?php 
                $cnt++;
                if($cnt>=4)
                break;
            }
            if($cnt>=4)
                break;
            } ?>
        </div>
    </div>
</div>


<!-- Gallery end -->



<!-- topper Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Toppers</h6>
            <h1 class="mb-5 fs-2">Our 10th-Topper Students!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
                global $con;
                $sql="select * from topper10 where topper_class=1";
                $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
                while($data=mysqli_fetch_assoc($rs)){
            ?>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="admin/upload/<?=$data['topper_image']?>" style="width: 80px; height: 80px;">
                <h5 class="mb-0 fs-4"><?=$data['topper_name']?></h5>
                <p><?=$data['topper_class']==1? '10th' : '12th'?></p>
                <p><?=$data['topper_percentage']?>% (<?=$data['topper_stream']?>)</p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- tppper 12 -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Toppers</h6>
            <h1 class="mb-5 fs-2">Our 12th-Topper Students!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
        <?php
                global $con;
                $sql="select * from topper10 where topper_class=2";
                $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
                while($data=mysqli_fetch_assoc($rs)){
            ?>
            <div class="testimonial-item text-center">
                <img class="border rounded-circle p-2 mx-auto mb-3" src="admin/upload/<?=$data['topper_image']?>" style="width: 80px; height: 80px;">
                <h5 class="mb-0 fs-4"><?=$data['topper_name']?></h5>
                <p><?=$data['topper_class']==2? '12th' : '10th'?></p>
                <p></p><?=$data['topper_percentage']?>% (<?=$data['topper_stream']?>)</p>

            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- tppper 12 end-->

<?php include('footer.php') ?>
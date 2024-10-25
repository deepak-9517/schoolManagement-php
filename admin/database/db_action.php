<?php
include('db_connect.php');
if ($_REQUEST['action'] == 'addposter')
    add_poster();
if ($_REQUEST['action'] == 'Delete_post')
    Delete_post();
if ($_REQUEST['action'] == 'Delete_notice')
    Delete_notice();
if ($_REQUEST['action'] == 'add_notice')
    add_notice();
if ($_REQUEST['action'] == 'add_gallery')
    add_gallery();
if ($_REQUEST['action'] == 'delete_gallery_image')
    delete_gallery_image();
if ($_REQUEST['action'] == 'update_fess')
    update_fess();
if ($_REQUEST['action'] == 'facilities')
    facilities();
if ($_REQUEST['action'] == 'facility_delete')
    facility_delete();
if ($_REQUEST['action'] == 'delete_acchivement')
    delete_acchivement();
if ($_REQUEST['action'] == 'class_delete')
    class_delete();
if ($_REQUEST['action'] == 'add_users')
    add_users();
if ($_REQUEST['action'] == 'user_query')
    user_query();
if ($_REQUEST['action'] == 'delete_query') {
    // echo 'hlo';
    delete_query();
}
if ($_REQUEST['action'] == 'add_topper') {
    if ($_REQUEST['tid'] != "") {
        update_topper();
    } else {
        add_topper();
    }
}


################################## ADD POSTER ##############################

function add_poster()
{
    global $con;
    $name = $_FILES['poster']['name'];
    $name = time() . $name;
    $size = ($_FILES['poster']['size'] / (1024));
    $tmp_name = $_FILES['poster']['tmp_name'];
    $type = $_FILES['poster']['type'];
    $type = explode('/', $type);
    $sql = "select * from poster";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if (mysqli_num_rows($rs) <= 5) {
        $ary = array('jpeg', 'jpg', 'png', 'gif');
        if ($size <= 4096 && in_array($type[1], $ary)) {
            move_uploaded_file($_FILES['poster']['tmp_name'], "../upload/" . $name);
            $sql = "insert into poster (poster_name) values('$name')";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            header('location:../add_poster.php?act=Poster Uploaded Successfully....!');
        } else {
            header('location:../add_poster.php?act=Select file must be jpg png and size Less than 2 MB....!');
        }
    } else {
        header('location:../add_poster.php?act=Uploaded Only 5 Poster Add New Poster Existing Poster Delete');
    }
}


############################Delete post###################################

function Delete_post()
{
    global $con;
    $id = $_REQUEST['pid'];
    $sql = "select * from poster where poster_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs) or die(mysqli_error($con));
    if ($data['poster_name']) {
        unlink('../upload/' . $data['poster_name']);
    }
    $sql = "delete from poster where poster_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../poster.php?action=Poster Delete Successfully...!');
    }
}

############################Delete Notice###################################

function Delete_notice()
{
    global $con;
    $id = $_REQUEST['pid'];
    $sql = "delete from notice where notice_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../notice.php?action=Notice Delete Successfully...!');
    }
}

##################################Add Notice##############################

function add_notice()
{
    global $con;
    $date = mysqli_real_escape_string($con, $_REQUEST['date']);
    $notice = mysqli_real_escape_string($con, $_REQUEST['notice']);
    if (isset($_REQUEST['notice_id'])) {
        $id = $_REQUEST['notice_id'];
        $sql = "update notice set notice_id='$date',notice_name='$notice' where notice_id=$id";
    } else {
        $sql = "insert into notice (notice_date,notice_name) value('$date','$notice')";
    }
    // echo $sql;
    // die();
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs && !isset($_REQUEST['notice_id'])) {
        header('location:../add_notice.php?action=Notice Add Successfully...! & msg=Add Notice');
    } else {
        header('location:../notice.php?action=Update Successfully...!');
    }
}

################################### Add Gallery Image #########################

function add_gallery()
{
    global $con;
    $imgc = "";
    $cnt = count($_FILES['gallery']['name']);
    if ($cnt <= 5) {
        echo '<pre>';
        print_r($_FILES['gallery']['type']);
        $ary = array('jpeg', 'jpg', 'png', 'gif');
        $count = 0;
        foreach ($_FILES['gallery']['type'] as $img) {
            $type = explode('/', $img);
            if (!in_array($type[1], $ary)) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            for ($i = 0; $i < $cnt; $i++) {
                $name = $_FILES['gallery']['name'][$i];
                $name = time() . $name;
                $tmp_name = $_FILES['gallery']['tmp_name'][$i];
                move_uploaded_file($tmp_name, '../upload/' . $name);
                $imgc .= $name . ",";
            }
            $sql = "insert into gallery (gallery_name) values('$imgc')";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            if ($rs) {
                header('location:../add_gallery.php?action=Image Uploaded Successfully...!');
            }
        } else {
            header('location:../add_gallery.php?action=Select Only JPG | PNG | JPEG Files...!');
        }
    } else {
        header('location:../add_gallery.php?action=Uploaded Only 5 Images');
    }
}

##################################delete_gallery_image##################################

function delete_gallery_image()
{
    global $con;
    $id = $_REQUEST['gid'];
    $img = $_REQUEST['gimage'];
    $sql = "select * from gallery where gallery_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs) or die(mysqli_error($con));
    $data = $data['gallery_name'];
    $data = explode(',', $data);
    if (count($data) != 2) {
        $uimg = "";
        for ($i = 0; $i < count($data) - 1; $i++) {
            if ($data[$i] == $img) {
                unlink('../upload/' . $data[$i]);
                continue;
            }
            $uimg .= $data[$i] . ",";
        }
        $sql = "update gallery set gallery_name='$uimg' where gallery_id=$id";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        if ($rs) {
            header('location:../gallery.php?action=Delete Successfully...!');
        }
    } else {
        if ($data[0]) {
            unlink('../upload/' . $data[0]);
        }
        $sql = "delete from gallery where gallery_id=$id";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        if ($rs) {
            header('location:../gallery.php?action=Image Delete Successfully...!');
        }
    }
}

############################ Update Fess ################################

function update_fess()
{
    global $con;
    $id = $_REQUEST['class_id'];
    $fess = $_REQUEST['fess'];
    $class = $_REQUEST['class'];
    $admin = $_REQUEST['admin'];
    if ($_REQUEST['class_id']) {
        $sql = "update class set class_name='$class',class_fess='$fess',class_admin='$admin' where class_id=$id";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        header("location:../class.php?action=Record Updated...!");
    } else {
        $sql = "insert into class (class_name,class_fess,class_admin) values('$class','$fess','$admin')";
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        header("location:../add_class.php?action=Record Add Successfully...!");
    }
}

######################### Add Sports Image ################################

function facilities()
{
    global $con;
    $table = $_REQUEST['table'];
    $name = $_FILES['fimage']['name'];
    $imgname = $_REQUEST['fname'];
    $name = time() . $name;
    $size = ($_FILES['fimage']['size'] / (1024));
    $tmp_name = $_FILES['fimage']['tmp_name'];
    $type = $_FILES['fimage']['type'];
    $type = explode('/', $type);
    $ary = array('jpeg', 'jpg', 'png', 'gif');
    if ($size <= 4096 && in_array($type[1], $ary)) {
        move_uploaded_file($_FILES['fimage']['tmp_name'], "../upload/" . $name);
        if ($table == 'sports') {
            $sql = "insert into $table (sports_name,sports_image) values('$imgname','$name')";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            header('location:../add_facilities.php?action=Sports Image Uploaded Successfully....!&q=sports');
        } else if ($table == 'specialclass') {
            $sql = "insert into $table (special_name,special_image) values('$imgname','$name')";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            header('location:../add_facilities.php?action=Sports Image Uploaded Successfully....!&q=specialclass');
        } else if ($table == 'labs') {
            $sql = "insert into $table (labs_name,labs_image) values('$imgname','$name')";
            $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
            header('location:../add_facilities.php?action=Sports Image Uploaded Successfully....!&q=labs');
        }
    } else {
        header('location:../add_facilities.php?action=Select file must be jpg png and size Less than 4 MB....!&q=sports');
    }
}


############################## facility_delete#################################

function facility_delete()
{
    global $con;
    $id = $_REQUEST['id'];
    $table = $_REQUEST['table'];
    if ($table == 'sports') {
        $col = 'sports_id';
        $col1 = 'sports_image';
    } else if ($table == 'specialclass') {
        $col = 'special_id';
        $col1 = 'special_image';
    } else if ($table == 'labs') {
        $col = 'labs_id';
        $col1 = 'labs_image';
    }
    $sql = "select * from $table where $col=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs) or die(mysqli_error($con));
    if ($data[$col1]) {
        unlink('../upload/' . $data[$col1]);
    }
    $sql = "delete from $table where $col=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../facilities.php?action=Image Delete Successfully...!&q=' . $table);
    }
}

########################## add_topper ##############################

function add_topper()
{
    global $con;
    $uname = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $percentage = $_REQUEST['percentage'];
    $stream = $_REQUEST['stream'];
    $name = $_FILES['image']['name'];
    $name = time() . $name;
    $size = ($_FILES['image']['size'] / (1024));
    $type = $_FILES['image']['type'];
    $type = explode('/', $type);
    $ary = array('jpeg', 'jpg', 'png', 'gif');
    if ($size <= 4096 && in_array($type[1], $ary)) {
        //if($class==1){
        $sql = "insert into topper10 (topper_name,topper_class,topper_percentage,topper_stream,topper_image) values('$uname',$class,'$percentage','$stream','$name')";
        //}
        // if($class==2){
        //     $sql = "insert into topper12 (topper_name,topper_class,topper_percentage,topper_stream,topper_image) values('$uname',$class,'$percentage','$stream','$name')";
        // }
        $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
        move_uploaded_file($_FILES['image']['tmp_name'], "../upload/" . $name);
        header('location:../add_acchivements.php?action=Record Uploaded Successfully....!');
    } else {
        header('location:../add_acchivements.php?action=Select file must be jpg png and size Less than 2 MB....!');
    }
}

########################## update_topper ##############################

function update_topper()
{
    global $con;
    $uname = $_REQUEST['name'];
    $class = $_REQUEST['class'];
    $percentage = $_REQUEST['percentage'];
    $stream = $_REQUEST['stream'];
    $id = $_REQUEST['tid'];
    // $table=$_REQUEST['table'];
    $sql = "update topper10 set topper_name='$uname',topper_class=$class,topper_percentage='$percentage',topper_stream='$stream' where topper_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs)
        header('location:../acchivements.php?action=Record Update Successfully...!');
}

################################# delete acchivemt ############################################
function delete_acchivement()
{
    global $con;
    $id = $_REQUEST['id'];
    $sql = "select * from topper10 where topper_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($rs) or die(mysqli_error($con));
    if ($data['topper_image']) {
        unlink('../upload/' . $data['topper_image']);
    }
    $sql = "delete from topper10 where topper_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../acchivements.php?action=Record Delete Successfully...!');
    }
}

############################# class_delete #####################

function class_delete()
{
    global $con;
    $id = $_REQUEST['id'];
    $sql = "delete from class where class_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../class.php?action=Class Delete Successfully...!');
    }
}

######################### add_users ############################

function add_users()
{
    global $con;
    $user = $_REQUEST['user'];
    $pwd = md5($_REQUEST['pwd']);
    $sql = "insert into login (user_name,user_pwd) values('$user','$pwd')";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header("location:../add_users.php?action=User Add Successfully");
    }
}

#################### user_query###########################

function user_query()
{
    global $con;
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $sql = "insert into query (query_name,query_email,query_subject,query_message) value('$name','$email','$subject','$message')";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    header('location:../../contact.php?action=Notice Add Successfully...!');
}

################################# delete_query ###########################

function delete_query(){
    $id = $_REQUEST['id'];
    global $con;
    $sql = "delete from query where query_id=$id";
    $rs = mysqli_query($con, $sql) or die(mysqli_error($con));
    if ($rs) {
        header('location:../query.php?action=Notice Delete Successfully...!');
    }
}

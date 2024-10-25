<?php
include('db_connect.php');
    global $con;
    $id=$_REQUEST['q'];
    $status=$_REQUEST['status'];
    if($status==0)
        $sql="update class set class_status=1 where class_id=$id";
    else
        $sql="update class set class_status=0 where class_id=$id";
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    // if($status==0){
    //     echo 'Hidden';
    // }else{
    //     echo 'Show';
    // }
?>
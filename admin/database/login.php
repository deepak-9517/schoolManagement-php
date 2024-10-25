<?php
session_start();
include('db_connect.php');
global $con;
if($_REQUEST['action']=='logout_user'){
$_SESSION['user']='';
session_destroy();
header('location:../index.php?action=User Logout...!');
}else{
$user=mysqli_real_escape_string($con,$_REQUEST['user']);
$pwd=md5(mysqli_real_escape_string($con,$_REQUEST['pwd']));
$sql="select * from login where user_name='$user' and user_pwd='$pwd'";
$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
    $_SESSION['user']=$user;
    header("location:../admin.php");
}else{
    header('location:../index.php?action=Please Enter Valid Information...!');
}
}
?>
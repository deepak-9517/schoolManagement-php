<?php
    global $con;
    $con=mysqli_connect('localhost','root','') or die(mysqli_error($con));;
    mysqli_select_db($con,'school') or die(mysqli_error($con));
?>
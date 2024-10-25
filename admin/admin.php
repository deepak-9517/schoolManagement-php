<?php 
// session_start();
include('header.php'); ?>
<h1 class="text-center m-5 text-danger fs-1" style="height: 60vh;">Hello Mr. <?=$_SESSION['user']?></h1>
<?php include('footer.php') ?>
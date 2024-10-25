<?php include('header.php');
    include('admin/database/db_connect.php');
    global $con;
    $id=$_REQUEST['id'];
    $sql="select * from class where class_id=$id";
    $rs=mysqli_query($con,$sql) or die(mysqli_error($con));
    $data=mysqli_fetch_assoc($rs) or die(mysqli_error($con));
?>
<div class="container w-25" style="height: 100vh;">
<table class="table table-bordered m-5" style="height: 30vh;">
  <thead>
    <tr class="bg-dark text-white">
      <th scope="col" colspan="2" class="fs-1 text-center">Fess</th>
    </tr>
    <tr class="text-center bg-primary fs-4">
      <th scope="col">Class</th>
      <th scope="col">RS.</th>
    </tr>
  </thead>
  <tbody>
    <tr class="fs-5">
      <th scope="row">Adminssion Fees</th>
      <td><?=$data['class_admin']?></td>
    </tr>
    <tr class="fs-5">
      <th scope="row">Monthly Fees</th>
      <td><?=$data['class_fess']?></td>
    </tr>
    <tr class="fs-5">
      <th scope="row">Total</th>
      <td><?=$data['class_admin']+$data['class_fess']?></td>
    </tr>
  </tbody>
</table>
</div>

<?php include('footer.php')?>
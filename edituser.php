<?php include('inc/config.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>

<?php

$userid = $_GET['userid'];

$select = mysqli_query($connection,"select * from user where id='$userid' ");
$row = mysqli_fetch_array($select);


   
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>User Management</h4>
<h6>Edit/Update User</h6>
</div>
</div>
<form method="post">
<div class="card">
<div class="card-body">
<div class="row">
  
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Full Name</label>
<input type="text" value="<?php echo $row['name'];?>" name="fullname" disabled>
<input type="hidden" value="<?php echo $row['id'];?>" name="id" >
</div>
</div>
<!-- <div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Password</label>
<div class="pass-group">
<input type="password" class=" pass-input" value="<?php echo $row['pwd']; ?>" name="password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div> -->
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" value="<?php echo $row['phone']; ?>" name="phone" disabled>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" value="<?php echo $row['email']; ?>" name="email" disabled>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Role</label>
<select class="select" name="role">
<option>Select</option>
<?php if($row['role'] =="admin"){?>
<option value="admin" selected>Admin</option>
<option value="staff">Staff</option>
<?php }else{?>
  <option value="admin" >Admin</option>
<option value="staff" selected>Staff</option>

  <?php } ?>
</select>
</div>
</div>
<!-- <div class="col-lg-12">
<div class="form-group">
<label> User Image</label>
<div class="image-upload">
<input type="file">
<div class="image-uploads">
<img src="assets/img/icons/upload.svg" alt="img">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div> -->
<!-- <div class="col-12">
<div class="product-list">
<ul class="row">
<li class="ps-0">
<div class="productviewset">
<div class="productviewsimg">
<img src="assets/img/customer/profile2.jpg" alt="img">
</div> -->
<!-- <div class="productviewscontent">
<a href="javascript:void(0);" class="hideset"><i class="fa fa-trash-alt"></i></a>
</div> -->
</div>
</li>
</ul>
</div>
</div>
<div class="col-lg-12">
<button type="submit" name="Submit" class="btn btn-submit me-2">Update</button>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</form>
<?php

if(isset($_POST['Submit'])){
  $id = $_POST['id'];
  // $name = $_POST['name'];
  // $password = $_POST['password'];
  // $phone = $_POST['phone'];
  // $email = $_POST['email'];
  $role = $_POST['role'];

  $update = "UPDATE user SET role ='$role' WHERE id ='$id' ";
  $update_query = mysqli_query($connection, $update);

  if($update_query){?>

  <script>
   alert('editted successfully');
   location.href='edituser.php?userid=<?php echo $id;?>';
  </script>

 <?php }else{
  echo "error".$update_query.mysqli_error($connection);
 }
}
?>

<?php include('inc/footer.php'); ?>

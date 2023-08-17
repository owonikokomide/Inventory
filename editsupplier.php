<?php include('inc/header.php'); ?>


<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Supplier Management</h4>
<h6>Add/Update Customer</h6>
</div>
</div>
<form action="inc/validate.php" method="post">
<div class="card">
<div class="card-body">
<div class="row">
<?php
  include('inc/config.php');
  $id = $_GET['id'];
  $select = mysqli_query($connection, "SELECT * FROM supplier WHERE id ='$id'");
  while($row = mysqli_fetch_array($select)){?>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Supplier Name</label>
<input type="text" name="suppname" value="<?php echo $row['name'];?>">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" name="suppemail" value="<?php echo $row['email'];?>">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="supptel" value="<?php echo $row['phone'];?>">
</div>
</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Choose Country</label>
<select class="select">
<option>Choose Country</option>
<option>India</option>
<option>USA</option>
</select>
</div>
</div> -->
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>City</label>
<select class="select">
<option>Choose City</option>
<option>City 1</option>
<option>City 2</option>
</select>
</div>
</div> -->
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" name="suppaddr" value="<?php echo $row['address'];?>">
</div>
</div>
<?php } ?>
<!-- <div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control"></textarea>
</div>
</div> -->
<!-- <div class="col-lg-12">
<div class="form-group">
<label> Avatar</label>
<div class="image-upload">
<input type="file">
<div class="image-uploads">
<img src="assets/img/icons/upload.svg" alt="img">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div> -->
<div class="col-lg-12">
<button class="btn btn-submit me-2" name="editsupp">Update Supplier</button>
<!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>


<?php include('inc/footer.php'); ?>
</body>
</html>
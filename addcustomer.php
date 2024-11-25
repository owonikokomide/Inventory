<?php include('inc/config.php'); ?>

<?php include('inc/header.php'); ?>


<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header"> 
<div class="page-title">
<h4>Customer Management</h4> 
<h6>Add/Update Customer</h6>
</div>
</div>

<div class="card"> 
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
  <form method="POST">
<div class="form-group">
<label>Customer Name</label>
<input type="text" name="name">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" name="email">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>City</label>
<input type="text" name="city" placeholder="Enter City">
</div>
</div>
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" name="address">
</div>
</div>
<!-- <div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description"></textarea>
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
<button  name="submit" class="btn btn-submit me-2">Submit</a></button>
</form>
<!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php include('inc/footer.php'); ?>

</body>
</html>


<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $getExitCustomer = mysqli_query($connection,"SELECT * FROM customer WHERE email ='$email'");
  if(mysqli_num_rows($getExitCustomer)>0){?>
  <script>
        alert('customer already exits');
        window.location.href="addcustomer.php";
      </script>
  <?php }
  $insert = "INSERT INTO customer(name, email, phone, city, address)
  VALUES('$name','$email','$phone','$city','$address')";

  $insert_query = mysqli_query($connection,$insert);
  if($insert_query){?>
  <script>
    alert('customer added');
    window.location.href="customerlist.php";
  </script>
<?php }
}

?>

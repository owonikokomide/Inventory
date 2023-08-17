<?php include('inc/config.php'); ?>
<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<?php
$customerid = $_GET['cusid'];
$select = mysqli_query($connection,"select * from customer where id='$customerid' ");
$row = mysqli_fetch_array($select);

?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Edit Customer Management</h4>
<h6>Edit/Update Customer</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
  <form action="" method="POST">
<label>Customer Name</label>
<input type="text" value="<?php echo $row['name']; ?>" name="name">
<input type="hidden" value="">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" value="<?php echo $row['email']; ?>" name="email">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone" value="<?php echo $row['phone']; ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>City</label>
<input type="text" name="city" value="<?php echo $row['city']; ?>">
</div>
</div>
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" value="<?php echo $row['address']; ?>" name="address">
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" name="update">Update</button>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php include('inc/footer.php'); ?>

<?php

if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];

  $update = "UPDATE customer SET name='$name', email='$email', phone ='$phone', city='$city', address='$address' WHERE id='$customerid' ";
  $update_query = mysqli_query($connection, $update);

  if($update_query){?>

    <script>
     alert('Customer Updated');
    location.href='customerlist.php';
    </script>
  
   <?php }else{
    echo "error".$update_query.mysqli_error($connection);
   }
}

?>
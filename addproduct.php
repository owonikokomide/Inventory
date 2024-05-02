<?php include ('inc/config.php');?>
<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Add</h4>
<h6>Create new product</h6> 
</div>
</div>
<!-- <button onclick="
Swal.fire(
      'Good job!',
      'success'
    
    )
"

>check me</button> -->
<form action="" method="POST" onsubmit="return confirm('Are you sure you want to add products?')" enctype="multipart/form-data">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<input type="text" name="proname">
</div>
</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Unit</label>
 <select class="select">
<option>Choose Unit</option>
<option>Unit</option> 
</select>
</div>
</div> -->
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Minimum Qty</label>
<input type="text" name="minqty">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Quantity</label>
<input type="text" name="qty">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description"></textarea>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text" name="proprice">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label> Product Image</label>
<input type="file" name="proimages[]"  multiple>


</div>
</div>
<div class="col-lg-12">
<button type="submit" name="addproduct" class="btn btn-submit me-2">Submit</button>
<!-- <a href="productlist.php" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<?php


if(isset($_POST['addproduct']))  {
  $proname = $_POST['proname'];
  $minqty = $_POST['minqty'];
  $quantity = $_POST['qty'];
  $description = $_POST['description'];
  $proprice = $_POST['proprice'];
  // $unit = $_POST['unit'];
  $stockrem = '0';
  $date = date('Y-m-d');
  $postedby = 'admin';
  $proimages = $_FILES['proimages']['name'];
  $proimagestmp = $_FILES['proimages']['tmp_name'];
  $destination = "productimages/";
  $uniqid = "pro".rand(1111,9999);
  $uploadfiles = array();

  foreach($proimages as $index => $value){
    $path = $destination.basename($value);
        if(move_uploaded_file($proimagestmp[$index], $path)){
          $allimages[] = $value;
        }
  }
$columdata = implode(",", $allimages);

  $insert = "INSERT INTO products 
  (uniqid,proname, unit, minimunqty, instockqty,  price, proimages, descriiption, date, postedby) VALUES
  ('$uniqid','$proname', '0', '$minqty', '$quantity',  '$proprice', '$columdata', '$description', '$date', '$postedby')";

  $insert_query = mysqli_query($connection,$insert);
  if($insert_query){?>

  <script>
    alert('Product Added Successfully');
    location.href='productlist.php';
 </script>

 <?php }
}

?>


<?php include('inc/footer.php'); ?>
</body>
</html>

<?php include ('inc/config.php');?>
<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>


<?php

$ids = $_GET['ids'];

$select = mysqli_query($connection,"select * from products where proid='$ids' ");
$row = mysqli_fetch_array($select);


  ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Add</h4>
<h6>Create new product</h6>
</div>
</div>
<form action="" method="POST"  enctype="multipart/form-data">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<input type="text" value="<?php echo $row['proname'];?>" name="proname">
<input type="hidden" value="<?php echo $row['proid'];?>" name="id">
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
<input type="text" value="<?php echo $row['minimunqty'];?>" name="minqty">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Quantity</label>
<input type="text" value="<?php echo $row['instockqty'];?>" name="qty">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description"><?php echo $row['descriiption'];?></textarea>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text" value="<?php echo $row['price'];?>" name="proprice">
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label> Product Image</label>
<input type="file" name="proimages[]"  multiple>


</div>
</div>
<div class="col-lg-12">
<button type="submit" name="updatepro" class="btn btn-submit me-2">Submit</button>
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


if(isset($_POST['updatepro'])){
  $id = $_POST['id'];
  $proname = $_POST['proname'];
  $minqty = $_POST['minqty'];
  $quantity = $_POST['qty'];
  $description = $_POST['description'];
  $proprice = $_POST['proprice'];
  // $stockrem = '0';
  $proimages = $_FILES['proimages']['name'];
  $proimagestmp = $_FILES['proimages']['tmp_name'];
  $destination = "productimages/";
 
  $uploadfiles = array();

  foreach($proimages as $index => $value){
    $path = $destination.basename($value);
        if(move_uploaded_file($proimagestmp[$index], $path)){
          $allimages[] = $value;
        }
  }
$columdata = implode(",", $allimages);

  $update = "UPDATE products SET proname ='$proname', minimunqty ='$minqty', 
  instockqty ='$quantity', descriiption ='$description', price ='$proprice', proimages ='$columdata' WHERE proid ='$id' ";
  $update_query = mysqli_query($connection, $update);

  // $insert = "INSERT INTO products 
  // (proname, unit, minimunqty, instockqty, stockrem, price, proimages, descriiption, date, postedby) VALUES
  // ('$proname', '0', '$minqty', '$quantity', '$stockrem', '$proprice', '$columdata', '$description', '$date', '$postedby')";

  // $insert_query = mysqli_query($connection,$insert);
  if($update_query){?>

  <script>
   alert('Product Updated');
  location.href='productlist.php';
  </script>

 <?php }else{
  echo "error".$update_query.mysqli_error($connection);
 }
}
  
?>


<?php include('inc/footer.php'); ?>
</body>
</html>
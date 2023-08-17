<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Details</h4>
<h6>Full details of a product</h6>
</div>
</div>

<div class="row">
<div class="col-lg-8 col-sm-12">
<div class="card">
<div class="card-body">
<!-- <div class="bar-code-view">
<img src="assets/img/barcode1.png" alt="barcode">
<a class="printimg">
<img src="assets/img/icons/printer.svg" alt="print">
</a>
</div> -->

<div class="productdetails">
<ul class="product-bar">
<?php
  include('inc/config.php');
$productid = $_GET['productid'];
$select = mysqli_query($connection,"select * from products where proid='$productid'");
while($row = mysqli_fetch_array($select)){

  ?>
<li>
<h4>Product</h4>
<h6><?php echo $row['proname']; ?>	</h6>
</li>
<li>
<h4>Quantity</h4>
<h6><?php echo $row['instockqty']; ?></h6>
</li>
<li>
<h4>Minimum Qty</h4>
<h6><?php echo $row['minimunqty']; ?></h6>
</li>
<li>
<h4>Sold</h4>
<h6><?php echo $row['qsold']; ?></h6>
</li>
<li>
<h4>In stock</h4>
<h6><?php echo ($row['instockqty'] - $row['qsold']); ?></h6>
</li>
<li>
<h4>Price</h4>
<h6><?php echo number_format($row['price'],2); ?></h6>
</li>
<li>
<h4>Posted By</h4>
<h6><?php echo $row['postedby']; ?></h6>
</li>
<li>
<h4>Date</h4>
<h6><?php echo $row['date']; ?></h6>
</li>

<li>
<h4>Description</h4>
<h6><?php echo $row['descriiption']; ?></h6>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-12">
<div class="card">
<div class="card-body">
<div class="slider-product-details">
<div class="owl-carousel owl-theme product-slide">
  <?php
   include('inc/config.php');
   $productid = $_GET['productid'];
   $select = mysqli_query($connection,"select *  from products where proid='$productid'");
   while($col = mysqli_fetch_array($select)){
   $explode = explode(",",$col['proimages']);
   foreach($explode as $items){


   ?>
<div class="slider-product">
<img src="productimages/<?php echo $items;?> " alt="img">
<h4><?php echo $col['proname'];?></h4>
<h6><?php echo $col['price'];?></h6>
</div>
<?php } }?>
<!-- <div class="slider-product">
<img src="assets/img/product/product69.jpg" alt="img">
<h4>macbookpro.jpg</h4>
<h6>581kb</h6>
</div> -->
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php include('inc/footer.php'); ?>
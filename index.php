<?php  include('inc/header.php');  ?>
<?php  include('inc/sidebar.php');  ?>
<?php include('inc/config.php');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
  <?php 
  if(($_SESSION['role']=="admin")){
  $COLUMN = "grand_total";
  $getprice = mysqli_query($connection, "SELECT SUM($COLUMN) AS totalpurchase FROM purchases ");
  if($getprice){
    if(mysqli_num_rows($getprice) > 0){
  $row = mysqli_fetch_assoc($getprice);
   
  ?>
<h5>&#8358;<span class="counters" data-count="<?php echo $row['totalpurchase'];?>"><?php echo number_format($row['totalpurchase'],2);?></span></h5>
<?php   }
  }
}else{
  $getcreator = mysqli_query($connection,"SELECT * FROM user WHERE email='".$_SESSION['loginid']."'");
  $logid = mysqli_fetch_array($getcreator);
  $idd = $logid['uniqid'];
  $COLUMN = "grand_total";
  $getprice = mysqli_query($connection, "SELECT SUM($COLUMN) AS totalpurchase FROM purchases WHERE createdby='$idd' ");
  if($getprice){
    if(mysqli_num_rows($getprice) > 0){
  $row = mysqli_fetch_assoc($getprice);

  ?>
  <h5>&#8358;<span class="counters" data-count="<?php echo $row['totalpurchase'];?>"></span></h5>
  <?php  } ?>


  <?php 
  }
  }?>
<h6>Total Purchase</h6>
</div>
</div>
</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash1">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash2.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<?php 
  $price = "grand_total";
  $paid = "paid";
  $getprice = mysqli_query($connection, "SELECT SUM($price) AS totalpurchase FROM purchases ");
  $getpaid = mysqli_query($connection, "SELECT SUM($paid) AS totalpaid FROM purchases ");
  if($getprice){
    if(mysqli_num_rows($getprice) > 0){
  $rowprice = mysqli_fetch_assoc($getprice);
  $rowpaid = mysqli_fetch_assoc($getpaid);
   
  ?>
<h5>&#8358;<span class="counters" data-count="<?php echo ($rowprice['totalpurchase']-$rowpaid['totalpaid']);?>"><?php echo number_format(($rowprice['totalpurchase']-$rowpaid['totalpaid']),2);?></span></h5>
<?php   }
  }
  ?>
<h6>Total Purchase Due </h6>
</div>
</div>
</div> -->
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash2">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash3.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<?php 
  $totalsale = 0;
  // $paid = "paid";
  $gettotalsales = mysqli_query($connection, "SELECT * FROM sale group by reference ");
  
   while( $rowtotalsale = mysqli_fetch_assoc($gettotalsales)){
  $totalsale += $rowtotalsale['amountpaid'];
   }
   
  ?>
<h5>&#8358;<span class="counters" data-count="<?php echo ($totalsale);?>"></span></h5>

<h6>Total Sale Amount</h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<?php 
  $tdue = 0;
  $tsale = 0;
  // $paid = "paid";
  $gettotaldue = mysqli_query($connection, "SELECT * FROM sale group by reference ");
  
   while( $rowtotaldue= mysqli_fetch_assoc($gettotaldue)){
  $tsale += $rowtotaldue['total'];
  $tdue += $rowtotaldue['amountpaid'];
   }
  $totaldue = $tsale - $tdue;
   
   
  ?>
<h5>&#8358;<span class="counters" data-count="<?php echo ($totaldue);?>"></span></h5>

<h6>Total Sale Due</h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<?php 
  $price = "expamt";
  
  $getexp = mysqli_query($connection, "SELECT SUM($price) AS totalExp FROM expenses ");
  
  if($getexp){
    if(mysqli_num_rows($getexp) > 0){
      $rowexp = mysqli_fetch_assoc($getexp);
 
   
  ?>
 <h5>&#8358;<span class="counters" data-count="<?php echo $rowexp['totalExp'];?>"></span></h5>
<?php } } ?>
<h6>Total Expenses </h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
  <?php 
  // $qty = "instockqty";
$duety = mysqli_query($connection,"SELECT SUM(qbought) AS totalsoldqty FROM sale group by reference");
$prqty = mysqli_query($connection,"SELECT SUM(instockqty) AS totalqty FROM products");
// echo ""

$no = mysqli_num_rows($prqty);
if($no > 0){
$rowqty = mysqli_fetch_array($prqty);
$rowdue = mysqli_fetch_array($duety);


?>
<h5><span class="counters" data-count="<?php echo ($rowqty['totalqty'] - $rowdue['totalsoldqty']) ; ?>"></span>pc(s)</h5>
<?php } ?>
<h6>Total Product In stock</h6>
</div>
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="assets/img/icons/dash4.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<?php 
  // $qty = "instockqty";
$duety = mysqli_query($connection,"SELECT SUM(qbought) AS totalsoldqty FROM sale group by reference");
// echo ""

// $no = ;
if(mysqli_num_rows($duety) > 0){
$rowdue = mysqli_fetch_array($duety);

?>
<h5><span class="counters" data-count="<?php echo $rowdue['totalsoldqty'] ; ?>"></span>pc(s)</h5>
<?php } ?>
<h6>Total Product Sold</h6>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<?php $query1 = mysqli_query($connection, "SELECT * FROM customer"); 
$customer = mysqli_num_rows($query1);
?>
<h4><?php echo $customer; ?></h4>
<h5>Customers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<?php $query1 = mysqli_query($connection, "SELECT * FROM supplier"); 
$suppilers = mysqli_num_rows($query1);
?>
<h4><?php echo $suppilers; ?></h4>
<h5>Suppliers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<?php $query1 = mysqli_query($connection, "SELECT * FROM purchases"); 
$suppilers = mysqli_num_rows($query1);
?>
<h4><?php echo $suppilers; ?></h4>
<h5>Purchase Invoice</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<?php $query1 = mysqli_query($connection, "SELECT * FROM sale group by reference"); 
$sales = mysqli_num_rows($query1);
?>
<h4><?php echo $sales; ?></h4>
<h5>Sales Invoice</h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</div>
</div>

<!--<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h5 class="card-title mb-0">Purchase & Sales</h5>
<div class="graph-sets">
<ul>
<li>
<span>Sales</span>
</li>
<li>
<span>Purchase</span>
</li>
</ul> <div class="dropdown">
<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
 2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="javascript:void(0);" class="dropdown-item">2022</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2021</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2020</a>
</li>
</ul>
</div>
</div>
</div> 
<div class="card-body">
<div id="sales_charts"></div>
</div>
</div> 
</div>
<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Recently Added Products</h4>
<div class="dropdown">
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<i class="fa fa-ellipsis-v"></i>
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="productlist.php" class="dropdown-item">Product List</a>
</li>
<li>
<a href="addproduct.php" class="dropdown-item">Product Add</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>Sno</th>
<th>Products</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td class="productimgname">
<a href="productlist.php" class="product-img">
<img src="assets/img/product/product22.jpg" alt="product">
</a>
<a href="productlist.php">Apple Earpods</a>
</td>
<td>$891.2</td>
</tr>
<tr>
<td>2</td>
<td class="productimgname">
<a href="productlist.php" class="product-img">
<img src="assets/img/product/product23.jpg" alt="product">
</a>
<a href="productlist.php">iPhone 11</a>
</td>
<td>$668.51</td>
</tr>
<tr>
<td>3</td>
<td class="productimgname">
<a href="productlist.php" class="product-img">
<img src="assets/img/product/product24.jpg" alt="product">
</a>
<a href="productlist.php">samsung</a>
</td>
<td>$522.29</td>
</tr>
<tr>
<td>4</td>
<td class="productimgname">
<a href="productlist.php" class="product-img">
<img src="assets/img/product/product6.jpg" alt="product">
</a>
<a href="productlist.php">Macbook Pro</a>
</td>
<td>$291.01</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="card mb-0">
<div class="card-body">
<h4 class="card-title">Expired Products</h4>
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>SNo</th>
<th>Product Code</th>
<th>Product Name</th>
<th>Brand Name</th>
<th>Category Name</th>
<th>Expiry Date</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td><a href="javascript:void(0);">IT0001</a></td>
<td class="productimgname">
<a class="product-img" href="productlist.php">
<img src="assets/img/product/product2.jpg" alt="product">
</a>
<a href="productlist.php">Orange</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>12-12-2022</td>
</tr>
<tr>
<td>2</td>
<td><a href="javascript:void(0);">IT0002</a></td>
<td class="productimgname">
<a class="product-img" href="productlist.php">
<img src="assets/img/product/product3.jpg" alt="product">
</a>
<a href="productlist.php">Pineapple</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>25-11-2022</td>
</tr>
<tr>
<td>3</td>
<td><a href="javascript:void(0);">IT0003</a></td>
<td class="productimgname">
<a class="product-img" href="productlist.php">
<img src="assets/img/product/product4.jpg" alt="product">
</a>
<a href="productlist.php">Stawberry</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>19-11-2022</td>
</tr>
<tr>
<td>4</td>
<td><a href="javascript:void(0);">IT0004</a></td>
<td class="productimgname">
<a class="product-img" href="productlist.php">
<img src="assets/img/product/product5.jpg" alt="product">
</a>
<a href="productlist.php">Avocat</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>20-11-2022</td>
</tr>
</tbody>
</table>
</div>
</div>
</div-->
</div>
</div>
</div>

<?php include('inc/footer.php'); ?>

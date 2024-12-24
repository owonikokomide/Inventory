
<?php include('inc/header.php');?>
<?php include('inc/sidebar.php');?>
<style>
button:hover{
transform: scale(0.9);
background : #28c76f;
}
button#makesales:hover{
  background-color:#28c76f;
}
  </style>
<div class="page-wrapper">
<div class="content"> 
<div class="row">
<div class="col-lg-6 col-sm-12 tabs_wrapper">
<div class="page-header ">
<div class="page-title">
<h4>New Sales</h4>
<h6>Make a sale by clicking on procuct to sell</h6>
</div>
</div>
<!-- <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
<li class="active" id="fruits">
<div class="product-details ">
<img src="assets/img/product/product62.png" alt="img">
<h6>Fruits</h6>
</div>
</li>
<li id="headphone">
<div class="product-details ">
<img src="assets/img/product/product63.png" alt="img">
<h6>Headphones</h6>
</div>
</li>
<li id="Accessories">
<div class="product-details">
<img src="assets/img/product/product64.png" alt="img">
<h6>Accessories</h6>
</div>
</li>
<li id="Shoes">
<a class="product-details">
<img src="assets/img/product/product65.png" alt="img">
<h6>Shoes</h6>
</a>
</li>
<li id="computer">
<a class="product-details">
<img src="assets/img/product/product66.png" alt="img">
<h6>Computer</h6>
</a>
</li>
<li id="Snacks">
<a class="product-details">
<img src="assets/img/product/product67.png" alt="img">
<h6>Snacks</h6>
</a>
</li>
<li id="watch">
<a class="product-details">
<img src="assets/img/product/product68.png" alt="img">
<h6>Watches</h6>
</a>
</li>
<li id="cycle">
<a class="product-details">
<img src="assets/img/product/product61.png" alt="img">
<h6>Cycles</h6>
</a>
</li>
<li id="fruits1">
<div class="product-details ">
<img src="assets/img/product/product62.png" alt="img">
<h6>Fruits</h6>
</div>
</li>
<li id="headphone1">
<div class="product-details ">
<img src="assets/img/product/product63.png" alt="img">
<h6>Headphones</h6>
</div>
</li>
</ul> -->
<div class="tabs_container" style="height:auto; max-height:65vh; overflow:auto; padding:0 15px">
<div class="tab_content active" data-tab="fruits">
<div class="row">
  <?php
  $getAllProducts = mysqli_query($connection,"SELECT * FROM products");
  while($colproducts = mysqli_fetch_array($getAllProducts)){
  
  ?>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset  flex-fill" data-product-id="<?php echo $colproducts['proid']; ?>" style="border: 1px solid #28c76f;">
<div class="productsetimg">
<img src="productimages/<?php 
if($colproducts['proimages']==1){
  echo $colproducts['proimages'];
}else{
$images = explode(",", $colproducts['proimages']);
  echo $images[0];
}
?> " style="height:100px !important; width:100%; !important;"  alt="img">
<!-- <h6>Qty: <?php //echo ($colproducts['instockqty']- $colproducts['qsold'] );?></h6> -->
<!-- <div class="check-product">
<i class="fa fa-check"></i>
</div> -->
</div>
<div class="productsetcontent">
<h5></h5>
<h4><?php echo $colproducts['proname'];?></h4>
<h6>&#8358;<?php echo number_format($colproducts['price'],2);?></h6>
</div>
</div>
</div>
<?php } ?>
<!-- <div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="assets/img/product/product31.jpg" alt="img">
<h6>Qty: 1.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Fruits</h5>
<h4>Strawberry</h4>
<h6>15.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="assets/img/product/product35.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Fruits</h5>
<h4>Banana</h4>
<h6>150.00</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="assets/img/product/product37.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Fruits</h5>
<h4>Limon</h4>
<h6>1500.00</h6>
</div>
</div>
</div> -->
<!-- <div class="col-lg-3 col-sm-6 d-flex ">
<div class="productset flex-fill">
<div class="productsetimg">
<img src="assets/img/product/product54.jpg" alt="img">
<h6>Qty: 5.00</h6>
<div class="check-product">
<i class="fa fa-check"></i>
</div>
</div>
<div class="productsetcontent">
<h5>Fruits</h5>
<h4>Apple</h4>
<h6>1500.00</h6>
</div>
</div>
</div> -->
</div>
</div>

</div>
</div> 
<!-- <div class="col-lg-2"></div> -->
<div class="col-lg-6 col-sm-12" style="margin-top: -3%;">
<div class="order-list">
<!-- <div class="orderid">
<h4>Order List</h4>
<h5>Transaction id : #65565</h5>
</div> -->
<div class="actionproducts">
<!-- <ul>
<li>
<a href="javascript:void(0);" class="deletebg confirm-text"><img src="assets/img/icons/delete-2.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<img src="assets/img/icons/ellipise1.svg" alt="img">
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-popper-placement="bottom-end">
<li>
<a href="#" class="dropdown-item">Action</a>
</li>
<li>
<a href="#" class="dropdown-item">Another Action</a>
</li>
<li>
<a href="#" class="dropdown-item">Something Elses</a>
</li>
</ul> -->
</li>
</ul>
</div>
</div>
<div class="card card-order">
<div class="card-body">
<div class="row">
<div class="col-12">
<a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
</div>
<form method="POST" action="" id="dynamicform">
<div class="col-lg-12">
<div class="select-split ">
<div class="select-group w-100">
<select class="select" id="customerbuy" name="customerbuy">
<option>Walk-in Customer</option>
<?php 
$selcustomer = mysqli_query($connection, "SELECT * FROM customer");
while($row = mysqli_fetch_array($selcustomer)){
?>
<option value=<?php echo $row['email']; ?>><?php echo $row['name'];  ?></option>
<?php } ?>
</select>
</div>
</div>
</div>
<!-- <div class="col-lg-12">
<div class="select-split">
<div class="select-group w-100">
<select class="select">
<option>Product </option>
<option>Barcode</option>
</select>
</div>
</div>
</div> -->
<!-- <div class="col-12">
<div class="text-end">
<a class="btn btn-scanner-set"><img src="assets/img/icons/scanner1.svg" alt="img" class="me-2">Scan bardcode</a>
</div>
</div> -->
</div>
</div>

<!-- <div class="split-card">
</div> -->
<div class="card-body pt-0" style="margin-top:-3%;">
<div class="totalitem">
<h4></h4>
<a id="emptyButton" >Clear all</a>
</div>
<div class="product-table" id="productTable" style="height: auto; max-height:28vh;">

 <center> <h1 id="no-products" style="font-size:15px; color:red; font-family:sans-serif;"></h1></center>
<!-- <ul class="product-lists">
<li>
<div class="productimg">
<div class="productimgs">
<img src="assets/img/product/product30.jpg" alt="img">
</div>
<div class="productcontet">
<h4>Pineapple
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5>PT001</h5>
</div> 
<div class="increment-decrement">
<div class="input-groups">
<input type="button" value="-" class="button-minus dec button">
<input type="text" name="child" value="0" class="quantity-field">
<input type="button" value="+" class="button-plus inc button ">
</div>
</div>
</div>
</div>
</li>
<li>3000.00	</li>
<li><a class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img"></a></li>
</ul> -->
<!-- <ul class="product-lists">
<li>
<div class="productimg">
<div class="productimgs">
<img src="assets/img/product/product34.jpg" alt="img">
</div>
<div class="productcontet">
<h4>Green Nike
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5>PT001</h5>
</div>
<div class="increment-decrement">
<div class="input-groups">
<input type="button" value="-" class="button-minus dec button">
<input type="text" name="child" value="0" class="quantity-field">
<input type="button" value="+" class="button-plus inc button ">
</div>
</div>
</div>
</div>
</li>
<li>3000.00	</li>
<li><a class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img"></a></li>
</ul>
<ul class="product-lists">
<li>
<div class="productimg">
<div class="productimgs">
<img src="assets/img/product/product35.jpg" alt="img">
</div>
<div class="productcontet">
<h4>Banana
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5>PT001</h5>
</div>
<div class="increment-decrement">
<div class="input-groups">
<input type="button" value="-" class="button-minus dec button">
<input type="text" name="child" value="0" class="quantity-field">
<input type="button" value="+" class="button-plus inc button ">
</div>
</div>
</div>
</div>
</li>
<li>3000.00	</li>
<li><a class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img"></a></li>
</ul>
<ul class="product-lists">
<li>
<div class="productimg">
<div class="productimgs">
<img src="assets/img/product/product31.jpg" alt="img">
</div>
<div class="productcontet">
<h4>Strawberry
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5>PT001</h5>
</div>
<div class="increment-decrement">
<div class="input-groups">
<input type="button" value="-" class="button-minus dec button">
<input type="text" name="child" value="0" class="quantity-field">
<input type="button" value="+" class="button-plus inc button ">
</div>
</div>
</div>
</div>
</li>
<li>3000.00	</li>
<li><a class="confirm-text" href="javascript:void(0);"><img src="assets/img/icons/delete-2.svg" alt="img"></a></li>
</ul> -->
</div>
</div>
<div class="split-card">
</div>
<div class="card-body pt-0 pb-2">
<div class="setvalue">
<ul>
<!-- <li>
<h5>Subtotal </h5>
<h6>55.00$</h6>
</li> -->
<!-- <li>
<h5>Tax </h5>
<h6>5.00$</h6>
</li> -->
<li class="total-value">
<h5>Total </h5>
<h6 id="textamt">&#8358;0.00</h6>
<input type="hidden" id="totalamount" value="0" name="totalamount" style="border:none; background:#fff; " readonly/>
</li>
</ul>
</div>
<div class="setvaluecash" style="margin-top:-5%;">
  <label for="Amount Paid">Enter Amount Paid</label><br/>
  <div class="btnp" style="display:flex; flex-direction:row; gap:1em;">
 <input type="tel" name="amountpaid" id="amountpaid" onkeyup="getamtpaid()" placeholder="e.g 100000" style="border-radius: 5px;
    margin: 0 0 15px;
    font-size:15px;
    font-weight:600;
    width:100%;
    border:2px solid #28c76f;
    transition:0.5s;
    padding: 10px;
    color:#000000;
    text-align: left;
    border-radius: 5px;
    margin: 0 0 15px;">
   
  <button type="button" id="update" onclick="caltotal()"
  style="color: #000000;
    background: #fffff;
    border-radius: 5px;
    margin: 0 0 15px;
    font-size:15px;
    font-weight:600;
    width:100%;
    border:1px solid #28c76f;
    transition:0.5s;
    padding: 10px;" 
  > UPDATE CHECKOUT </button>
</div>
<div id="errpaid"></div>
<!-- <ul> -->

<!-- <a href="javascript:void(0);" class="paymentmethod">
<img src="assets/img/icons/cash.svg" alt="img" class="me-2">
UPDATE
</a>
</li> -->
<!-- <li>
<a href="javascript:void(0);" class="paymentmethod">
<img src="assets/img/icons/debitcard.svg" alt="img" class="me-2">
Debit
</a>
</li>
<li>
<a href="javascript:void(0);" class="paymentmethod">
<img src="assets/img/icons/scan.svg" alt="img" class="me-2">
Scan
</a>
</li> -->
<!-- </ul> -->
</div>

  <button  style="color: #000;
    background: #ffffff;
    border-radius: 5px;
    margin: 0 0 15px;
    font-size:15px;
    font-weight:600;
    width:100%;
    border:1px solid #28c76f;
    padding: 12px;transition:0.5s;" type="button" id="makesales"  >checkout (&#8358;0)</button>


</form>
<!-- <div class="btn-pos">
<ul>
<li>
<a class="btn"><img src="assets/img/icons/pause1.svg" alt="img" class="me-1">Hold</a>
</li>
<li>
<a class="btn"><img src="assets/img/icons/edit-6.svg" alt="img" class="me-1">Quotation</a>
</li>
<li>
<a class="btn"><img src="assets/img/icons/trash12.svg" alt="img" class="me-1">Void</a>
</li>
<li>
<a class="btn"><img src="assets/img/icons/wallet1.svg" alt="img" class="me-1">Payment</a>
</li>
<li>
<a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img src="assets/img/icons/transcation.svg" alt="img" class="me-1"> Transaction</a>
</li>
</ul>
</div> -->
</div>
</div>
</div>
<!-- <div class="col-lg-2"></div> -->
</div>
</div>
</div>
</div>
<div class="modal fade" id="calculator" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Define Quantity</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="calculator-set">
<div class="calculatortotal">
<h4>0</h4>
</div>
<ul>
<li>
<a href="javascript:void(0);">1</a>
</li>
<li>
<a href="javascript:void(0);">2</a>
</li>
<li>
<a href="javascript:void(0);">3</a>
</li>
<li>
<a href="javascript:void(0);">4</a>
</li>
<li>
<a href="javascript:void(0);">5</a>
</li>
<li>
<a href="javascript:void(0);">6</a>
</li>
<li>
<a href="javascript:void(0);">7</a>
</li>
<li>
<a href="javascript:void(0);">8</a>
</li>
<li>
<a href="javascript:void(0);">9</a> 
</li>
<li>
<a href="javascript:void(0);" class="btn btn-closes"><img src="assets/img/icons/close-circle.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);">0</a>
</li>
<li>
<a href="javascript:void(0);" class="btn btn-reverse"><img src="assets/img/icons/reverse.svg" alt="img"></a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="holdsales" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Hold order</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="hold-order">
<h2>4500.00</h2>
</div>
<div class="form-group">
<label>Order Reference</label>
<input type="text">
</div>
<div class="para-set">
<p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2">Submit</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Order</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Product Price</label>
<input type="text" value="20">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Product Price</label>
<select class="select">
<option>Exclusive</option>
<option>Inclusive</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label> Tax</label>
<div class="input-group">
<input type="text">
<a class="scanner-set input-group-text">
%
</a>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Discount Type</label>
<select class="select">
<option>Fixed</option>
<option>Percentage</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Discount</label>
<input type="text" value="20">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Sales Unit</label>
<select class="select">
<option>Kilogram</option>
<option>Grams</option>
</select>
</div>
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2">Submit</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Create</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
  <form method="POST">
<div class="form-group">
<label>Customer Name</label>
<input type="text"name="name" >
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" name="email">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone">
</div>
</div>
<!-- <div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>C</label>
<input type="text">
</div>
</div> -->
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>City</label>
<input type="text" name="city">
</div>
</div>
<div class="col-lg-12 col-sm-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text"name="address" >
</div>
</div>
</div>
<div class="col-lg-12">
<button type="submit" name="addcustomer" class="btn btn-submit me-2">Submit</button>
<!-- <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a> -->
</div>
</form>
</div>
</div>
</div>
</div>
<div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Order Deletion</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="delete-order">
<img src="assets/img/icons/close-circle1.svg" alt="img">
</div>
<div class="para-set text-center">
<p>The current order will be deleted as no payment has been <br> made so far.</p>
</div>
<div class="col-lg-12 text-center">
<a class="btn btn-danger me-2">Yes</a>
<a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="recents" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Recent Transactions</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<div class="tabs-sets">
<ul class="nav nav-tabs" id="myTabs" role="tablist">
<li class="nav-item" role="presentation">
<button class="nav-link active" id="purchase-tab" data-bs-toggle="tab" data-bs-target="#purchase" type="button" aria-controls="purchase" aria-selected="true" role="tab">Purchase</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button" aria-controls="payment" aria-selected="false" role="tab">Payment</button>
</li>
<li class="nav-item" role="presentation">
<button class="nav-link" id="return-tab" data-bs-toggle="tab" data-bs-target="#return" type="button" aria-controls="return" aria-selected="false" role="tab">Return</button>
</li>
</ul>
<div class="tab-content">
<div class="tab-pane fade show active" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
<div class="table-top">
<div class="search-set">
<div class="search-input">
<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">

</div>
</div>
<div class="table-responsive">

</div>
</div>
<div class="tab-pane fade" id="payment" role="tabpanel">
<div class="table-top">
<div class="search-set">
<div class="search-input">
<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">

</div>
</div>
<div class="table-responsive">

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/plugins/owlcarousel/owl.carousel.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>

<?php
if(isset($_POST['addcustomer'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];
$getExitCustomer = mysqli_query($connection,"SELECT * FROM customer WHERE email ='$email'");
if(mysqli_num_rows($getExitCustomer)>0){?>
<script>
      alert('customer already exits');
      window.location.href="pos.php";
    </script>
<?php }else{
  $insert = "INSERT INTO customer(name, email, phone, city, address)
  VALUES('$name','$email','$phone','$city','$address')";

  $insert_query = mysqli_query($connection,$insert);
  if($insert_query){?>
    <script>
      alert('customer added');
      window.location.href="pos.php";
    </script>
  <?php }
  }
}
  
  ?>

      <script>
           $(document).ready(function () {
            $("#emptyButton").click(function () {
                
              $('#productTable').empty();
              document.getElementById('totalamount').value = "0";
              document.getElementById('textamt').innerHTML = "&#8358;0.00";
              document.getElementById('makesales').innerHTML = "Checkout (&#8358;0.00)";

              //makesales
            });
            
            if(document.getElementById('amountpaid').value === null || document.getElementById('amountpaid').value === ""){
              document.getElementById('makesales').disabled= true;
            }
        });
        $(document).ready(function () {
          var clickedProducts = [];
              $('#productTable h1').append(
                'No product yet....'
              );

              document.getElementById('update').disabled = true;

           
            // Function to fetch product details and display in the table
            function getProductDetails(productId) {
           
                $.ajax({
                    url: 'get_product.php',
                    type: 'GET',
                    data: { product_id: productId },
                    dataType: 'json',
                    success: function (data) {
                      const phpArrayString = data.proimages;
                      const delimiter = ",";
                      const javascriptArray = phpArrayString.split(delimiter);

// console.log(javascriptArray[0]);

if (!data.error) {
  $('#productTable h1').empty();
  document.getElementById('update').disabled = false;
  // if (clickedProducts[productId]) {
    
  //                                   $('#productTable').find('[data-product-id="' + productId + '"]').remove();

  //                             }
  //                             else{
                            // Append the product details as a new row in the table
                            $('#productTable').append(

                                '<ul class="product-lists" data-product-id="'+ data.proid +'"><input type="hidden" value="'+ data.proname +'" name="proname[]"/><input type="hidden" value="'+ data.uniqid +'" name="uniqid[]"/><li><div class="productimg"><div class="productimgs">' +
                                '<img src="productimages/' + javascriptArray[0] + '" alt="img"></div>' +
                                '<div class="productcontet"><h4>' + data.proname + '<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="assets/img/icons/edit-5.svg" alt="img"></a></h4>' +
                                '<div class="increment-decrement"><div class="input-groups"><input type="text" style="border:2px solid #e9ecef; outline-color:#7367f0; width:100px;" name="qtyb[]" placeholder="qty" value="1" class="quantity-field"  data-price="'+ data.price +'" data-pro-id="'+ data.proid +'" >' + '</div></div></div></div></li>' +
                                '<li style="width:20%;"><label style="font-size: 14px; color: #000;font-weight: 600;margin-bottom: 10px;">Subtotal(&#8358;)</label><br/><input type="text" class="result'+ data.proid +'" name="subtotal[]"  value="'+data.price+'" readonly style="border:none; background:#ffffff;"/></li>' +
    
                                '<li><label style="font-size: 14px; color: #000;font-weight: 600;margin-bottom: 10px;">Qty due</label><br/><input type="text" name="qtydue[]" value="0" style="width:100px;border:2px solid #e9ecef; text-align:center; border-radius:5px;" ></li>'+
                                '<li><a class="cancel-button" ><img src="assets/img/icons/delete-2.svg" alt="img" style="width:20px; height:20px;"></a>' + '</li>' +
                                '</ul>'
                            );
                          // }
                          // clickedProducts[productId] = (clickedProducts[productId] || 0) + 1;
                          // console.log(clickedProducts[productId]);
                          
                        } else {
                            console.error(data.error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
           // Function to handle click events on products in the list
           
            $('.tabs_container .active .d-flex .flex-fill').click(function () {
                var productId = $(this).data('product-id');
                getProductDetails(productId);
                // console.log(productId);
            });


         



            $('#productTable').on('click', '.cancel-button', function () {
                // $(this).closest('ul').remove();
                var idme = $(this).closest('ul').data('product-id');
                // data-product-id
                var subtot = document.querySelector('.result'+idme).value;
                var mins = parseInt(document.getElementById('totalamount').value) - parseInt(subtot);
                // document.getElementById('textamt').value = () ;
                document.getElementById('totalamount').value = mins;
                document.getElementById('textamt').innerHTML = "&#8358;"+mins;
              document.getElementById('makesales').innerHTML = "Checkout (&#8358;"+mins+")";

                $(this).closest('ul').remove();
            });
           
            $('#productTable').on('keyup','.quantity-field',function(){
              
          var price = parseInt($(this).data('price')) || 0;

          var qty = (parseInt(this.value)) || 1;
          var proid = $(this).data('pro-id');
         
var total = qty * price;


document.querySelector('.result'+proid).value = total;
          // console.log(total);
    
            });
           
      
        });
  
        
        // $('#makesales').click(function(){
        //       $.ajax({
        //         url: "inc/validate.php",
        //         method: "post",
        //         data: $("#dynamicform").serialize(),
        //         success: function(data){
        //           alert(data);
        //           $("#dynamicform")[0].reset();
        //         }

        //       })
        //     })
     
    </script>
 <script>
      function getamtpaid(){
        const amtpaid = parseInt(document.getElementById('amountpaid').value);
        const totalamt = parseInt(document.getElementById('totalamount').value);
        const errpaid = document.getElementById('errpaid');
        // if(document.getElementById('amountpaid').value === null || document.getElementById('amountpaid').value === ""){
        //       document.getElementById('makesales').disabled= true;
        //     }else{
        // document.getElementById('makesales').disabled = false;
        //     }
        // console.log(amtpaid);
        if(amtpaid > totalamt ){
          errpaid.innerHTML ='Amount is overestimated';
          errpaid.style.color = "red";
          // /console.log('toomuch');
          document.getElementById('makesales').disabled = true;
        }else{
          errpaid.innerHTML ="";
          document.getElementById('makesales').disabled = false;

        }
      }
    </script>
    <script>
      function caltotal(){
        let total =0
      const subtotal = document.getElementsByName('subtotal[]');
      for (var i = 0; i < subtotal.length; i++ ){
         total += parseInt(subtotal[i].value);
        
      }
      if(total > 0){
     document.getElementById('textamt').innerHTML = '&#8358;'+total;
     document.getElementById('totalamount').value = total;
     document.getElementById('makesales').innerHTML ='Checkout ('+ total + ')';
      // console.log(total);
      }
    }
    </script>
    <script> $(document).ready(function () {
        $('#makesales').click(function(){
    var productData = [];

    $('.product-lists').each(function() {
        var productId = $(this).data('product-id');
        var productName = $(this).find('[name="proname[]"]').val();
        var uniqueid = $(this).find('[name="uniqid[]"]').val();
        var quantity = $(this).find('.quantity-field').val();
        var subtotal = $(this).find('.result' + productId).val();
        var qtyDue = $(this).find('[name="qtydue[]"]').val();
        var totalamout = document.getElementById('totalamount').value;
        var cusname = document.getElementById('customerbuy').value;
        var amountpaid = document.getElementById('amountpaid').value;
        productData.push({
            product_id: productId,
            product_name: productName,
            quantity: quantity,
            subtotal: subtotal,
            qty_due: qtyDue,
            total: totalamout,
            customer: cusname,
            amtpaid:  amountpaid,
            uniqid: uniqueid

        });
    });

    $.ajax({
        url: 'insert_data.php',
        type: 'POST',
        data: { products: productData },
        success: function (response) {
            // Handle success response
            //  alert(response);
         
              location.href='receipt.php?'+response;
           

            // Reset the form or do any other necessary actions
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});
    });
    </script>
   

    
  

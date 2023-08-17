<?php

session_start();
if($_SESSION['loginadmin'] !="true"){
  header('location: signin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos admin template</title>

<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="assets/css/animate.css">

<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

<div class="header">

<div class="header-left active">
<a href="index.html" class="logo">
<img src="assets/img/logo.png" alt="">
</a>
<a href="index.html" class="logo-small">
<img src="assets/img/logo-small.png" alt="">
</a>
<a id="toggle_btn" href="javascript:void(0);">
</a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Search Here ...">
<div class="search-addon">
<span><img src="assets/img/icons/closes.svg" alt="img"></span>
</div>
</div>
<a class="btn" id="searchdiv"><img src="assets/img/icons/search.svg" alt="img"></a>
</form>
</div>
</li>


<li class="nav-item dropdown has-arrow flag-nav">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
<img src="assets/img/flags/us1.png" alt="" height="20">
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/us.png" alt="" height="16"> English
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/fr.png" alt="" height="16"> French
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/es.png" alt="" height="16"> Spanish
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="assets/img/flags/de.png" alt="" height="16"> German
</a>
</div>
</li>


<li class="nav-item dropdown">
<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<img src="assets/img/icons/notification-bing.svg" alt="img"> <span class="badge rounded-pill">4</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="assets/img/profiles/avatar-02.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="assets/img/profiles/avatar-03.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="assets/img/profiles/avatar-06.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="assets/img/profiles/avatar-17.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="assets/img/profiles/avatar-13.jpg">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>

<?php

include('inc/config.php');
$loginemail = $_SESSION['loginid'];
$selloguser = mysqli_query($connection, "SELECT * FROM user WHERE email ='$loginemail'");
while($row = mysqli_fetch_array($selloguser)){
?>



<li class="nav-item dropdown has-arrow main-drop">
<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><?php if(!empty($row['img'])){?>
  <img src="img/<?php echo $row['img'];?>" alt="">
<?php }else{ ?>

<i class="fa fa-user-circle" style="color:grey; font-size:35px; border-radius:50%; "></i>

  <?php } ?>
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
<span class="user-img"><?php if(!empty($row['img'])){?>
  <img src="img/<?php echo $row['img'];?>" alt="">
<?php }else{ ?>

<i class="fa fa-user-circle" style="color:grey; font-size:35px; border-radius:50%; "></i>

  <?php } ?>
<span class="status online"></span></span>
<div class="profilesets">
<h6><?php echo $row['name'];?></h6>
<h5><?php echo $row['role'];?></h5>
</div>
</div>
<hr class="m-0">
<a class="dropdown-item" href="profile.php"> <i class="me-2" data-feather="user"></i> My Profile</a>
<a class="dropdown-item" href="generalsettings.php"><i class="me-2" data-feather="settings"></i>Settings</a>
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="signin.php"><img src="assets/img/icons/log-out.svg" class="me-2" alt="img">Logout</a>
</div>
</div>
</li>
<?php } ?>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="generalsettings.html">Settings</a>
<a class="dropdown-item" href="signin.html">Logout</a>
</div>
</div>

</div>


<?php include('inc/sidebar.php')?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Purchase Edit</h4>
<h6>Edit/Update Purchase</h6>
</div>
</div>
<form action="inc/validate.php" method="post" onsubmit="return confirm('are all infos correct?')" >
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Supplier Name</label>

<select class="select" name="suppname" required>
  <option disabled selected>choose supplier</option>
<?php 
include('inc/config.php');
$selected = mysqli_query($connection, "select * from supplier");
while($rowed = mysqli_fetch_array ($selected)){
  ?>

<option value="<?php echo $rowed['suppid'];?>"><?php echo $rowed['name'];?></option>
<?php } ?>
</select>

<!-- <div class="col-lg-2 col-sm-2 col-2 ps-0">
<div class="add-icon">
<a href="javascript:void(0);"><img src="assets/img/icons/plus1.svg" alt="img"></a>
</div>
</div> -->

</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Purchase Date </label>
<div class="input-groupicon">
<input type="text" name="pdate" placeholder="DD-MM-YYYY" class="datetimepicker" required>
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>materials supplied</label>

<input type="text" name="materials" id="" required>

</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Reference No.</label>
<input type="text" name="reference" required value="<?php echo uniqid().uniqid();?>" readonly>
</div>
</div>
<!-- <div class="col-lg-12 col-sm-6 col-12">
<div class="form-group">
<label>Product</label>
<div class="input-groupicon">
<input type="text" placeholder="Scan/Search Product by code and select...">
<div class="addonset">
<img src="assets/img/icons/scanners.svg" alt="img">
</div>
</div> -->
</div>
</div>
</div>
<!-- <div class="row">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Product Name</th>
<th>QTY</th>
<th>Purchase Price($)	</th>
<th>Discount($)	</th>
<th>Tax %</th>
<th>Tax Amount($)</th>
<th class="text-end">Unit Cost($)</th>
<th class="text-end">Total Cost ($)	</th>
<th></th>
</tr>
</thead>
<tbody>
<tr>
<td class="productimgname">
<a class="product-img">
<img src="assets/img/product/product7.jpg" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td>10.00</td>
<td>2000.00</td>
<td>500.00</td>
<td>0.00</td>
<td>0.00</td>
<td class="text-end">2000.00</td>
<td class="text-end">2000.00</td>
<td>
<a class="delete-set"><img src="assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>
<tr>
<td class="productimgname">
<a class="product-img">
<img src="assets/img/product/product6.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook Pro</a>
</td>
<td>15.00</td>
<td>6000.00</td>
<td>100.00</td>
<td>0.00</td>
<td>0.00</td>
<td class="text-end">1000.00</td>
<td class="text-end">1000.00</td>
<td>
<a class="delete-set"><img src="assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>
</tbody>
</table>
</div>
</div> -->
<!-- <div class="row">
<div class="col-lg-12 float-md-right">
<div class="total-order">
<ul>
<li>
<h4>Order Tax</h4>
<h5>$ 0.00 (0.00%)</h5>
</li>
<li>
<h4>Discount</h4>
<h5>$ 0.00</h5>
</li>
<li>
<h4>Shipping</h4>
<h5>$ 0.00</h5>
</li>
<li class="total">
<h4>Grand Total</h4>
<h5>$ 2000.00</h5>
</li>
</ul>
</div>
</div>
</div> -->
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Price</label>
<input type="text"  name="price" id="price" onkeyup="addgrand()" required>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Shipping fee</label>
<input type="text" name="shipfee"  id="shipfee" onkeyup="addgrand()" value="0">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Grand Total</label>
<input type="text" name="grandtotal"  id="gtotal" readonly required>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Amount Paid</label>
<input type="text" name="paid" onkeyup="checkexcess()" id="amtpaid"  required>
<p id="erroramt" style="color:red;"></p>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Status</label>
<select class="select" name="dstatus" required>
<option value="received">Received</option>
<option value="pending">Not Received</option>
</select>
</div>
</div>
<div class="col-lg-9">
<div class="form-group">
<label>Description</label>
<textarea name="description" class="form-control" required></textarea>
</div>
</div>
<input type="hidden" name="createdby" value="<?php 
include('inc/config.php');
$result = mysqli_fetch_array (mysqli_query($connection, "select * from user where email ='".$_SESSION['loginid']."'"));

echo $result['uniqid'];



?>">
<div class="col-lg-12">
<button class="btn btn-submit me-2" id="submitadd" name="addpurchase">Submit</button>
<a href="purchaselist.html" class="btn btn-cancel">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
  function addgrand(){
    const price = parseInt(document.getElementById('price').value);
    const ship = parseInt(document.getElementById('shipfee').value);
    const grand = document.getElementById('gtotal');
if(ship > 0 ){
grand.value = price + ship;


}else{
  grand.value = price + 0;
  ship = 0


}
  }
  function checkexcess(){
    const grand = parseInt(document.getElementById('gtotal').value);
    const amtpaid = parseInt(document.getElementById('amtpaid').value);
    if(amtpaid > grand){
document.getElementById('submitadd').disabled = true;
document.getElementById('erroramt').innerHTML ="Sorry... amount paid is greater than total";
    }else{
document.getElementById('submitadd').disabled = false;
document.getElementById('erroramt').innerHTML = "";

    }
  }
</script>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>
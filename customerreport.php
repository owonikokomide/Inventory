<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Customer Report</h4>
<h6>Manage your Customer Report</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<!-- <a class="btn btn-filter" id="filter_search">
<img src="assets/img/icons/filter.svg" alt="img">
<span><img src="assets/img/icons/closes.svg" alt="img"></span>
</a> -->
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<div class="input-groupicon">
<input type="text" placeholder="From Date" class="datetimepicker">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<div class="input-groupicon">
<input type="text" placeholder="To Date" class="datetimepicker">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12 ms-auto">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew">
<thead>
<tr>
<!-- <th>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</th> -->
<th>Customer Name</th>
<th>Customer Email </th>
<th>Total qty bought</th>
<th>Total Qty due</th>
<th>Total amount paid</th>
<th>Total amount due</th>
<th>Grand Total</th>
<th>Payment Status</th>
<th>Sales Status</th>
<th>View</th>
</tr>
</thead>
<tbody>
  <?php $getallcus = mysqli_query($connection,"SELECT * FROM customer");
  
  while($customer = mysqli_fetch_array($getallcus)){
    $totalqty = 0;
  $totalqtydue =0;
  $totalamount = 0;
  $totalmaountdue = 0;
  $grandtotal =0;
    $email = $customer['email'];
    $getsales = mysqli_query($connection,"SELECT * FROM sale WHERE customer ='$email' group by reference");
    $getqty = mysqli_query($connection,"SELECT * FROM sale WHERE customer ='$email' ");
   $nos = mysqli_num_rows($getqty);
    while($row = mysqli_fetch_array($getsales)){
      $totalamount = $row['amountpaid'];
      $totalmaountdue = ($row['total'] - $row['amountpaid']);
      $grandtotal = $row['total'];
    }
    while($qty = mysqli_fetch_array($getqty)){
      $totalqty += $qty['qbought'];
      $totalqtydue += $qty['qtydue'];
    }
    
    ?>
<tr>
<!-- <td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td> -->
<td><?php echo $customer['name'];?></td>
<td><?php echo $customer['email'];?></td>
<td><?php echo $totalqty; ?></td>
<td><?php echo $totalqtydue; ?></td>
<td><?php echo number_format($totalamount,2); ?></td>
<td><?php echo number_format($totalmaountdue,2); ?></td>
<td><?php echo number_format($grandtotal,2); ?></td>
<td><?php if($nos > 0){if($grandtotal > $totalamount){?>
  <span class="badges bg-lightred">Due</span>
<?php }else{ ?>

  <span class="badges bg-lightgreen">completed</span>

  <?php }}else { echo "null";} ?></td>
<td><?php if($nos > 0){if($totalqtydue > 0){?>
  <span class="badges bg-lightred">pending</span>
<?php }else{ ?>

  <span class="badges bg-lightgreen">completed</span>

  <?php }}else { echo "null";} ?>
 </td>
<td><a class="me-3" href="customerreport-details.php?customer=<?php echo $email;?>">
<img src="assets/img/icons/eye.svg" alt="img">
</a></td>
</tr>
<?php } ?>
<tr>
<?php
$customcust = "Walk-in-Customer";
$cusqty = 0;
$cusqtydue = 0;
$custotal = 0;
$custotaldue = 0;
$cusgrand = 0;



$getcustom = mysqli_query($connection,"SELECT * FROM sale WHERE customer ='$customcust' group by reference");
$getcustomqty = mysqli_query($connection,"SELECT * FROM sale WHERE customer ='$customcust'");
while($col = mysqli_fetch_array($getcustomqty)){
  $cusqty += $col['qbought'];
  $cusqtydue += $col['qtydue'];
}
$count = mysqli_num_rows($getcustom);
while($rowcustom = mysqli_fetch_array($getcustom)){

 
  $custotal += $rowcustom['amountpaid'];
  $custotaldue += ($rowcustom['total'] - $rowcustom['amountpaid']) ;
  $cusgrand += $rowcustom['total'];

}
?>
<td> Walk in customers </td>
<td> null </td>
<td><?php echo $cusqty ?></td>
<td><?php echo $cusqtydue ?></td>
<td><?php echo $custotal ?></td>
<td><?php echo $custotaldue ?></td>
<td><?php echo $cusgrand ?></td>
<td><?php if($count > 0){if($cusgrand > $custotal){?>
  <span class="badges bg-lightred">Due</span>
<?php }else{ ?>

  <span class="badges bg-lightgreen">completed</span>

  <?php }}else { echo "null";} ?></td>

  <td><?php if($count > 0){if($cusqtydue > 0){?>
  <span class="badges bg-lightred">pending</span>
<?php }else{ ?>

  <span class="badges bg-lightgreen">completed</span>

  <?php }}else { echo "null";} ?>
 </td>
 <td><a class="me-3" href="customerreport-details.php?customer=<?php echo $customcust;?>">
<img src="assets/img/icons/eye.svg" alt="img">
</a></td>

</tr>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>

<div class="searchpart">
<div class="searchcontent">
<div class="searchhead">
<h3>Search </h3>
<a id="closesearch"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
</div>
<div class="searchcontents">
<div class="searchparts">
<input type="text" placeholder="search here">
<a class="btn btn-searchs">Search</a>
</div>
<div class="recentsearch">
<h2>Recent Search</h2>
<ul>
<li>
<h6><i class="fa fa-search me-2"></i> Settings</h6>
</li>
<li>
<h6><i class="fa fa-search me-2"></i> Report</h6>
</li>
<li>
<h6><i class="fa fa-search me-2"></i> Invoice</h6>
</li>
<li>
<h6><i class="fa fa-search me-2"></i> Sales</h6>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>

<!-- <?php include('inc/footer.php'); ?> -->

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
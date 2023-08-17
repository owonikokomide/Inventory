<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<?php


if(isset($_GET['delid'])){
$delid = $_GET['delid'];

// DELETE FROM `sales` WHERE 0

$delete = mysqli_query($connection,"DELETE FROM sale WHERE reference ='$delid' ");

if($delete){

echo "<script>
    alert('sales Deleted Successfully');
    location.href='saleslist.php';
 </script>";

}
else{
  echo "<script>
    alert('sales Not Deleted ');
    location.href='saleslist.php';
 </script>";
}
}
?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Sales Report</h4>
<h6>Details of Sales Report for <?php echo $_GET['monthof']." ".$_GET['year'] ;?>  </h6>
</div>
<div class="page-btn">
<!-- <a href="pos.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add Sales</a> -->
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
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Name">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference No">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Completed</option>
<option>Paid</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table  datanew">
<h1 style="text-align:center;text-transform:uppercase;">SALES REPORT SUMMARY FOR <?php echo $_GET['monthof'];?>  <span id="currentyear"><?php echo $_GET['year'];?></span> </h1>
<!-- <h1 style="text-align:center;text-transform:uppercase;">SALES REPORT SUMMARY FOR <?php echo $_GET['monthof'];?>  <span id="currentyear"><?php echo $_GET['year'];?></span> </h1> -->

<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Customer Name</th>
<th>Date</th>
<th>Reference</th>
<th>Status</th>
<th>Payment</th>
<th>Total</th>
<th>Paid</th>
<th>Due</th>
<th>Biller</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
  <?php 
$year = $_GET['year'];
$month = $_GET['month'];
$startdate = $year."-".$month."-01";
$enddate = $year."-".$month."-31";
    $getallsales = mysqli_query($connection,"SELECT * FROM sale WHERE date between '$startdate' and '$enddate' group by reference order by date desc");
   
    while($row = mysqli_fetch_array($getallsales)){
      $qtyd = 0;
      $getdty = mysqli_query($connection,"select * from sale where reference='".$row['reference']."' ");
      while($col = mysqli_fetch_array($getdty)){
      $qtyd += $col['qtydue'];
      
      }
      $qtyds = $qtyd;
      // echo $qtyds;

?>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td><?php  if($row['customer'] != "Walk-in-Customer"){
  $getcusname = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM customer WHERE email = '".$row['customer']."'"));
  echo $getcusname['name'];
}else{
  echo $row['customer'];
};  ?></td>
<td><?php  echo $row['date'];  ?></td>
<td><?php  echo $row['reference'];  ?></td>
<!-- <td><span class="badges bg-lightgreen">Completed</span></td> -->
<?php if( $qtyds > 0){?>
  <td><span class="badges bg-lightred">Pending (<?php echo $qtyds;?>) </span></td>


<?php } else{ ?>
  <td><span class="badges bg-lightgreen">Completed</span></td>


  <?php } ?>
<?php if( $row['amountpaid'] >= $row['total']){?>
  <td><span class="badges bg-lightgreen">Paid</span></td>


<?php } else{ ?>
  <td><span class="badges bg-lightred">Due</span></td>


  <?php } ?>
<td>&#8358;<?php   echo number_format( $row['total'],2);  ?></td>
<td>&#8358;<?php  echo number_format($row['amountpaid'],2);  ?></td>
<?php if(($row['total'] - $row['amountpaid'])== 0){?>
  <td>&#8358;<?php  echo number_format(($row['total'] - $row['amountpaid']),2);  ?></td>
 <?php }else{ ?>
<td class="text-red">&#8358;<?php  echo number_format(($row['total'] - $row['amountpaid']),2);  ?></td>
<?php } ?>
<td><?php  
 $getseller = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM user WHERE email = '".$row['soldby']."'"));
 echo $getseller['name'];
// echo $row['soldby'];  ?></td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="sales-details.php?ref=<?php echo $row['reference']; ?>" class="dropdown-item"><img src="assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="edit-sales.php?saleid=<?php echo $row['reference']; ?>" class="dropdown-item" ><img src="assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="assets/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
</li>
<li>
</li>
<li>
<a href="saleslist.php?delid=<?php echo $row['reference']; ?>" onclick="return confirm('do you want to delete sales?')"><img src="assets/img/icons/delete1.svg" class="me-2" alt="img">Delete Sale</a>
</li>
</ul>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Create Payment</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer</label>
<div class="input-groupicon">
<input type="text" value="2022-03-07" class="datetimepicker">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Reference</label>
<input type="text" value="INV/SL0101">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Received Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Paying Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Payment type</label>
<select class="select">
<option>Cash</option>
<option>Online</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group mb-0">
<label>Note</label>
<textarea class="form-control"></textarea>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-submit">Submit</button>
<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Payment</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer</label>
<div class="input-groupicon">
<input type="text" value="2022-03-07" class="datetimepicker">
<div class="addonset">
<img src="assets/img/icons/datepicker.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Reference</label>
<input type="text" value="INV/SL0101">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Received Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Paying Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Payment type</label>
<select class="select">
<option>Cash</option>
<option>Online</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group mb-0">
<label>Note</label>
<textarea class="form-control"></textarea>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-submit">Submit</button>
<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
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

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html> 
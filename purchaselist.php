<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>PURCHASE LIST</h4>
<h6>Manage your purchases</h6>
</div>
<div class="page-btn">
<a href="addpurchase.php" class="btn btn-added">
<img src="assets/img/icons/plus.svg" alt="img">Add New Purchases
</a>
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
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference">
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Supplier</option>
<option>Supplier</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Status</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Payment Status</option>
<option>Payment Status</option>
</select>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12">
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
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th> -->
<th>Supplier Name</th>
<th>Reference</th>
<th>Date</th>
<th>Status</th>
<th>Grand Total</th>
<th>Paid</th>
<th>Due</th>
<th>Payment Status</th>
<th>Created By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
  include('inc/config.php');
  $select = mysqli_query($connection, "SELECT * FROM purchases");
  while($row = mysqli_fetch_array($select)){?>
<tr>
<!-- <td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td> -->
<td class="text-bolds">
<?php 
  include('inc/config.php');
  $cols = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM supplier where suppid ='". $row['suppid']."'"));
  echo $cols['name'];
  
  
  
  ;?>  
</td>
<td><?php echo $row['reference'];  ?></td>
<td><?php echo $row['date'];  ?></td>
<td>
<?php if($row['dstatus']=="pending"){?>
  <span class="badges bg-lightred"><?php echo $row['dstatus'];?></span>

<?php }else{ ?>
  <span class="badges bg-lightgreen"><?php echo $row['dstatus'];?></span>

  <?php } ?>  


</td>
<td><?php echo number_format($row['grand_total'],2);  ?></td>
<td><?php echo  number_format($row['paid'],2);  ?></td>
<td><?php echo number_format(($row['grand_total'] -$row['paid']),2) ;  ?></td>
<td>
  <?php if(($row['grand_total'] - $row['paid']) >=0){?>
  <span class="badges bg-lightgreen">Paid</span>

<?php }else{ ?>
  <span class="badges bg-lightred">Pending</span>

  <?php } ?>
</td>
<td>
  <?php 
  include('inc/config.php');
  $col = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM user where uniqid ='". $row['createdby']."'"));
  echo $col['name'];
  
  
  
  ;?>
</td>
<td>
<a class="me-3" href="editpurchase.php?id=<?php echo $row['id'];?>">
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="assets/img/icons/delete.svg" alt="img">
</a>
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

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>
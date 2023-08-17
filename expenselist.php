<?php include('inc/config.php'); ?>
<?php include('inc/header.php'); ?>
<?php include ('inc/sidebar.php');?>

<?php


if(isset($_GET['delid'])){
$delid = $_GET['delid'];

// DELETE FROM `products` WHERE 0

$delete = mysqli_query($connection,"DELETE FROM expenses WHERE id='$delid' ");

if($delete){

echo "<script>
    alert('Expense Deleted Successfully');
    location.href='expenselist.php';
 </script>";

}
else{
  echo "<script>
    alert('Expense Not Deleted ');
    location.href='expenselist.php';
 </script>";
}
}
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Expenses LIST </h4>
<h6>Manage your purchases</h6>
</div>
<div class="page-btn">
<a href="createexpense.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" class="me-2" alt="img">Add New Expense</a>
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
<a class="btn btn-searchset">
<img src="assets/img/icons/search-white.svg" alt="img">
</a>
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
<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Category</option>
<option>Computers</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Status</option>
<option>Complete</option>
<option>Inprogress</option>
</select>
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
 <table class="table  datanew">
<thead>
<tr>
<!-- <th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th> -->
<th>Category name</th>
<th>Reference</th>
<th>Date</th>
<th>Amount</th>
<th>Description</th>
<th>Date Created</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <?php include('inc/config.php');
  $getexp = mysqli_query($connection, "SELECT * FROM expenses");
  while($row = mysqli_fetch_array($getexp)){?>
  
<tr>
<!-- <td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td> -->
<td><?php echo $row['expcat']; ?></td>
<td><?php  echo $row['reference'];  ?></td>
<td><?php echo $row['expdate']; ?></td>
<!-- <td><span class="badges bg-lightgreen">Active</span></td> -->
<td><?php echo number_format($row['expamt'],2); ?></td>
<td><?php echo $row['description'];
if(($row['suppid'] == " ")||($row['suppid'] == "")){echo "";}else{
 $cols = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM supplier where suppid ='". $row['suppid']."'"));
 echo $cols['name'];
}
?></td>
<td><?php echo $row['date']; ?></td>
<td>
<a class="me-3" href="editexpense.php?expid=<?php echo $row['id'];?>">
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3" href="?delid=<?php echo $row['id'];?>" onclick="return confirm('do you want to delete expense?')">
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
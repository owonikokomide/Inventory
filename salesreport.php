<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Sales Report</h4>
<h6>Manage your Sales Report</h6>
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
<div class="form-group" style="margin-left:1em;">
<div class="search-year">
  <label for="">Choose year</label> 
  <select name="year" class="select" id="selectyear" onchange="selectyears()">
  <?php if(isset($_GET['year'])){?>
    <option value="<?php echo $_GET['year'];?>" selected disabled><?php echo $_GET['year'];?></option>
    <?php }else{ ?>
      <option value="<?php echo date('Y'); ?>" selected><?php echo date('Y'); ?></option>
      <?php } ?>
      <?php $getallyears = mysqli_query($connection,"SELECT year FROM settings");
    $row = mysqli_fetch_array($getallyears);
    $yearstart = $row['year'];
    $currentyear = date('Y');
    $diff = ($currentyear - $yearstart) - 1;
    
    ?>
<option value="<?php echo $yearstart;?>" ><?php echo $yearstart;?></option>

<?php for($y = 0; $y < $diff; $y++){?>

  <option value="<?php echo $yearstart+$y+1;?>" ><?php echo $yearstart+$y+1;?></option>


 <?php } ?>
   
  <option value="<?php echo date('Y'); ?>" ><?php echo date('Y'); ?></option>

    

   
  </select>
</div>
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
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th> -->
<th>MONTHS</th>
<th>Total Sales Amount(&#8358;)</th>
<th>Total Sales due (&#8358;)</th>
<th>Total Qty Sold</th>
<th>Total Qty Due</th>
<th>View Details</th>

</tr>
</thead>
<tbody>
<?php
 $arraymonths = array("january","February","March","April","May","June","July","August","September","October","November","December");
//  ksort($arraymonths);
// echo $sort;
 for($i =0; $i < count ($arraymonths); $i++){
  
if($i < 10){
$mth = "0".$i+1;
}else{
  $mth = $i+1;
}
if(!isset($_GET['year'])){
  $year = date('Y');
}else{
  $year = $_GET['year'];

}
$startdate = $year."-".$mth."-01";
$enddate = $year."-".$mth."-31";
// echo $startdate."".$enddate;
$totalsale =0;
$totalsaledue =0;
$totalqty = 0;
$totalqtydue = 0;
$gettotalsale = mysqli_query($connection,"SELECT * FROM sale WHERE date between '$startdate' and '$enddate' group by reference ");
$getqtys = mysqli_query($connection,"SELECT * FROM sale WHERE date between '$startdate' and '$enddate' ");
while($qtyrow = mysqli_fetch_array($getqtys)){
  $totalqty += $qtyrow['qbought'];
  $totalqtydue += $qtyrow['qtydue'];
}
while($row = mysqli_fetch_array($gettotalsale)){
  $totalsale += $row['amountpaid'];
  $totalsaledue += ($row['total'] - $row['amountpaid']);
  
}
  // ksort($arraymonths);
?>
<tr>
<!-- <td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td> -->
<!-- <td class="productimgname">
<a class="product-img">
<img src="assets/img/product/product1.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook pro</a>
</td> -->
<td><?php echo ($arraymonths[$i]); ?></td>
<td><?php echo number_format($totalsale,2);?></td>
<td><?php echo number_format($totalsaledue,2);?></td>
<td><?php echo $totalqty;?></td>
<td><?php echo $totalqtydue;?></td>
<td><a class="me-3" href="salesreportdetail.php?monthof=<?php echo $arraymonths[$i];?>&month=<?php echo $mth;?>&year=<?php echo $year;?>">
<img src="assets/img/icons/eye.svg" alt="img">
</a></td>
</tr>
<?php  } ?>
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

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
<script>
  function selectyears(){
  const years = document.getElementById('selectyear');
  
      location.href='salesreport.php?year='+years.value;
  
  }
</script>
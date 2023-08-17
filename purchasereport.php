<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Purchase Report</h4>
<h6>Manage your Purchase Report</h6>
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
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel" onclick="saveAsExcel('printable-content')"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print" onclick="printDiv('printable-content')"><img src="assets/img/icons/printer.svg" alt="img"></a>
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

<div class="table-responsive" id="printable-content">
<table class="table datanew">
  <h1 style="text-align:center;">PURCHASE REPORT SUMMARY FOR THE YEAR <span id="currentyear"><?php if(isset($_GET['year'])){echo $_GET['year'];}else{echo date('Y');}?></span> </h1>
<thead>
<tr>
<!-- <th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th> -->
<th>MONTHS</th>
<th>Total Purchase Amount(&#8358;)</th>
<th>Total Purchase due (&#8358;)</th>
<th>No(s) of items purchase</th>
<th>View Details</th>

</tr>
</thead>
<tbody>
<?php
 $arraymonths = array("January","February","March","April","May","June","July","August","September","October","November","December");
//  ksort($arraymonths);
// echo $sort;
 for($i =0; $i < count ($arraymonths); $i++){
  if(!isset($_GET['year'])){
    $year = date('Y');
  }else{
    $year = $_GET['year'];
  
  }
  
if($i < 9){
$mth = "0".$i+1;

}else{
  $mth = $i+1;
}
// echo $mth;
$startdate = $year."-".$mth."-01";
$enddate = $year."-".$mth."-31";

// echo $startdate."".$enddate;
$totalpurchase =0;
$totalpurchasedue =0;

$getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate' ");
$no_of_items = mysqli_num_rows($getpurchase);

while($row = mysqli_fetch_array($getpurchase)){
  $totalpurchase += $row['paid'];
  $totalpurchasedue += ($row['grand_total'] - $row['paid']);
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
  
<td><?php echo number_format($totalpurchase,2);?></td>
<td><?php echo number_format($totalpurchasedue,2);?></td>
<td><?php echo $no_of_items;?></td>
<td><a class="me-3" href="purchasereport-details.php?monthof=<?php echo $arraymonths[$i];?>&month=<?php echo $mth;?>&year=<?php echo $year;?>">
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
<script src="actions.js"></script>

<script>
  function selectyears(){
  const years = document.getElementById('selectyear');
  
      location.href='purchasereport.php?year='+years.value;
  
  }
</script>
<script>
  function saveAsExcel(divId) {
  var today = new Date();
  var yearof = document.getElementById('currentyear').innerHTML;

// Format the date as YYYY-MM-DD
// var formattedDate = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');

    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.table_to_sheet(document.getElementById(divId));
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    // Generate a Blob object containing the Excel file
    var blob = new Blob([s2ab(XLSX.write(wb, { bookType: 'xlsx', type: 'binary' }))], {
        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    });

    // Create a link element to trigger the download
    var a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = 'PURCHASE_REPORT_SUMMARY_FOR_THE_YEAR'+yearof+'.xlsx';
    a.style.display = 'none';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

// Convert string to ArrayBuffer
function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i < s.length; i++) {
        view[i] = s.charCodeAt(i) & 0xFF;
    }
    return buf;
}
</script>
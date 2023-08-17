<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>
<?php include ('inc/config.php');?>

<?php


if(isset($_GET['delid'])){
$delid = $_GET['delid'];

// DELETE FROM `products` WHERE 0

$delete = mysqli_query($connection,"DELETE FROM products WHERE proid='$delid' ");

if($delete){

echo "<script>
    alert('Product Deleted Successfully');
    location.href='productlist.php';
 </script>";

}
else{
  echo "<script>
    alert('Product Not Deleted ');
    location.href='productlist.php';
 </script>";
}
}
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product List</h4>
<h6>Manage your products</h6>
</div>
<div class="page-btn">
<a href="addproduct.php" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
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
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel" onclick="saveAsExcel('printable-content')"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print" onclick="printDiv('printable-content')"><img src="assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card mb-0" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="row">
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Product</option>
<option>Macbook pro</option>
<option>Orange</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Category</option>
<option>Computers</option>
<option>Fruits</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Sub Category</option>
<option>Computer</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Brand</option>
<option>N/D</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12 ">
<div class="form-group">
<select class="select">
<option>Price</option>
<option>150.00</option>
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
</div>
</div>

<div class="table-responsive" id="printable-content">
<table class="table  datanew">
<thead>
<tr>
<th>Product Name</th>
<th>Price</th>
<th>Quantity </th>
<th>In stock</th>
<th>Qty Sold</th>
<th>Created By</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <?php
  include('inc/config.php');

$select = mysqli_query($connection,"select * from products");
while($row = mysqli_fetch_array($select)){
  $totalqtysold =0;

  $getqtysold = mysqli_query($connection,"SELECT * FROM sale WHERE id ='".$row['uniqid']."' ");
  while($pro = mysqli_fetch_array($getqtysold)){
    $totalqtysold += $pro['qbought'];
  }



  ?>
<tr>

<td class="productimgname">
<a href="javascript:void(0);" class="product-img">

<img src="productimages/<?php 
if($row['proimages']==1){
  echo $row['proimages'];
}else{
$images = explode(",", $row['proimages']);
  echo $images[0];
}
?>" alt="product">


</a>
<a href="javascript:void(0);"><?php echo $row['proname'];?></a>
</td>
<td><?php echo number_format ($row['price'],2);?></td>
<td><?php echo $row['instockqty'];?></td>
<td><?php echo ($row['instockqty'] - $totalqtysold);?></td>
<td><?php echo $totalqtysold;?></td>
<td style="text-transform:uppercase;"><?php echo $row['postedby'];?></td>
<td>
<a class="me-3" href="product-details.php?productid=<?php echo $row['proid'];?>">
<img src="assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="editproduct.php?ids=<?php echo $row['proid'];?>">
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<a class="" href="?delid=<?php echo $row['proid'];?>" onclick="return confirm('do you want to delete product?')">
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
<?php include('inc/footer.php'); ?>
<script src="actions.js"></script>
<!-- <script>
  function printDiv(divId) {
  var printContents = document.getElementById(divId).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
function saveAsExcel(divId) {
  var today = new Date();

// Format the date as YYYY-MM-DD
var formattedDate = today.getFullYear() + '-' + (today.getMonth() + 1).toString().padStart(2, '0') + '-' + today.getDate().toString().padStart(2, '0');

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
    a.download = 'productlist'+formattedDate+'.xlsx';
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
 -->

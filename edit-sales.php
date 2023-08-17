<?php include('inc/header.php'); ?>


<?php include('inc/sidebar.php'); ?>
<?php

$saleid = $_GET['saleid'];

$select = mysqli_query($connection, "SELECT * FROM sale where reference ='$saleid' group by reference");
while($row = mysqli_fetch_array($select)){


?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Edit Sale</h4>
<h6>Edit your sale details</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Customer</label>
<div class="row">
  <form action="inc/validate.php" method="post">
<div class="col-lg-10 col-sm-10 col-10">
<select class="select" id="customerbuy" name="customerbuy">
<option>Walk-in Customer</option>
<?php 
$customer = mysqli_query($connection, "SELECT * FROM customer ");
while($rowed = mysqli_fetch_array($customer)){

  if($row['customer'] == $rowed['email']){
?>
<option value='<?php echo $rowed['email']; ?>' selected><?php echo $rowed['name'];  ?></option>

<?php }else{?>
  <option value='<?php echo $rowed['email']; ?>' ><?php echo $rowed['name'];  ?></option>

<?php } }?>
</select>
</div>
<!-- <div class="col-lg-2 col-sm-2 col-2 ps-0">
<div class="add-icon">
<span><img src="assets/img/icons/plus1.svg" alt="img"></span>
</div>
</div> -->
</div>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Date</label>
<div class="input-groupicon">
<input type="text"  value="<?php echo $row['date']; ?>" name="date">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>

</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Supplier</label>
<select class="select">
<option>Store 1</option>
<option>Store 2</option>
</select>
</div>
</div> -->
<!-- <div class="col-lg-12 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<div class="input-groupicon">
<input type="text" value="" name="proname">
<div class="addonset">
<img src="assets/img/icons/scanner.svg" alt="img">
</div>
</div>
</div>
</div>
</div> -->
<div class="row">
<div class="table-responsive mb-3">
<table class="table">
<thead>
<tr>

<th>Product Name</th>
<th>QTY</th>
<th>Price</th>
<th>Subtotal</th>
<th>Quantity due</th>

<th></th>
</tr>
</thead>
<tbody>
<!-- <tr>
<td>1</td>
<td>
</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="assets/img/icons/delete.svg" alt="svg"></a> 
</td>
</tr>--->
<?php 
$getdetails = mysqli_query($connection,"SELECT * FROM sale WHERE reference ='".$_GET['saleid']."'");
  while($col = mysqli_fetch_array($getdetails)){ ?>
<tr>
<td>
<select name="proname[]" id="" class="select">
<?php 
$getallpro = mysqli_query($connection,"SELECT * FROM products");
while($getpro = mysqli_fetch_array($getallpro)){
if($getpro['proname']==$col['proname']){
  ?>
  <option style="" value="<?php echo $getpro['proname']; ?>" selected><?php echo $getpro['proname']; ?></option>
 
  <?php }else{?>
  
    <option style="font-size:20px; color:blue;" value="<?php echo $getpro['proname']; ?>"><?php echo $getpro['proname']; ?></option>
  
  <?php }} ?>
</select>
</td>
<td style="padding: 10px;vertical-align: top; ">
<input type="tel" name="qtyb[]"  id="qtydue" value="<?php echo $col['qbought'];?>" style="padding:10px; border-radius:0.4rem; border:1px solid #0dcaf0;" data-price="<?php echo ($col['subtotal']/$col['qbought']);?>" data-id="<?php echo $col['id'] ; ?>">


</td>
<td style="padding: 10px;vertical-align: top; ">
<input type="tel" name="price[]"  style="background:none;border:none;"  readonly value="<?php echo number_format(($col['subtotal']/$col['qbought']),2);?>" style="padding:10px; border-radius:0.4rem; border:1px solid #0dcaf0;" />
</td>
<td style="padding: 10px;vertical-align: top; ">
<input type="text" name="subtotal[]"  style="background:none;border:none;" id="subt<?php echo $col['id'] ; ?>" readonly value="<?php echo $col['subtotal'];?>" style="padding:10px; border-radius:0.4rem; border:1px solid #0dcaf0;" >
<input type="hidden" name="proid[]" value="<?php echo $col['id'] ; ?>">
</td>
<td style="padding: 10px;vertical-align: top; ">
<input type="tel" name="qtydue[]" id="" value="<?php echo $col['qtydue'];?>" style="padding:10px; border-radius:0.4rem; border:1px solid #0dcaf0;" >

</td>


</tr>
<?php } ?>
<!-- <tr>
<td>2</td>
<td class="productimgname">
<a class="product-img">
<img src="assets/img/product/product1.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook pro</a>
</td>
<td>1.00</td>
<td>1500.00</td>
<td>0.00</td>
<td>0.00</td>
<td>1500.00</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr> -->
</tbody>
</table>
</div>
</div>
<div class="col-lg-12 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>
  <li>
<h4>Sold by</h4>
<h5><?php 
 $getseller = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM user WHERE email = '".$row['soldby']."'"));
 echo $getseller['name'];?></h5>
  </li>
<li class="total">
<h4>Grand Total</h4>
<h5 id="totamt">&#8358;<?php echo number_format($row['total'],2);?>
</h5>
<input type="hidden"  id="exacttotal" value="<?php echo $row['total'] ;?>"/>

</li>
<li class="total">
<h4>Amount Paid</h4>
<h5>&#8358;<input type="text" onkeyup="calcamtdue()" class="amountpaid" name="amountpaid" value="<?php echo $row['amountpaid'];?>" style="padding:10px; border-radius:0.4rem; border:1px solid #0dcaf0;"/></h5>
</li>
<li class="total">
<h4>Amount Due </h4>
<h5>&#8358;<span id="amountdue"><?php 
echo number_format(($row['total']-$row['amountpaid']),2);?></span></h5>
</li>
</ul>
</div>
<?php } ?>
</div>
</div>
<!-- <div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Order Tax</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Discount</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Shipping</label>
<input type="text">
</div>
</div> -->
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Status</label>
<select class="select">
<option>Choose Status</option>
<option>Completed</option>
<option>Inprogress</option>
</select>
</div>
</div> -->
<!-- <div class="row">
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>
<li>
<h4>Order Tax</h4>
<h5>$ 0.00 (0.00%)</h5>
</li>
<li>
<h4>Discount	</h4>
<h5>$ 0.00</h5>
</li>
</ul>
</div>
</div>
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>
<li>
<h4>Shipping</h4>
<h5>$ 0.00</h5>
</li>
<li class="total">
<h4>Grand Total</h4>
<h5>$ 1750.00</h5>
</li>
</ul>
</div>
</div>
</div> -->
<div class="col-lg-12">
<button type="submit" class="btn btn-submit me-2" name="editsale">Submit</button>
</div>
</form>
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

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script> 
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
<script>
// function calsubt(){
  const qtydue = document.querySelectorAll('#qtydue');
   const subtotal = document.getElementsByName('subtotal[]');
   let total =0;

  const strlen = qtydue.length;
  // console.log(strlen);
  for(var i =0; i < strlen ; i++){

    // console.log(i);
    qtydue[i].addEventListener('keyup',function(){
      // console.log()
      const qtys = parseInt(this.value);
      const proid = this.dataset.id;
      const proprice = parseInt(this.dataset.price);

      document.getElementById("subt"+proid).value= qtys * proprice;
    

      //  console.log(qtys * proprice);
    updateTotal();
    calcamtdue();

    });

  }
  function updateTotal() {
  const subtotalElements = document.getElementsByName('subtotal[]');
  let total = 0;
  
  subtotalElements.forEach(subtotalElement => {
    const subtotal = parseInt(subtotalElement.value);
    total += subtotal;
  });
  
  const totalElement = document.getElementById('totamt'); // Update this with your total element ID
  // totalElement.textContent = `$${total.toFixed(2)}`;
  totalElement.innerHTML = "&#8358;"+new Intl.NumberFormat().format(total);
  document.getElementById("exacttotal").value= total;


  // console.log(total);
}

function calcamtdue(){
  const subtotal = parseInt(document.getElementById("exacttotal").value);
  const amountpaid = parseInt(document.querySelector(".amountpaid").value);
   const amtdue = subtotal - amountpaid;
  
  document.getElementById('amountdue').innerHTML =new Intl.NumberFormat().format(amtdue);

// console.log(amtdue);

}
// }
</script>
</body>
</html>


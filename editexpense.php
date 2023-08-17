<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<?php
$expid = $_GET['expid'];

$select = mysqli_query($connection,"select * from expenses where id='$expid' ");
$row = mysqli_fetch_array($select);

?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Expense EDIT</h4>
<h6>Add/Update Expenses</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
  <form action="" method="POST">
<label>Expense Category</label>
<input type="text" value="<?php echo $row['expcat']; ?>" name="expcat">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Expense Date </label>
<div class="input-groupicon">
<input type="text" placeholder="Choose Date" class="datetimepicker" value="<?php echo $row['expdate']; ?>" name="date">
<div class="addonset">
<img src="assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Amount</label>
<div class="input-groupicon">
<input type="text" value="<?php echo $row['expamt']; ?>" name="amount">
<input type="hidden" value="<?php echo $_GET['expid']; ?>">
<div class="addonset">
<!-- <img src="assets/img/icons/dollar.svg" alt="img"> -->
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Reference No.</label>
<input type="text" value="<?php echo $row['reference']; ?>" name="ref">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description"><?php echo $row['description']; ?></textarea>
</div>
</div>
<div class="col-lg-12">
<button class="btn btn-submit me-2" name="update">Update</button>
</form>
<!-- <a href="expenselist.php" class="btn btn-cancel">Cancel</a> -->
</div>
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
</body>
</html>


<?php
if(isset($_POST['update'])){
  $expcat = $_POST['expcat'];
  $expdate = $_POST['date'];
  $amount = $_POST['amount'];
  $ref = $_POST['ref'];
  $description = $_POST['description'];
  $date = date('Y-m-d');

  $update = "UPDATE expenses SET expcat ='$expcat', expdate ='$expdate', 
  expamt ='$amount', reference ='$ref', description ='$description', date='$date' WHERE id ='$expid' ";
  $update_query = mysqli_query($connection, $update);
 
  if($update_query){?>

    <script>
     alert('Expense Updated');
    location.href='expenselist.php';
    </script>
  
   <?php }else{
    echo "error".$update_query.mysqli_error($connection);
   }
  }
?>
<?php include('inc/header.php'); ?>


<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Expense Add</h4>
<h6>Add/Update Expenses</h6>
</div>
</div>
<form method="post" action="inc/validate.php">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Expense Name</label>
<input type="text" name="expcat">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Expense Date </label>
<div class="input-groupicon">
<input type="text" placeholder="Choose Date" name="expdate" class="datetimepicker">
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
<input type="text" name="expamt">
<div class="addonset">
<!-- <img src="assets/img/icons/naira.svg" alt="img"> -->
<!-- &#2032; -->
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Reference No.</label>
<input type="text" name="ref" readonly value="<?php echo "exp".rand(111111,999999);?>">
</div>
</div>
<!-- <div class="col-lg-12">
<div class="form-group">
<label>Expense for</label>
<input type="text">
</div>
</div> -->
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="expfor"></textarea>
</div>
</div>
<div class="col-lg-12">
<button  class="btn btn-submit me-2" name="addexp">Submit</button>
<!-- <a href="expenselist.php" class="btn btn-cancel">Cancel</a> -->
</div>
</form>
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

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>
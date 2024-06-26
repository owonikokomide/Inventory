<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>User Management</h4>
<h6>Edit/Update User</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>User Name</label>
<input type="text" placeholder="williams1234">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" placeholder="williams1234@example.com">
</div>
<div class="form-group">
<label>Password</label>
<div class="pass-group">
<input type="password" class=" pass-input" value="123456">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Mobile</label>
<input type="text" placeholder="+12163547758 ">
</div>
<div class="form-group">
<label>Role</label>
<select class="select">
<option>Manager</option>
<option>Sales Man</option>
</select>
</div>
<div class="form-group">
<label>Confirm Password</label>
<div class="pass-group">
<input type="password" class=" pass-inputs" value="123456">
<span class="fas toggle-passworda fa-eye-slash"></span>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group uploadedimage">
<label> Profile Picture</label>
<div class="image-upload image-upload-new">
<div class="image-uploads">
<img src="assets/img/customer/customer1.jpg" alt="img">
<div class="productviews">
<div class="productviewscontent">
<div class="productviewsname">
<h2>macbookpro.jpg</h2>
<h3>581kb</h3>
</div>
<a href="javascript:void(0);" class="hideset">x</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12">
<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php include('inc/footer.php'); ?>
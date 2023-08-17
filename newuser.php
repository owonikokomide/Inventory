<?php include('inc/config.php'); ?>

<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>User Management</h4>
<h6>Add/Update User</h6>
</div>
</div>
<form action="inc/validateuser.php" method="POST">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Full Name</label>
<input type="text" name="fullname">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" name="email">
</div>
<!-- <div class="form-group">
<label>Password</label>
<div class="pass-group">
<input type="password" class=" pass-input">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div> -->
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Mobile</label>
<input type="text" name="mobile">
</div>
<div class="form-group">
<label>Role</label>
<select class="select" name="role">
<option>Select</option>
<option value="admin">Admin</option>
<option value="staff">Staff</option>
</select>
</div>
<!-- <div class="form-group">
<label>Confirm Password</label>
<div class="pass-group">
<input type="password" class=" pass-inputs">
<span class="fas toggle-passworda fa-eye-slash"></span>
</div>
</div>
</div> -->
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label> Profile Picture</label>
<div class="image-upload image-upload-new">
<input type="file">
<div class="image-uploads">
<img src="assets/img/icons/upload.svg" alt="img">
<h4>Drag and drop a file to upload</h4>
</div>
</div>
</div>
</div> -->
<div class="col-lg-12">
<button a href="javascript:void(0);" class="btn btn-submit me-2" name="submit">Submit</a></button>
</div>
</div>
</div>
</div>

</div>
</form>
</div>
</div>


<?php include('inc/footer.php'); ?>
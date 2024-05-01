<?php include('inc/head.php'); ?>

<?php //include('inc/sidebar.php'); ?>

 
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Account Setup/Activation</h4>
<!-- <h6>Add/Update User</h6> -->
</div>
</div>
<form action="" method="POST">
<?php
 include('inc/config.php');
 if(isset($_POST['addpass'])){
 $email = $_POST['email'];
 $pwd = $_POST['password'];
 $update = mysqli_query($connection,
 "UPDATE user SET pwd ='$pwd', status ='1' 
 WHERE email ='$email'");
 if($update){?>
 <script type="text/javascript">
  alert('Account Activated!! you can now have access to your account.');
  location.href='signin.php';
 </script>
<?php }

 }
?>
<div class="card">
<div class="card-body">
<div class="row">
  <center>
<div class="col-lg-6 col-sm-12 col-12">
  <div class="form-group">
<label>Email</label>
<input type="text" name="email" value="<?php echo $_GET['email'];?>" readonly >
</div>
<div class="form-group">
<label>Create Password  <small>(must not less than 8 characters)</small></label>
<div class="pass-group">
<input type="password" name="password" class=" pass-inputs" id="pass" onkeyup="validatepass()">
<span class="fas toggle-passworda fa-eye-slash"></span>
</div>
</div>
<!-- <div class="form-group">
<label>Email</label>
<input type="text" name="email">
</div> -->

<div class="col-lg-4">
<button id="submitid" class="btn btn-submit me-2" name="addpass" disabled  style="cursor:not-allowed;">Submit</button>
</div>
</center>
</div>
</div>
</div>

</div>
</form>
</div>
</div>
<script>
  function validatepass(){
    const pass = document.getElementById('pass').value.length;
    const button = document.getElementById('submitid');

    if(pass >= 8){
button.disabled = false;
button.style.cursor ="pointer";
    }else{
button.disabled = true;

    }

  }
</script>

<?php include('inc/footer.php'); ?>

<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>
<?php

include("inc/config.php");
if(isset($_GET['del'])){
  $id = $_GET['id'];
  $deletepic = mysqli_query($connection, "UPDATE user set img='' WHERE id ='$id'");
  if($deletepic){?>
<script type="text/javascript">
  alert('image removed');
  location.href='profile.php';
</script>
  <?php }

}


?>
<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Profile</h4>
<h6>User Profile</h6>
</div>
</div>
<form action="inc/validate.php" method="POST" enctype="multipart/form-data">
<div class="card">
<div class="card-body">
<div class="profile-set">
<div class="profile-head">
</div>
<?php
include('inc/config.php');
$loginemail = $_SESSION['loginid'];
$selloguser = mysqli_query($connection, "SELECT * FROM user WHERE email ='$loginemail'");
while($row = mysqli_fetch_array($selloguser)){?>
<div class="profile-top">
<div class="profile-content">
<div class="profile-contentimg">
<?php if(!empty($row['img'])){?>
  <img src="img/<?php echo $row['img'];?>" alt=""  id="blah" >
<?php }else{ ?>

  <img src="img/icon.png" alt="img" id="blah">

  <?php } ?>

<div class="profileupload">
<input type="file" id="imgInp" name="profilepic">
<a href="javascript:void(0);"><img src="assets/img/icons/edit-set.svg" alt="img"></a>
</div>

</div>

<div class="profile-contentname">
<h2><?php echo $row['name'];?></h2>
<h4>Updates Your Photo and Personal Details.</h4>
</div>
</div>
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<div class="ms-auto">
<button type="submit" href="javascript:void(0);" name ="updatepic" class="btn btn-submit me-2">Save</button>
<!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
<a href="profile.php?del=picture&id=<?php echo $row['id'];?>" onclick="return confirm('do you really want to remove image?')"><img src="assets/img/icons/delete.svg" alt="img" title="delete profile picture" style="position:absolute; margin-top:-2%; left:105px;padding:10px 0px;"></a>

</div>

<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="form-group">
<label>Full Name</label>
<input type="text" name="name" value="<?php echo $row['name'];?>" >
</div>
</div>
<!-- <div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Last Name</label>
<input type="text" value="<?php //cho $row['name'];?>">
</div>
</div> -->
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Email</label>
<input type="text" name="email" value="<?php echo $row['email'];?>">
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Phone</label>
<input type="text" name="phone" value="<?php echo $row['phone'];?>">
</div>
</div>
<!-- <div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Current Password</label>
<input type="text" value="enter current password">
</div>
</div> -->
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Password</label>
<div class="pass-group">
<input type="password" name="password" class="pass-input" value="<?php echo $row['pwd'];?>" >
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>
<div class="col-12">
<button type="submit" name="updateinfo" class="btn btn-submit me-2">Submit</button>
<!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</form>
</div>
</div>


<?php include('inc/footer.php'); ?>
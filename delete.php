<?php include ('inc/config.php');?>
<?php include('inc/header.php'); ?>
<?php include('inc/sidebar.php'); ?>

<?php
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

?>

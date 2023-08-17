<?php
include('inc/config.php');
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql = "SELECT * FROM products WHERE proid = $product_id";
  $result = mysqli_query($connection, $sql);

  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      echo json_encode($row);
  } else {
      echo json_encode(['error' => 'Product not found']);
  }
}




?>
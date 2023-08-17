<?php
session_start();
// Make sure you include your database connectionection logic here
// Example: $connection = mysqli_connectionect('localhost', 'username', 'password', 'dbname');
include('inc/config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['products']) && is_array($_POST['products'])) {
        $products = $_POST['products'];
      
        $soldby = $_SESSION['loginid'];
        $reference = "sale".uniqid();
        foreach ($products as $product) {
          $totalamount = $product['total'];
          $customer = $product['customer'];
            $productId = mysqli_real_escape_string($connection, $product['product_id']);
            $productName = mysqli_real_escape_string($connection, $product['product_name']);
            $quantity = mysqli_real_escape_string($connection, $product['quantity']);
            $subtotal = mysqli_real_escape_string($connection, $product['subtotal']);
            $qtyDue = mysqli_real_escape_string($connection, $product['qty_due']);
            $amountpaid = mysqli_real_escape_string($connection, $product['amtpaid']);
            $uniqid = mysqli_real_escape_string($connection, $product['uniqid']);
  //  echo $amountpaid;
            // Perform the database insert
            $sql = "INSERT INTO sale 
            (id,
            proname, 
            qbought, 
            subtotal,
             qtydue,
             total,
             customer,
             soldby,
             reference,
             amountpaid) 
        VALUES ('$uniqid','$productName', '$quantity', '$subtotal',
                '$qtyDue','$totalamount','$customer','$soldby','$reference','$amountpaid')";
$query = mysqli_query($connection, $sql);


        }
        if ($query) {
          echo "ref=".$reference;
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
          }
          
       
    } else {
        echo "No products data received.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connectionection
mysqli_close($connection);
?>

<?php
session_start();
include ('config.php');

if(isset($_POST['addproduct']))  {
  $proname = $_POST['proname'];
  $minqty = $_POST['minqty'];
  $quantity = $_POST['qty'];
  $description = $_POST['description'];
  $proprice = $_POST['proprice'];
  // $unit = $_POST['unit'];
  $stockrem = '0';
  $date = date('Y-m-d');
  $postedby = 'admin';
  $proimages = $_FILES['proimages']['name'];
  $proimagestmp = $_FILES['proimages']['tmp_name'];
  $destination = "productimages/";
  $uniqid = "pro".rand(1111,9999);
 
  $uploadfiles = array();

  foreach($proimages as $index => $value){
    $path = $destination.basename($value);
        if(move_uploaded_file($proimagestmp[$index], $path)){
          $allimages[] = $value;
        }
  }
$columdata = implode(",", $allimages);

  $insert = "INSERT INTO products 
  (uniqid,proname, unit, minimunqty, instockqty, stockrem, price, proimages, descriiption, date, postedby) VALUES
  ('$uniqid','$proname', '0', '$minqty', '$quantity', '$stockrem', '$proprice', '$columdata', '$description', '$date', '$postedby')";

  $insert_query = mysqli_query($connection,$insert);
  if($insert){
  ?>

  <!-- <script>
    Swal.fire({ title: "Are you sure?", text: "You won't be able to revert this!", type: "warning", showCancelButton: !0, confirmButtonColor: "#3085d6", cancelButtonColor: "#d33", confirmButtonText: "Yes, delete it!", confirmButtonClass: "btn btn-primary", cancelButtonClass: "btn btn-danger ml-1", buttonsStyling: !1 });
  </script> -->

 <?php
 }
 }

//LOGIN CODE

if(isset($_POST['signin'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select = "SELECT * FROM user WHERE email = '$email' AND pwd = '$password' AND status = 1";
  $select_query = mysqli_query($connection, $select);
  if($select_query){
    if(mysqli_num_rows($select_query)== '1'){
      $row = mysqli_fetch_array($select_query);
      $_SESSION['role'] = $row['role'];
      $_SESSION['loginadmin'] = "true";
      $_SESSION['loginid'] = $email;
      header('location:index.php');
    }
    else{
      echo "<center><p style='color:red;'>username or password is incorrect</p></center>";
    }
  }
}



//EDIT PROFILE CODE

if(isset($_POST['updatepic'])){
  $profilepic = $_FILES['profilepic']['name'];
  $id = $_POST['id'];
  $path = "../img/".$profilepic;
  $tmp = $_FILES['profilepic']['tmp_name'];
  
  if(move_uploaded_file($tmp, $path)){
    $update = mysqli_query($connection,"UPDATE user SET img ='$profilepic' WHERE id ='$id'");
    if($update){
      echo
      "
      <script> alert('image updated')
      location.href='../profile.php'
      
      </script>;
      ";
    }else{
      echo
      "
      <script> alert('error uploading image!!!')
      location.href='../profile.php'
      
      </script>;";
    }
  }

}

//EDIT DETAILS INFO



if(isset($_POST['updateinfo'])){
  
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];

  
  

    $update = mysqli_query($connection,"UPDATE user 
    SET name = '$name',
        email = '$email',
        pwd = '$password',
        phone = '$phone'
    WHERE id ='$id'");
    if($update){
      $_SESSION['loginid'] = $email;
      echo
      "
      <script> alert('Profile updated')
      location.href='../profile.php'
      
      </script>;
      ";
    }else{
      echo
      "
      <script> alert('error updating profile!!!')
      location.href='../profile.php'
      
      </script>;";
    }
  }

//ADD SUPPLIER SUPPLIER

if(isset($_POST['addsupp'])){
  $suppname = $_POST['suppname'];
  $suppemail = $_POST['suppemail'];
  $supptel = $_POST['supptel'];
  $suppaddr = $_POST['suppaddr'];
  $suppid = "supp".rand(11111,99999);
$add_supp = mysqli_query($connection,"INSERT INTO supplier (name,email,phone,address,suppid)
VALUES('$suppname',' $suppemail','$supptel','$suppaddr','$suppid')");

if($add_supp){
  echo 
  "
  <script> 
  alert('supplier added')
  location.href='../supplierlist.php'
  </script>
  ";
}

}


//edit supplier
if(isset($_POST['editsupp'])){
  $suppname = $_POST['suppname'];
  $suppemail = $_POST['suppemail'];
  $supptel = $_POST['supptel'];
  $suppaddr = $_POST['suppaddr'];
$eit_supp = mysqli_query($connection,
" UPDATE supplier
SET 
name ='$suppname',
email = '$suppemail',
phone = '$supptel',
address = '$suppaddr'
");

if($eit_supp){
  echo 
  "
  <script> 
  alert('info update')
  location.href='../supplierlist.php'
  </script>
  ";
}

}



//ADD PURCHASE
if(isset($_POST['addpurchase'])){

  $suppname = $_POST['suppname'];
  $pdate = $_POST['pdate'];
$explode = explode("-",$pdate);
$newdate = $explode[2]."-".$explode[1]."-".$explode[1];
  $materials = $_POST['materials'];
  $reference = $_POST['reference'];
  $price = $_POST['price'];
  $dstatus = $_POST['dstatus'];
  $shipfee = $_POST['shipfee'];
  $gtotal = $_POST['grandtotal'];
  $paid = $_POST['paid'];
  $description = $_POST['description'];
  $createdby = $_POST['createdby'];

  $add_up = mysqli_query($connection,"INSERT INTO purchases
  (suppid,reference,date,price,shipfee,materials,dstatus,grand_total,paid,description,createdby)
  VALUES
  ('$suppname','$reference','$newdate','$price','$shipfee','$materials','$dstatus','$gtotal','$paid','$description','$createdby')
  
  ");
  
  if($add_up){
    if(($gtotal - $paid) > 0 ){
      $expamt = ($gtotal - $paid);
      $expfor = "Amount to balance for ".$materials." supplied by "; 
      $insertexp = mysqli_query($connection, "INSERT INTO expenses (expcat,expdate,expamt,reference,description,suppid)
    VALUE ('Purchase Due','$pdate','$expamt','$reference','$expfor','$suppname')");
  if($insertexp){
    echo 
    "
    <script> 
    alert('purchases added')
    location.href='../purchaselist.php'
    </script>
    ";
  }
    }else{
      echo 
    "
    <script> 
    alert('purchases added')
    location.href='../purchaselist.php'
    </script>
    ";
    }
    
  }
}


//EDIT PURCHASE
if(isset($_POST['editpurchase'])){

  $suppname = $_POST['suppname'];
  $pdate = $_POST['pdate'];
  $materials = $_POST['materials'];
  $reference = $_POST['reference'];
  $price = $_POST['price'];
  $dstatus = $_POST['dstatus'];
  $shipfee = $_POST['shipfee'];
  $gtotal = $_POST['grandtotal'];
  $paid = $_POST['paid'];
  $description = $_POST['description'];
  // $createdby = $_POST['createdby'];

  $edit_up = mysqli_query($connection,
  "UPDATE purchases
  SET
  suppid ='$suppname',
  reference = '$reference',
  date ='$pdate',
  price = '$price',
  shipfee = '$shipfee',
  materials = '$materials',
  dstatus  ='$dstatus',
  grand_total = '$gtotal',
  paid = '$paid',
  description = '$description' ");
  if($edit_up){
    echo 
    "
    <script> 
    alert('purchases updated')
    location.href='../purchaselist.php'
    </script>
    ";
  }
}


//ADD EXPENSES


if(isset($_POST['addexp'])){
  $expcat = $_POST['expcat'];
  $expdate = $_POST['expdate'];
  $expamt = $_POST['expamt'];
  $ref = $_POST['ref'];
  $expfor = $_POST['expfor'];
  $suppid ="";
  $insert = mysqli_query($connection, "INSERT INTO expenses (expcat,expdate,expamt,reference,description,suppid)
  VALUE ('$expcat','$expdate','$expamt','$ref','$expfor','$suppid')");

  if($insert){?>
<script> 
    alert('expense added')
    location.href='../expenselist.php'
    </script>
  <?php }
  
}


//make new sales

if(isset($_POST['makesales'])){
  $number = count($_POST['proname']);
   
  if($number > 0){
    // $message = true;
    for($i = 0; $i < $number; $i++){
    $subtotal = $_POST['subtotal'][$i];
    $qbouy = $_POST['qtyb'][$i];
    $qtydue = $_POST['qtydue'][$i];
    
  }
 
}
// if($message == true){
  echo $subtotal;
// }
$totalamount = $_POST['totalamount'];
    $customer = $_POST['customer'];
    $soldby = $_SESSION['loginid'];
  // $proarray = array();
  // foreach($proname as $index => $value){
  //   $allprof[] = $value;
  // }
  // $proarr = implode(",",$allprof );
  echo $customer;

}


if(isset($_POST['editsale'])){
  $customer =  $_POST['customerbuy'];
  $date = $_POST['date'];
  $total = 0;
  $amountpaid = $_POST['amountpaid'];

  $number = count($_POST['proid']);
  for($k=0; $k < $number; $k++){
    $total += $_POST['subtotal'][$k];
  }
  // echo $total;

  for($i =0; $i < $number; $i++ ){
    $proid = $_POST['proid'][$i];
    $productname = $_POST['proname'][$i];
  $qtyb = $_POST['qtyb'][$i];
  $price = $_POST['price'][$i];
  $subtotal = $_POST['subtotal'][$i];
  $qtydue = $_POST['qtydue'][$i];


// echo $total;
  $update = "UPDATE sale SET proname ='$productname', qbought ='$qtyb', qtydue ='$qtydue',
  subtotal ='$subtotal', amountpaid='$amountpaid ', customer='$customer', total='$total'
  WHERE id ='$proid' ";

  $query = mysqli_query($connection,$update);
  }
  if($query){
    echo "<script> alert('sales updated')
    location.href='../saleslist.php'</script>";
  }else{
    echo "error".$query.mysqli_error($connection);
  }
}


?>
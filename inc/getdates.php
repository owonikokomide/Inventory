<?php 
if($mth == "01"){
  $startdate = "01-"."01"."-".$year;
$enddate = "31-"."01"."-".$year;
$totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}elseif($mth == "02"){
  $startdate = "01-"."02"."-".$year;
  $enddate = "31-"."02"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "03"){
  $startdate = "01-"."03"."-".$year;
  $enddate = "31-"."03"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "04"){
  $startdate = "01-"."04"."-".$year;
  $enddate = "31-"."04"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "05"){
  $startdate = "01-"."05"."-".$year;
  $enddate = "31-"."05"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "06"){
  $startdate = "01-"."06"."-".$year;
  $enddate = "31-"."06"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "07"){
  $startdate = "01-"."07"."-".$year;
  $enddate = "31-"."07"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "08"){
  $startdate = "01-"."08"."-".$year;
  $enddate = "31-"."08"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
elseif($mth == "09"){
  $startdate = "01-"."09"."-".$year;
  $enddate = "31-"."09"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}elseif($mth == "10"){
  $startdate = "01-"."10"."-".$year;
  $enddate = "31-"."10"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}elseif($mth == "11"){
  $startdate = "01-"."11"."-".$year;
  $enddate = "31-"."11"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}elseif($mth == "12"){
  $startdate = "01-"."12"."-".$year;
  $enddate = "31-"."12"."-".$year;
  $totalpurchase =0;
$totalpurchasedue =0;
  $getpurchase = mysqli_query($connection,"SELECT * FROM purchases WHERE date between '$startdate' and '$enddate'  ");
  $no_of_items = mysqli_num_rows($getpurchase);
  while($row = mysqli_fetch_array($getpurchase)){
    $totalpurchase += $row['paid'];
    $totalpurchasedue += ($row['grand_total'] - $row['paid']);
  }
  echo number_format($totalpurchase,2);
  
}
// echo $startdate."".$enddate;


//number_format($totalpurchase,2);?>
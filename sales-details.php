<?php include('inc/header.php'); ?>

<?php include('inc/sidebar.php'); ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
  <?php $getdet = mysqli_query($connection,"SELECT * FROM sale WHERE reference ='".$_GET['ref']."' group by reference");
  while($row = mysqli_fetch_array($getdet)){ ?>
<h4>Sale Details</h4>
<h6>View sale details</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="card-sales-split">
<h2>Sale Detail : <?php echo $row['reference']; ?></h2>
<ul>
  <li>
  <a onclick="history.back();" class="btn btn-submit me-2">BACK</a>

  </li>
<!-- <li>
<a href="javascript:void(0);"><img src="assets/img/icons/edit.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);"><img src="assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);"><img src="assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a href="javascript:void(0);"><img src="assets/img/icons/printer.svg" alt="img"></a>
</li> -->
</ul>
</div>
<div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
<table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
<tbody><tr class="top">
<td colspan="6" style="padding: 5px;vertical-align: top;">
<table style="width: 100%;line-height: inherit;text-align: left;">
<tbody><tr>
<td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Customer Info</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $row['customer']; ?></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a4d5b565117535417594f494e55575f487a5f425b574a565f14595557"><?php echo $row['customer']; ?></a></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> 123456780</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> N45 , Dhaka</font></font><br>
</td>
<!-- <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Company Info</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> DGT </font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="9ffefbf2f6f1dffae7fef2eff3fab1fcf0f2">[email&#160;protected]</a></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">6315996770</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> 3618 Abia Martin Drive</font></font><br>
</td> -->
<td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px; ">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice Info</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 15px;color:#000;font-weight: 900;"> <b>Reference</b> : <?php echo $row['reference']; ?>  </font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 15px;color:#000;font-weight: 900;"> <b>Payment Status</b> : paid</font></font><br>
 <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 15px;color:#000;font-weight: 900;"><b> Status </b> : completed</font></font><br>
</td>
<!-- <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> Paid</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;"> Completed</font></font><br>
</td> -->
</tr>

</tbody></table>
</td>
</tr>
<tr class="heading " style="background: #F3F2F7;">
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Product Name
</td>
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
QTY
</td>
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Price(&#8358;)
</td>
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Subtotal(&#8358;)
</td>
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Qty Due
</td>

<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Date
</td>
</tr>
<?php $getdetails = mysqli_query($connection,"SELECT * FROM sale WHERE reference ='".$_GET['ref']."'");
  while($col = mysqli_fetch_array($getdetails)){ ?>
<tr class="details" style="border-bottom:1px solid #E9ECEF ;">
<td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">

<?php echo $col['proname'];?>
</td>
<td style="padding: 10px;vertical-align: top; ">
<?php echo $col['qbought'];?>

</td>
<td style="padding: 10px;vertical-align: top; ">
<?php echo number_format(($col['subtotal']/$col['qbought']),2);?>
</td>
<td style="padding: 10px;vertical-align: top; ">
<?php echo number_format($col['subtotal'],2);?>

</td>
<td style="padding: 10px;vertical-align: top; ">
<?php echo $col['qtydue'];?>

</td>

<td style="padding: 10px;vertical-align: top; ">
<?php echo $col['date'];?>

</td>
</tr>
<?php } ?>
</tbody></table>
</div>
<!-- <div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Order Tax</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Discount</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Shipping</label>
<input type="text">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Status</label>
<select class="select">
<option>Choose Status</option>
<option>Completed</option>
<option>Inprogress</option>
</select>
</div>
</div> -->
<div class="row">
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<!-- <ul>
<li>
<h4>Order Tax</h4>
<h5>$ 0.00 (0.00%)</h5>
</li>
<li>
<h4>Discount	</h4>
<h5>$ 0.00</h5>
</li>
</ul> -->
</div>
</div>
<div class="col-lg-12 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>
  <li>
<h4>Sold by</h4>
<h5><?php  $getseller = mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM user WHERE email = '".$row['soldby']."'"));
 echo $getseller['name'];?></h5>
  </li>
<li class="total">
<h4>Grand Total</h4>
<h5>&#8358;<?php echo number_format($row['total'],2);?></h5>
</li>
<li class="total">
<h4>Amount Paid</h4>
<h5>&#8358;<?php echo number_format($row['amountpaid'],2);?></h5>
</li>
<li class="total">
<h4>Amount Due </h4>
<h5>&#8358;<?php 
echo number_format(($row['total']-$row['amountpaid']),2);?></h5>
</li>
</ul>
</div>
</div>
</div>
<?php } ?>
<div class="col-lg-12">
<a onclick="history.back();" class="btn btn-submit me-2">BACK</a>
<!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php include('inc/footer.php'); ?>
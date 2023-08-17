<thead>
<tr>

<th>Supplier Name</th>
<th>Phone</th>
<th>email</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>
<tbody>
  <?php
  include('inc/config.php');
  $select = mysqli_query($connection, "SELECT * FROM supplier");
  while($row = mysqli_fetch_array($select)){?>
<tr>
<!-- <td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td> -->
<td > 
<?php echo $row['name'];?>
</td>
<td><?php echo $row['phone'];?>
 </td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['address'];?></td>
<td>
<a class="me-3" href="editsupplier.php?id=<?php echo $row['id'];?>">
<img src="assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<?php } ?>
</tbody>
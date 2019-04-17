<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th>S_No </th>
        <th>Name</th>
        <th>Email</th>
        <th>Image </th>
        <th>Delete</th>
        <th>Country</th>
      </tr>
      <?php
      include("includes/db.php");
      $get_pro="select * from customers";
      $run=mysqli_query($con,$get_pro);
      $i=0;
      while ($row=mysqli_fetch_array($run)) 
      {
      	$c_id=$row['customer_id'];
      	$c_name=$row['customer_name'];
      	$c_email=$row['customer_email'];
      	$c_image=$row['cutomer_image'];
       $c_country=$row['customer_country'];
      	$i++;
      	 ?>
      <tr>
      	<td><?php echo $c_id; ?></td>
      	<td><?php echo $c_name; ?></td>
        <td><?php echo $c_email; ?></td>
      	<td><?php echo "<img src='../Customer/customer_photos/$c_image' width='100' height='100'>"; ?></td>
      	<td><?php echo $c_country; ?></td>
      	
      	<td><a href="delete_customer.php?delete_customer=<?php echo $c_id; ?>">Delete</a></td>
      </tr>
	<?php } ?>

      ?>
    </thead>
    <tbody>
    </tbody>
  </table>

</body>
</html>
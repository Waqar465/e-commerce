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
        <th>Order Number </th>
        <th>Customer</th>
        <th>Invoice</th>
        <th>Product Id</th>
        <th>Qty</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
      <?php
      include("includes/db.php");
      $get_pro="select * from pending_orders";
      $run=mysqli_query($con,$get_pro);
      $i=0;
      while ($row=mysqli_fetch_array($run)) 
      {
        $o_id=$row['order_id'];
      	$c_id=$row['customer_id'];
      	$invoice=$row['invoice_no'];
      	$p_id=$row['product_id'];
      	$qty=$row['qty'];
       $o_s=$row['order_status'];
      	$i++;
      	 ?>
      <tr>
      	<td><?php echo $i; ?></td>
        <td><?php 
        $get_c="select * from customers where customer_id='$c_id'";
        $rrrr=mysqli_query($con,$get_c);
        $row=mysqli_fetch_array($rrrr);
        $customer=$row['customer_name'];

        echo $customer ;

        ?></td>
      	<td><?php echo $invoice; ?></td>
        <td><?php echo $p_id; ?></td>
        <td><?php echo $qty; ?></td>
      	<td><?php echo $o_s; ?></td>
      	
      	<td><a href="delete_order.php?delete_order=<?php echo $o_id; ?>">Delete</a></td>
      </tr>
	<?php } ?>

      ?>
    </thead>
    <tbody>
    </tbody>
  </table>

</body>
</html>
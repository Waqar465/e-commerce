<?php

include("includes/db.php");

//getting the customer id.

	$c=$_SESSION['customer_email'];
	$get_c="select * from customers where customer_email='$c'";
	$rrrrr=mysqli_query($con,$get_c);
	
	$c_row=mysqli_fetch_array($rrrrr);
	$c_id=$c_row['customer_id'];

?>
<table width="750" align="center">
<tr>
	<th>Order No</th>
    	<th>Due amount</th>
        	<th>Invoice No</th>
            	<th>Total Products</th>
                	<th>Order Date</th>
                    	<th>Paid/Unpaid</th>
                        	<th>Status</th>
    
<?php
$get_o="select * from customer_orders where customer_id='$c_id'";
$run=mysqli_query($con,$get_o);
$i=0;

while($row=mysqli_fetch_array($run))
{
	$order_id=$row['order_id'];
	$D_A=$row['due_amount'];
	$I_N=$row['invoice_no'];
	$T_P=$row['total_products'];
	$O_D=$row['order_date'];
	
	$O_S=$row['order_status'];
	$i++;
	if($O_S=='pending')
	{
	$O_S='Unpaid';	
	}
	else
	{
		$O_S='Paid';
	}
	echo "
	<tr align='center'>
		<td>$i</td>
		<td>$D_A</td>
		<td>$I_N</td>
		<td>$T_P</td>
		<td>$O_D</td>
	
		<td>$O_S</td>
		<td><a href='confirm.php?order_id=$order_id'>Confirm If paid</a></td>
	</tr>
	
	
	";
}



?>
</tr>

</table>
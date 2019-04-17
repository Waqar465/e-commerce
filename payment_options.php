<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
	<head>
		<title>Payment Methods</title>
	</head>
    <body>
<div align="center">
<?php
$ip= getRealIpAddr();
$get_customer="select * from customers where customer_ip='$ip'";
$run=mysqli_query($con,$get_customer);
$customer=mysqli_fetch_array($run);
$customer_id=$customer['customer_id'];
?>
<h2>Payment Options for you</h2>


<a href="http://www.paypal.com"><img src="images/paypal.png"/></a>
OR
<a href="order.php?customer_id=<?php echo $customer_id; ?>" style="text-decoration:none" style="float:right ">Pay Offline</a><br />
<b>If you selected "pay Offline" option then please check your email or account to find the invoice no of your order.</b>
</div>
</body>
</html>
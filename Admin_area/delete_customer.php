<?php
include("includes/db.php");
if (isset($_GET['delete_customer'])) {
	$del_id=$_GET['delete_customer'];

	$delete_pro="delete from customers where customer_id='$del_id'";
	$r=mysqli_query($con,$delete_pro);

	if ($r) {
		echo "<script>alert('One Customer has been deleted')</script>";
		echo "<script>window.open('index.php?view_customer','_self')</script>";
	}
}

?>
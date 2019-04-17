<?php
include("includes/db.php");
if (isset($_GET['delete_order'])) {
	$del_id=$_GET['delete_order'];

	$delete_pro="delete from pending_orders where order_id='$del_id'";
	$r=mysqli_query($con,$delete_pro);

	if ($r) {
		echo "<script>alert('One Order has been deleted')</script>";
		echo "<script>window.open('index.php?view_order','_self')</script>";
	}
}

?>
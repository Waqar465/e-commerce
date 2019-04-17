<?php
include("includes/db.php");
if (isset($_GET['delete_pro'])) {
	$del_id=$_GET['delete_pro'];

	$delete_pro="delete from products where product_id='$del_id'";
	$r=mysqli_query($con,$delete_pro);

	if ($r) {
		echo "<script>alert('One Product has been deleted')</script>";
		echo "<script>window.open('index.php?view_product','_self')</script>";
	}
}

?>
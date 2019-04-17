<?php
include("includes/db.php");
if (isset($_GET['delete_brand'])) {
	$del_id=$_GET['delete_brand'];

	$delete_cat="delete from brands where brand_id='$del_id'";
	$r=mysqli_query($con,$delete_cat);

	if ($r) {
		echo "<script>alert('One brand has been deleted')</script>";
		echo "<script>window.open('index.php?view_brand','_self')</script>";
	}
}

?>
<?php
include("includes/db.php");
if (isset($_GET['delete_cat'])) {
	$del_id=$_GET['delete_cat'];

	$delete_cat="delete from categories where cat_id='$del_id'";
	$r=mysqli_query($con,$delete_cat);

	if ($r) {
		echo "<script>alert('One Categories has been deleted')</script>";
		echo "<script>window.open('index.php?view_category','_self')</script>";
	}
}

?>
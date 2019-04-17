<!DOCTYPE html>
<html>
<head>
	<title></title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
</head>
<body>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="brand">Inser Category Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Category Title" name="c_title">
      </div>
    </div>
        <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="insert_category">Insert Category</button>
      </div>
    </div>
  </form>
<?php
include("includes/db.php");
if (isset($_POST['insert_category'])) {
	$brand= $_POST['c_title'];
	$in="insert into categories (cat_title) values ('$brand')";
	$r=mysqli_query($con,$in);
	if($r)
	{
		echo "<script>alert('New Category is added.')</script>";
				echo "<script>window.open('index.php?view_category','_self')</script>";
	}
}
?>

</body>
</html>
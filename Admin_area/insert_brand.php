<!DOCTYPE html>
<html>
<head>
	<title></title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
</head>
<body>
<form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="brand">Inser Brand Title:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Enter Brand Title" name="b_title">
      </div>
    </div>
        <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="insert_brand">Insert Brand</button>
      </div>
    </div>
  </form>
<?php
include("includes/db.php");
if (isset($_POST['insert_brand'])) {
	$brand= $_POST['b_title'];
	$in="insert into brands (brand_title) values ('$brand')";
	$r=mysqli_query($con,$in);
	if($r)
	{
		echo "<script>alert('New brand is added.')</script>";
				echo "<script>window.open('index.php?view_brand','_self')</script>";
	}
}
?>

</body>
</html>
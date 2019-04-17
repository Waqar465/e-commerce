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
        <th>Brand ID </th>
        <th>Brand Title</th>
        <th>Delete</th>
      </tr>
      <?php
      include("includes/db.php");
      $get_pro="select * from brands";
      $run=mysqli_query($con,$get_pro);
      $i=0;
      while ($row=mysqli_fetch_array($run)) 
      {
      	$c_id=$row['brand_id'];
      	$c_title=$row['brand_title'];
      	$i++;
      	 ?>
      <tr>
      	<td><?php echo $i ?></td>
      	<td><?php echo $c_title ?></td>
      	<td><a href="delete_brand.php?delete_brand=<?php echo $c_id; ?>">Delete</a></td>
      </tr>
	<?php } ?>

      ?>
    </thead>
    <tbody>
    </tbody>
  </table>

</body>
</html>
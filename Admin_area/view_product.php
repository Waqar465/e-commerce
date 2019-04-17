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
        <th>Product No </th>
        <th>Title</th>
        <th>Image</th>
        <th>Price </th>
		<th>Delete</th>
      </tr>
      <?php
      include("includes/db.php");
      $get_pro="select * from products";
      $run=mysqli_query($con,$get_pro);
      $i=0;
      while ($row=mysqli_fetch_array($run)) 
      {
      	$p_id=$row['product_id'];
      	$p_title=$row['product_title'];
      	$p_img=$row['product_img1'];
      	$p_price=$row['product_price'];
      	$i++;
      	 ?>
      <tr>
      	<td><?php echo $i ?></td>
      	<td><?php echo $p_title ?></td>
      	<td><?php echo "<img src='product_images/$p_img' width='100' height='100'>" ?></td>
      	<td><?php echo $p_price ?></td>
      	
      	<td><a href="delete_pro.php?delete_pro=<?php echo $p_id; ?>">Delete</a></td>
      </tr>
	<?php } ?>

      ?>
    </thead>
    <tbody>
    </tbody>
  </table>

</body>
</html>
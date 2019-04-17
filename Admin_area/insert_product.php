<?php
include("includes/db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="styles/insert.css" media="all" />
</head>

<body bgcolor="#FF9900">

<form method="post" action="insert_product.php" enctype="multipart/form-data" >

	<table align="center" width=700 style="background:#0F3">
    <tr>
    	<td colspan="2" align="center"><h1>Insert New Product</h1></td>
    </tr>
    <tr>
    	<td align="right"><h3 background="grey">Product Title</h3></td>
    	<td><input type="text" name="product_title"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Product Category</h3></td>
    	<td>
        
        <select name="product_cat">
        	<option> select a category</option>
        
        
        <?php
			$get_cats="select * from categories";
			$run_cats=mysqli_query($con,$get_cats);
			
			while($row_cats=mysqli_fetch_array($run_cats))
			{
				$cats_id=$row_cats['cat_id'];
				$cats_title=$row_cats['cat_title'];
				
				echo "<option value='$cats_id'>$cats_title</option> ";
			}
		?>
        
        </select>
        
        </td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Product Brand</h3></td>
    	<td>
        <select name="product_brand">
        	<option> select a category</option>
            <?php
				$get_brands="select * from brands";
				$run_brands=mysqli_query($con,$get_brands);
				
				while($row_brands=mysqli_fetch_array($run_brands))
				{
					$brand_id=$row_brands['brand_id'];
					$brand_title=$row_brands['brand_title'];
					
					echo "<option value='$brand_id'> $brand_title</option> ";
				}
			
			?>
            
        </select>
        </td> 
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Image 1</h3></td>
    	<td><input type="file" name="product_img1"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Image 2</h3></td>
    	<td><input type="file" name="product_img2"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Image 3</h3></td>
    	<td><input type="file" name="product_img3"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Product Price</h3></td>
    	<td><input type="text" name="product_price"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Product Description</h3></td>
    	<td><input type="text" name="product_desc"></td>
    </tr>
    <tr>
        	<td align="right"><h3 background="grey">Product Keywords</h3></td>
    	<td><input type="text" name="product_keyword"></td>
    </tr>
    
    <tr>
    	<td colspan="2" align="center"><input type="Submit" name="insert_product" value="Insert Product"></td>
    </tr>
    </table>
    </form>
</body>
</html>
<?php
	if(isset($_POST['insert_product']))
	{
		//text data variables
		$p_title=$_POST['product_title'];
		$p_cat=$_POST['product_cat'];
		$p_brand=$_POST['product_brand'];
		$p_price=$_POST['product_price'];
		$p_desc=$_POST['product_desc'];
		$p_keyword=$_POST['product_keyword'];
		$status='on';
		
		//image names
			
		$product_img1=$_FILES['product_img1']['name'];
		$product_img2=$_FILES['product_img2']['name'];
		$product_img3=$_FILES['product_img3']['name']; 

		//image temp names file server needs this temp names 
		
		$temp_name1=$_FILES['product_img1']['tmp_name'];
		$temp_name2=$_FILES['product_img2']['tmp_name'];
		$temp_name3=$_FILES['product_img3']['tmp_name'];
			
			move_uploaded_file($temp_name1,"product_images/$product_img1");
			move_uploaded_file($temp_name2,"product_images/$product_img2");
			move_uploaded_file($temp_name3,"product_images/$product_img3");
	
		$insert_product="insert into products(cat_id,brand_id,date,product_title,product_price,product_desc,status,product_img1,product_img2,product_img3) values ('$p_cat','$p_brand',NOW(),'$p_title','$p_price','$p_desc','$status','$product_img1','$product_img2','$product_img3')";
		
		
		$run_insert=mysqli_query($con,$insert_product);
		if($run_insert)
		{
			echo "<script>alert('Product inserted successfully')</script>";	
		}
}

?>
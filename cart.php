<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<html>
<head>
	<title>
		Ecommerce
	</title>
<link rel="stylesheet" href="styles/style1.css" media="all" />
</head>
<body>
	<!-- main container start -->
	<div class="main_wrapper">
		<div class="header_wrapper">		<!-- header starts  -->
			<a href="index.php"><img src="images/logo1.jpg" style="float:left;"></a>
			<img src="images/gig.gif" float="right" width="700" height="100px">
		</div>								<!-- header ends  -->
		<div id="nav_bar">					<!-- nav bar starts  -->
			<ul id="menu">
				<li><a href="index.php"> Home</a> </li>
				<li><a href="all_products.php"> All Products</a> </li>
				<li><a href="Customer/my_account.php"> My Account</a> </li>
				<li><a href="user_register.php"> Sign Up</a> </li>
				<li><a href="cart.php"> Shopping Cart</a> </li>
				<li><a href="contact.php"> Contact Us</a> </li>
			</ul>
			<div id="form">
            	<form method="get" action="results.php" enctype="multipart/form-data">
                	<input type="text" name="user_query" placeholder="search a product" />
               		<input type="submit" name="search" value="Search" />    
                </form>
            </div>	
		</div>								<!-- nav bar ends  -->
	<!-- content_wrapper starts  -->
		<div class="content_wrapper">			
		<?php  cart(); ?>
			<div id="content_right">		<!-- right_content starts  -->
				
                
                <div id="headline">
               		 <div id="headline_content">
<?php
						if(!isset($_SESSION['customer_email']))
						{
							echo "<b>Welcome Guest</b>";	
						}
						else
						{
							$mail=$_SESSION['customer_email'];
							$get_name="select * from customers where customer_email='$mail'";
							$run=mysqli_query($con,$get_name);
							while($row=mysqli_fetch_array($run))
							{
								$name=$row['customer_name'];	
							}
							echo "<b>Welcome </b>" . $name;	
						}
						?>                        <b style="color:yellow">Shopping Cart </b>
                        <span>- Items:<?php items(); ?> - Price: <?php price(); ?> 
	  <a href="index.php" id="btn" style="margin-left:5px;color:#FFF;border:1px solid #FFF;padding:8px 20px;line-height:29px;border-radius:10px;text-decoration:none;">
      Go to Shopping
      </a>
      <?php
      if(isset($_SESSION['customer_email']))
	  {
		 echo  "<a href='logout.php' id='btn' style='margin-left:5px;color:#FFF;border:1px solid #FFF;padding:8px 20px;line-height:29px;border-radius:10px;text-decoration:none;'>
      Logout
	  </a>";
	  }
	  else
	  {
		  	echo  "<a href='checkout.php' id='btn' style='margin-left:5px;color:#FFF;border:1px solid #FFF;padding:8px 20px;line-height:29px;border-radius:10px;text-decoration:none;'>
      Login
	  </a>";
	  }
	  ?>
      </span>
                	</div>
                </div>

                <div id="products_box">
                <br><br><br>
              	<form action="cart.php" method="post" enctype="multipart/form-data">
                <table width="700px"  bgcolor="#0099cc">
                	<tr align="center">
                    	<td><b>Remove</b></td>
                        <td><b>Products</b></td>
                        <td><b>Quantity</b></td>
                        <td><b>Total Price</b></td>
                    </tr>
                    <?php
					global $con;
					$ip_add=getRealIpAddr();
		$price=0;
		$get="select * from cart where ip_add='$ip_add'";
		$run=mysqli_query($con,$get);
		while($row=mysqli_fetch_array($run))
		
		{
			$id=$row['p_id'];	
			//echo $id;
			
			$get_price="select * from products where product_id=$id";
			$run_p=mysqli_query($con,$get_price);
			//echo mysqli_num_rows($run_p);
			while($p_row=mysqli_fetch_array($run_p))
			{
				$prooo_title=$p_row['product_title'];
				$prooo_img=$p_row['product_img1'];
				$prooo_price=$p_row['product_price'];
				$price=$price+$p_row['product_price'];
				
				
					?>
                	<tr align="center">
                    	<td><input type="checkbox" name="remove[]" value="<?php echo $id;?>"></td>
                    	<td><?php echo $prooo_title ;?><br><img src="Admin_area/product_images/<?php echo $prooo_img ;?>" width="80" height="80"></td>
                    	<td><input type="text" name="qty" value="" size="5"></td>
                    	<?php 
							if(isset($_POST['Update']))
							{
								$ip=getRealIpAddr();
								$qty=$_POST['qty'];
								
								$up="update cart set qty='$qty' where ip_add='$ip'";
								$r=mysqli_query($con,$up);
								
								$price= $price*$qty; 	
							}
						 ?>
                        
                        <td><?php echo " $" .$prooo_price;?></td>
                    </tr>
                    
                    <?php 
			}
		}
					?>
                    
                    <tr>
                    	<td colspan="3" align="right"><b>Sub-total </b></td>
                    	<td align="center"><b><?php echo " $" .$price;?></b></td>
                    </tr>
                    <tr></tr>
                    <tr>
                    	<td align="center"><input type="submit" name="Update" value="Update Cart"> </td>
                        <td align="center"><input type="submit" name="continue" value="Continue Shopping"> </td>
                        <td align="center"><button> <a href="checkout.php" style="text-decoration:none;color:black">Check Out</a></button></td>
                    </tr>
                    
                </table>
                
                </form>
                <?php
				function updatecart()
				{
						global $con;
					if(isset($_POST['Update']))
					{
						foreach($_POST['remove'] as $remove_id)
						{
							$del="delete from cart where p_id='$remove_id'";
							$run=mysqli_query($con,$del);
							if($run)
							{
								echo "<script>window.open('cart.php','_self')</script>";	
							}
						}
					}
					if(isset($_POST['continue']))
					{
									echo "<script>window.open('index.php','_self')</script>";	
						
					}
				}
				
				echo @$up_cart=updatecart();
				?>
                
                </div>

			</div>							<!-- right_content ends  -->

			<div id="left_sidebar">			<!-- left_sidebar starts  -->
				<div id="content_title">Categories</div>
              	<ul id="cats" style="text-align:center">
                	<?php get_cats(); ?>
                </ul>  
				<div id="content_title">Brands</div>
              	<ul id="cats" style="text-align:center">
                <?php get_brands(); ?>
                </ul>  
			</div>							<!-- left_sidebar ends  -->

		<!-- content_wrapper ends  -->
		
		<div class="footer">
			<h1 style="text-align:center">&copy; 2019- By WKS Developers</h1>
		</div>
	
	
	
	
	</div>
	<!-- main container ends -->

</body>

</html>
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
				<li><a href="customer_register.php"> Sign Up</a> </li>
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
						?>
                        
                        
                        <b style="color:yellow">Shopping Cart </b>
                        <span>- Items:<?php items(); ?> - Price: <?php price(); ?> 
	  <a href="cart.php" id="btn" style="margin-left:5px;color:#FFF;border:1px solid #FFF;padding:8px 20px;line-height:29px;border-radius:10px;text-decoration:none;">
      Go to Cart
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
              	<?php 
		$get_products = "SELECT * from products ";
					$run_roducts= mysqli_query($con,$get_products);
					
					while($row_products= mysqli_fetch_array($run_roducts))
					{
						$pro_id=$row_products['product_id'];
						$pro_title=$row_products['product_title'];
						$pro_car=$row_products['cat_id'];
						$pro_brand=$row_products['brand_id'];
						$pro_desc=$row_products['product_desc'];
						$pro_image=$row_products['product_img1'];
						$pro_price=$row_products['product_price'];
						
						echo "
						
						<div id='single_prod'>
						<h3>$pro_title</h3>		
						
						<img src='Admin_area/product_images/$pro_image' width='180px' height='180px'>	<br>
						<p><b>Price: $ $pro_price</b></p>
						
						
						<a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
						
						<a href='index.php?add_cart=$pro_id' style='float:right'><button>Add to Cart</button></a>				
						
						</div>
						";
						
					}	
						?>
                </div>

			</div>							<!-- right_content ends  -->

			<div id="left_sidebar" >			<!-- left_sidebar starts  -->
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
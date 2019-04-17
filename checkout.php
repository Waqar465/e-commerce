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

                <div>
              	<?php 
				if(!isset($_SESSION['customer_email']))
				{
				include("Customer/customer_login.php");		
				}
				else
				{
				include("payment_options.php");	
				}
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
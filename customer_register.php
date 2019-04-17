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
				<li><a href="my_account.php"> My Account</a> </li>
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
                		<b>Welcome Guest!</b>
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
    				 <form action="customer_register.php" method="post" enctype="multipart/form-data" >
                     <table width="700px" align="center">
                     	<tr align="center">
                        	<td colspan="8"><h2>Create and account</h2></td>
                        </tr>
                     	<tr>
                        	<td align="right"><b>Customer Name</b></td>
                        	<td><input type="text" name="c_name" required></td>
                        </tr>
                       	<tr>
                        	<td align="right"><b>Email</b></td>
                        	<td><input type="text" name="c_email" required></td>
                        </tr>
                        <tr>
                        	<td align="right"><b>Customer Password</b></td>
                        	<td><input type="text" name="c_pass" required></td>
                        </tr>
                      	<tr>
                        	<td align="right"><b>Country</b></td>
                        	<td>
                            	<select name="c_country">
                            	<option>Pakistan</option>
                            	<option>US</option>
                            	<option>CHINA</option>
                            	<option>Bangla</option>
                            	<option>Dubai</option>
                            
                            	</select>
                            </td>
                        </tr>                     	
                        <tr>
                        	<td align="right"><b>Customer City</b></td>
                        	<td><input type="text" name="c_city" required></td>
                        </tr>
                       	<tr>
                        	<td align="right"><b>Customer Mobile Number</b></td>
                        	<td><input type="text" name="c_contact" required></td>
                        </tr>
                                             	<tr>
                        	<td align="right"><b>Customer Address</b></td>
                        	<td><input type="text" name="c_address" required></td>
                        </tr>
                                             	<tr>
                        	<td align="right"><b>Customer Image</b></td>
                        	<td><input type="file" name="c_image" required></td>
                        </tr>
                        <tr align="center">
                        	<td colspan="8"><input type="submit" name="register" value="Submit"></td>
                        </tr>
                     </table>
                     
                     
                     </form>        	
                                 
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


<?php
	if(isset($_POST['register']))
	{
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_pass=$_POST['c_pass'];
		$c_country=$_POST['c_country'];
		$c_city=$_POST['c_city'];
		$c_name=$_POST['c_name'];
		$c_contact=$_POST['c_contact'];
		$c_address=$_POST['c_address'];
		$c_image=$_FILES['c_image']['name'];
		$c_image_tmp=$_FILES['c_image']['tmp_name'];
		$ip=getRealIpAddr();
		$insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,cutomer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$ip')";
		$run=mysqli_query($con,$insert_customer);
		move_uploaded_file($c_image_tmp,"Customer/customer_photos/$c_image");
		
		$check_cart="select * from cart where ip_add='$ip'";
		$run_cart=mysqli_query($con,$check_cart);
		$count_cart= mysqli_num_rows($run_cart);
		
		if($count_cart>0)
		{
		$_SESSION['customer_email']=$c_email;
		
			echo "<script>alert('Account Created Successfully')</script>";
						echo "<script>window.open('checkout.php','_SELF')</script>";	
		}
		
		else
		{
					$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Account Created Successfully. Start Shopping')</script>";
						echo "<script>window.open('index.php','_SELF')</script>";	
			
		}
		
		
	}
?>
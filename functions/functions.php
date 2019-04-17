<?php
include("includes/db.php");
// getting the IP address.
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getproducts()
{
	global $con;
		if(!isset($_GET['cat']))
		{
			
			if(!isset($_GET['brand']))
			{
						$get_products = "SELECT * from products order by rand() LIMIT 0,6";
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
}
		}
}


function getcatPro()
{
	global $con;
		if(isset($_GET['cat']))
		{
		$cat_id=$_GET['cat'];	
		$get_products = "SELECT * from products where cat_id=$cat_id";
		$run_roducts= mysqli_query($con,$get_products);
					$count=mysqli_num_rows($run_roducts);
					if($count==0)
					{
						echo "<h1>No product Found for this Category</h1>";
					}					
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
}
		}

function getbrandPro()
{
	global $con;
		if(isset($_GET['brand']))
		{
		$b_id=$_GET['brand'];	
		$get_products = "SELECT * from products where brand_id=$b_id";
		$run_roducts= mysqli_query($con,$get_products);
					$count=mysqli_num_rows($run_roducts);
					if($count==0)
					{
						echo "<h1>No product Found for this brand</h1>";
					}
					
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
}
		}



function get_cats()
{
	global $con;
                    $get_cats="select * from categories";
					$run_cats=mysqli_query($con,$get_cats);
					
					while($row_cats=mysqli_fetch_array($run_cats))
					{
					$cat_id=$row_cats['cat_id'];
					$cat_title=$row_cats['cat_title'];

					echo"<li><a href='index.php?cat=$cat_id' >$cat_title</a></li>";
					}	
}
function get_brands()
{
	global $con;	$get_brands="select * from brands";
					$run_brands=mysqli_query($con,$get_brands);
					
					while($row_brands=mysqli_fetch_array($run_brands))
					{
							$brand_id=$row_brands['brand_id'];
							$brand_title=$row_brands['brand_title'];
                	echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
					
					}
					
}
//creating the script for cart
function cart()
{
	if(isset($_GET['add_cart']))
	{
		global $con;
		$ip_add=getRealIpAddr();
		$p_id=$_GET['add_cart']; 
			
			$cart="select * from cart where p_id='$p_id' AND ip_add='$ip_add'";
		$run=mysqli_query($con,$cart);
		
		if(mysqli_num_rows($run)>0)
		{
			echo "";	
		}
		else
		{
			$c= "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
			$run_c=mysqli_query($con,$c);	
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

//getting number of items from cart

function items()
{
	
		$ip_add=getRealIpAddr();
	global $con;
	if(isset($_GET['add_cart']))
	{
		
		$get="select * from cart where ip_add='$ip_add'";
		$run=mysqli_query($con,$get);
		$item=mysqli_num_rows($run);
			
			echo $item;
	}
	else
	{
	$get="select * from cart where ip_add='$ip_add'";
		$run=mysqli_query($con,$get);
		$item=mysqli_num_rows($run);
							echo $item;
	}
}


//getting price of items from cart

function price()
{
	global $con;
	if(isset($_GET['add_cart']))
	{
		$ip_add=getRealIpAddr();
	
		$price=0;
		$get="select * from cart WHERE ip_add='$ip_add'";
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
				$price=$price+$p_row['product_price'];
				
			}
		}
		echo " <b>$</b>" . $price;	
	}
	else
	{	$ip_add=getRealIpAddr();
	
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
				$price=$price+$p_row['product_price'];
				
			}
		}
		echo " <b>$</b>" . $price;
	}
}


?>
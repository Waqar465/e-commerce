<?php

include("includes/db.php");
include("functions/functions.php");

//getting customer id

if(isset($_GET['customer_id']))
{
	$c_id=$_GET['customer_id'];
}
//getting product price and total numbers
	$ip_add=getRealIpAddr();
	
		$price=0;
		$status='pending';
		$invoice=mt_rand();
		$get="select * from cart WHERE ip_add='$ip_add'";
		$run=mysqli_query($con,$get);
		$count_pro=mysqli_num_rows($run);
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
//Getting quantity from the cart

$get_cart="select * from cart where ip_add='$ip_add'";
$r=mysqli_query($con,$get_cart);

$get_qty=mysqli_fetch_array($r);
$qty=$get_qty['qty'];
if($qty==0)
{
	$qty=1;
	$price=$price;	
}
else{
	$qty=$qty;
	$price=$price*$qty;
		
}

$insert_order="insert into customer_orders (customer_id,due_amount,invoice_no,total_products,order_date,order_status) values ('$c_id','$price','$invoice','$count_pro',NOW(),'$status')";
$runnn=mysqli_query($con,$insert_order);
if($runnn)
{
echo "<script>alert('Order Successfully Submitted, Thanks!')</script>";


echo "<script>window.open('Customer/my_account.php','_self')</script>";	
$insert_into_pending="insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values ('$c_id','$invoice','$id','$qty','$status')";
$rrr=mysqli_query($con,$insert_into_pending);
if(!$rrr)
{
echo "<script>alert('errrosr')</script>";
	
}

$empty="delete from cart where ip_add='$ip_add'";
$run_em=mysqli_query($con,$empty);
}


?>
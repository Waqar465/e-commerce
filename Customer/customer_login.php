<?php
@session_start();
include("includes/db.php");

 
?>
<div align="center">
	<form action="checkout.php" method="post" >
    	<table width="50%" bgcolor="#66CCCC" align="center">

	<tr align="center">     <td colspan="3">   <h2>Login or Register</h2></td> 
 </tr>
        <tr>
 			<td align="right"><b>Your email</b></td>
 			<td><input	type="text" name="c_email" placeholder="Enter your email"></td>
        </tr>
        <tr>
        	<td align="right">
				<b>Your Password</b>
        	</td>
        	<td>
        		<input type="password" name="c_pass" 	placeholder="Enter your password">
       		</td> 
        </tr>
        <tr align="center">
        	<td colspan="3">
            	<a href="checkout.php?forgot_pass" >Forgot Password</a>
            </td>
        </tr>
       <tr align="center">
       		<td colspan="3"><input type="submit" name="c_login" value="Login"></td>
       </tr>
       </table>

    </form>
    <br>
    <?php
    	if (isset($_GET['forgot_pass'])) {
    		echo "
    		<form action='' method='post'>
    			<div align='center'><b>Enter your email : </b>
				<input type='email' name='c_email' placeholder='enter your email' /> <br>	
				<input type='submit' name='forgot' value='send me password'/> 	
    			</div>
    			</form>
    		";
    		if (isset($_POST['forgot'])) {
    			$c_email=$_POST['c_email'];
    			$c="select * from customers where customer_email='$c_email'";
    			$r=mysqli_query($con,$c);
    			$ch=mysqli_num_rows($r);
    			$row=mysqli_fetch_array($r);
    			$c_name=$row['customer_name'];
				$c_pass=$row['customer_pass'];
    			if($ch==0)
    			{
    				echo "<script>alert('email doesnot exists in our database.')</script>";
    			}
    			else 
    				 ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    				$from='admin@wks_companies.com';
    				$headers = "From:" . $from;
    				$subject='Your passwords';
    				$message="
    				<html>
    					<b>dear $c_name</b>
    					<p>You requested for your password at www.wks_companies.com</p>
    					<h3>YOur password is <span style='color:red;'>$c_pass</span></h3>
    				</html>


    				";
    				mail($c_email, $subject, $message,$headers);
    		}
    	}

    ?>
           <h2 style="float:right;padding:10px;text-decoration:none;"><a href="customer_register.php" style="text-decoration:none;">Register Here</a></h2>
       
</div>

<?php
	if(isset($_POST['c_login']))
	{
		$user_mail=$_POST['c_email'];
		$user_pass=$_POST['c_pass'];
		
		$check_user="select * from customers where customer_email='$user_mail' AND customer_pass='$user_pass'";
		$run_check=mysqli_query($con,$check_user);
		$check_customer=mysqli_num_rows($run_check);
		
		$get_ip= getRealIpAddr();
		
		$sel_cart="select * from cart where ip_add='$get_ip'";
		$run_cart=mysqli_query($con,$sel_cart);
		
		$check_cart= mysqli_num_rows($run_cart);
		
			if($check_customer==0)
			{
					echo "<script>alert('Password or Email is not correct.')</script>";
					exit();
			}
			if($check_customer==1 AND $check_cart==0)
			{		
				$_SESSION['customer_email']=$user_mail;
				
				echo "<script>window.open('my_account.php','_self')</script>";
						
			}
			else
			{
				$_SESSION['customer_email']=$user_mail;
				include("payment_options.php");				
			}
	}

?>
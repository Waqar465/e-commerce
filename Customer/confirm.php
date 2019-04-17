<?php
session_start();
include("includes/db.php");
if(isset($_GET['order_id']))
{
	$O_ID=$_GET['order_id'];	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#000000">
<form action="confirm.php?up_id=<?php echo $O_ID; ?>" method="post">
<table width="500" align="center" border="2px" bgcolor="#00FF99">
	<tr align="center">
    	<td colspan="5">
        <h2>Please confirm your payment</h2>
        </td>
    	
    </tr>
    <tr>
    	<td align="right">Invoice Number</td>
        <td><input type="text" name="invoice" /> </td>
    
    </tr>
        <tr>
    	<td align="right">Amount Sent</td>
        <td><input type="text" name="amount" /> </td>
    
    </tr>
        <tr>
    	<td align="right">Payment Method</td>
        <td>
        	<select name="payment">
            	<option>Bank Transfer</option>
                <option>Easypaisa</option>
                <option>Western Union</option>
                <option>Paypal</option>
                
            </select>
            
         </td>
    
    </tr>
    <tr>
    	<td align="right">Transaction Reference</td>
        <td><input type="text" name="tr" /> </td>
    
    
    </tr>
    <tr>
    	<td align="right">Easypaisa/ublomni code
        </td>
        <td><input type="text" name="code" /> </td>
    
    
    </tr>
    <tr>
    	<td align="right">Payment Date</td>
        <td><input type="text" name="date" /> </td>
    
    
    </tr>
        <tr align="center">
    	<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/> </td>
    
    </tr>


</table>
</form>

</body>
</html>

<?php

if(isset($_POST['confirm']))
{
	$up_id=$_GET['up_id'];
	$invoice=$_POST['invoice'];
	$amount=$_POST['amount'];
	$payment=$_POST['payment'];
	
	$tr=$_POST['tr'];
	$code=$_POST['code'];
	$date=$_POST['date'];
	
	$insert="insert into payments(invoice_no,amount,payment_mode,ref,code,payment_date) values ('$invoice','$amount','$payment','$tr','$code','$date')";	
	$run=mysqli_query($con,$insert);
	
	if($run)
	{
		echo "<h2 style='text-align:center;color:white;'> Payment Recieved</h2>";	
	}
	$com='Complete';
	$update="update customer_orders set order_status='$com' where order_id='$up_id'";
	$r=mysqli_query($con,$update);
	
}


?>
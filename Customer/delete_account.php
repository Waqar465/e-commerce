<form action="" method="post">
<table>
<tr align="center">
	<td colspan="3">
 <h1>   Do you realy want to delete your account </h1>
    </td>
</tr>

<tr align="center">
	<td >
		<input type="submit" name="yes" value="Yes I want to delete account">
        
    </td>
    <td >
		<input type="submit" name="no" value="No I Don't want to delete account">
        
    </td>
</tr>

</table>
</form>

<?php
include("includes/db.php");
$c=$_SESSION['customer_email'];

if(isset($_POST['yes']))
{
	$del="delete from customers where customer_email='$c'";
	$r=mysqli_query	($con,$del);
	if($r)
	{
		session_destroy();
	echo "<script>window.open('../index.php','_self')</script>";	
	}
	
}

if(isset($_POST['no']))
{
	echo "<script>window.open('my_account.php','_self')</script>";	
	
}

?>
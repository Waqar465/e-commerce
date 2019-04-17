<?php
include("includes/db.php");


?>
<form action="" method="post">
<table>
	<tr align="right">
    	<td>Enter new Password</td>
        <td><input type="password" name="p1"></td>
    </tr>
    	<tr align="right">
    	<td>Confirm Password</td>
        <td><input type="password" name="p2"></td>
    </tr>
    <tr align="center">
    <td colspan="3"><input type="submit" name="submit" value="change"></td>
    </tr>
</table>
</form>

<?php
$c=$_SESSION['customer_email'];
if(isset($_POST['submit']))
{
	$pp1=$_POST['p1'];
	$pp2=$_POST['p2'];
	if($pp1==$pp2)
	{
		$update="update customers set customer_pass='$pp1' where customer_email='$c'";
		$run=mysqli_query($con,$update);
		if($run)	
		{
			echo "<script>alert('Password is changed')</script>";
			echo "<script>window.open('my_account.php','_self')</script>";
				
		}
	}
			
}

?>
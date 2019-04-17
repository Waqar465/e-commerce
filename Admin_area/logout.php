<?php
session_start();	
session_destroy();

echo "<script>window.open('login.php?logged_out=You Successfully Loged Out ','_self')</script>";
?>
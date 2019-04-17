<?php
session_start();
if(!isset($_SESSION['admin_email']))
{
	echo "<script>window.open('login.php','_self')</script>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Dashboard an Admin Panel </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
					<!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span class="dashboard_text">Design dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="index.php?dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="index.php?insert_product">
                <span>Insert New Product</span>
                </a>
                </li>
                 <li class="treeview">
                <a href="index.php?view_product">
                <span>View All Products</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?insert_category">
                <span>Insert New Category</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?view_category">
                <span>View All Category</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?insert_brand">
                <span>Insert New Brands</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?view_brand">
                <span>View All Brands</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?view_customer">
                <span>View Customers</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="index.php?view_order">
                <span>View Orders</span>
                </a>
                </li>
				  <li class="treeview">
                <a href="logout.php">
                <span>Admin Logout</span>
                </a>
                </li>
                </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">4</span></a>
							
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
						</li>	
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">8</span></a>
						</li>	
					</ul>
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				<!--search-box-->
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><img src="images/2.jpg" alt=""> </span> 
									<div class="user-name">
										<p><?php 			 echo $email=$_SESSION['admin_email'];  ?></p>
										<span>Administrator</span>
									</div>
									</div>	
							</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				
			<?php
			include("includes/db.php");
				if(isset($_GET['dashboard']))
				{
					echo '<h2 class="jumbotron" align="center" style="background: #ccff66;">Welcome Admin You can Do alot of stuff!<br>Lets get started</h2>';

				}
				if(isset($_GET['insert_product']))
				{
					include("insert_product.php");
				}
				if(isset($_GET['view_product']))
				{
					include("view_product.php");
				}
				if(isset($_GET['view_category']))
				{
					include("view_cats.php");
				}
				if(isset($_GET['view_brand']))
				{
					include("view_brands.php");
				}
				if(isset($_GET['insert_brand']))
				{
					include("insert_brand.php");
				}
				if(isset($_GET['insert_category']))
				{
					include("insert_category.php");
				}

				if(isset($_GET['view_customer']))
				{
					include("view_customer.php");
				}
				if(isset($_GET['view_order']))
				{
					include("view_orders.php");
				}
			?>
			</div>
	<!--footer-->
	<div class="footer">
	   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://www.upwork.com/freelancers/~018394e94268ec2e59" target="_blank">WKS Companies</a></p>		
	</div>
    <!--//footer-->
	</div>
		
	<!-- new added graphs chart js-->
	
	
</body>
</html>
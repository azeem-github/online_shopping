<?php 
 //session_start();
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> E-Commerce</title>
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head><!--/head-->

<body>
<style>
.mainmenu ul li a:hover, .mainmenu ul li a.active, .shop-menu ul li a.active {
    color: #25a9dd;	 
}
.navbar-nav li ul.sub-menu li a:hover {
    color: #83EEFF;
}
/* .dropdown ul.sub-menu li .active {
    color: #25a9dd;
    padding-left: 0;
} */
.shop-menu ul li a:hover {
    color: dodgerblue;
    background: #fff;
}
</style>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<!-- <li><a href="#"><i class="fa fa-phone"></i></a></li> -->
								<!-- <li><a href="#"><i class="fa fa-envelope"></i> </a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<!-- <ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul> -->
						</div>
					</div>
				</div>
			</div> 
		</div><!--/header_top-->
		

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-12 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<!-- <?php$count = 0;
								if(isset($_SESSION['cart'])){
									$count = count($_SESSION['cart']);
								}
								?> -->
									<!-- <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Cart</a></li> -->
									<li><a href="cart.php">Cart</a></li>
									
<?php $num_items_in_cart= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; 


?>

<!-- <li><a href="login.php"><i class="fa fa-lock"></i> Logout</a></li> -->
<li><a href="login.php"> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php"><b>Home</b></a></li>
								<li class="dropdown"><a href="#"><b>Shop</b></a>
								<!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a> -->
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<li><a href="product-details.php">Product Details</a></li> 
										<li><a href="checkout.php">Checkout</a></li> 
										<li><a href="cart.php">Cart</a></li>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#"><b>Blog</b></a>
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a> -->
                                    <ul role="menu" class="sub-menu">
                                        <!-- <li><a href="blog.php" class="active">Blog List</a></li> -->
													 <li><a href="blog.php">Blog List</a></li>
										<li><a href="blog-single.php">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="contact-us.php"><b>Contact</b></a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div> -->
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

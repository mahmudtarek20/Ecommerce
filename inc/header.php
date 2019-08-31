<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<title>Eshop a Flat E-Commerce Bootstrap Responsive Website Template | Home :: w3layouts</title>
		<link rel='stylesheet' href="css/bootstrap.css" type='text/css' />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<link href="css/component.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- header-section-starts -->
		<div class="header">
			<div class="header-top-strip">
				<div class="container">
					<div class="header-top-left">
						<ul>
							<?php if (isset($_SESSION['username'])) {?>
								<li><a href="account.php"><span class="glyphicon glyphicon-user"> </span><?php echo $_SESSION['name'] ?></a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-lock"> </span>Logout</a></li>
							<?php }elseif(isset($_SESSION['admin'])){?>
							<li><a href="admin"><span class="glyphicon glyphicon-user"> </span>Dashboard</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-lock"> </span>logout</a></li>
							<?php	}else{?>
							<li><a href="account.php"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
							<li><a href="register.php"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>
							<?php	} ?>
						</ul>
					</div>
					<div class="header-right">
						<div class="cart box_1">
							<form action="result.php" class="navbar-form" role="search" method="GET">
							    <div class="input-group add-on">
							      <input type="text" name="q" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
							      <div class="input-group-btn">
							        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							      </div>
							    </div>
							  </form>
							<a href="cart.php">
								<h3> <img src="images/bag.png" alt="">
									<span id="cart_number">
								<?php if (!isset($_SESSION['cart'])) {
									echo "Empty cart";
								}else{
									echo count($_SESSION['cart']).' Item';
									} ?>
									</span>
								</h3>
							</a>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- header-section-ends -->
		<div class="banner-top">
			<div class="container">
				<?php require 'nav.php'; ?>
				<!--/.navbar-->
			</div>
		</div>
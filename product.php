
<?php require 'connection.php';
require 'inc/header.php';
require 'partials/shop.php';

if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
$msg=array();
if ($_POST) {
	$rating=$_POST['ratings'];
	$comment=$_POST['comment'];
	$username=$_SESSION['username'];
	$review_date=date('Y-m-d');
	$sql="INSERT INTO review(review_id,products_id,username,ratings,comments,review_date) VALUES (NULL,'$id','$username','$rating','$comment','$review_date')";
	if (mysqli_query($con,$sql)) {
		$msg[]="Review is added successfully";
	}else{
		$msg[]="Review is not added";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Eshop a Flat E-Commerce Bootstrap Responsive Website Template | Single :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Custom Theme files -->
		<link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		        
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfont-->
		<!-- for bootstrap working -->
		<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
		<!-- //for bootstrap working -->
		<!-- cart -->
		<script src="js/simpleCart.min.js"> </script>
		<!-- cart -->
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<style>
			@media (max-width: 767px)
		.hidden-xs {
		    display: block !important;
		}
		</style>
	</head>
	<body>
		<!-- header-section-starts -->
		
		<!-- header-section-ends -->
		<div class="inner-banner">
			<div class="container">
				<div class="banner-top inner-head">
					
					<!--/.navbar-->
				</div>
			</div>
		</div>
		<!-- content-section-starts -->
		<div class="container">
			<div class="products-page">
				<div class="products">
					<?php require 'inc/left-sidebar.php'; ?>
					<div class="latest-bis">
						<img src="images/l4.jpg" class="img-responsive" alt="" />
						<div class="offer">
							<p>40%</p>
							<small>Top Offer</small>
						</div>
					</div>
				</div>
				<div class="new-product">
					<?php $sql="SELECT * FROM products JOIN brand JOIN category WHERE products_id='$id' AND brand.brand_name=products.products_brand AND category.cat_name=products.products_cat";
									if ($result=mysqli_query($con,$sql)) {
					while ($row=mysqli_fetch_assoc($result)) {?>
					<div class="col-md-5 zoom-grid">
						<div class="flexslider">
							<ul class="slides">
								
								<li data-thumb="images/si.jpg">
									<div class="thumb-image"> <img src="admin/<?php echo $row['products_image']; ?>" data-imagezoom="true" class="img-responsive" alt="" /> </div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-7 dress-info">
						<div class="dress-name">
							<h3><?php echo $row['products_title']; ?></h3>
							<span>৳ <?php echo $row['products_price']; ?></span>
							<div class="clearfix"></div>
							<p><?php echo $row['products_desc']; ?></p>
						</div>
						<div class="span span1">
							<p class="left">Brand</p>
							<p class="right"><?php echo $row['brand_name']; ?></p>
							<div class="clearfix"></div>
						</div>
						<div class="span span2">
							<p class="left">Category</p>
							<p class="right"><?php echo $row['cat_name']; ?></p>
							<div class="clearfix"></div>
						</div>
						<div class="span span3">
							<p class="left">Average ratings</p>
							<p class="right"><?php $review="SELECT AVG(ratings) FROM review WHERE products_id='$id'";
							if ($rev_rst=mysqli_query($con,$review)) {
								while ($rev_row=mysqli_fetch_array($rev_rst)) {
									if ($rev_row[0]==4) {
										for ($i=0; $i < $rev_row[0]; $i++) {
										echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
									}elseif ($rev_row[0]>4 && $rev_row[0]<5) {
										for ($i=0; $i < 4; $i++) { 
											echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
										echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
									}elseif ($rev_row[0]>3 && $rev_row[0]<4) {
										for ($i=0; $i < 3; $i++) { 
											echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
										echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
									}elseif ($rev_row[0]>2 && $rev_row[0]<3) {
										for ($i=0; $i < 2; $i++) { 
											echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
										echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
									}elseif ($rev_row[0]>1 && $rev_row[0]<2) {
										for ($i=0; $i < 1; $i++) { 
											echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
										echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
									}
								}
							 } ?></p>
							<div class="clearfix"></div>
						</div>
						
						<div class="purchase">
							<button class="cbp-vm-icon cbp-vm-add item_add" onclick="addToCart(<?php echo $id; ?>,<?php echo $row['products_price']; ?>)">Add to cart</button>
							<div class="social-icons">
								<ul>
									<li><a class="facebook1" href="#"></a></li>
									<li><a class="twitter1" href="#"></a></li>
									<li><a class="googleplus1" href="#"></a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
						<script src="js/imagezoom.js"></script>
						<!-- FlexSlider -->
						<script defer src="js/jquery.flexslider.js"></script>
						<script>
							// Can also be used with $(document).ready()
							$(window).load(function() {
							$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
							});
							});
						</script>
					</div>
					<div class="clearfix"></div>
					
					<div class="reviews-tabs">
						<!-- Main component for a primary marketing message or call to action -->
						<ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
							<li class="test-class active"><a href="">Reviews</a></li>
						</ul>
						<div class="tab-content responsive hidden-xs hidden-sm">
							
							
							<div class="response">
								<?php $sql="SELECT * FROM review AS r JOIN products AS p JOIN customer AS c WHERE r.products_id=p.products_id AND r.username=c.username AND p.products_id='$id'";
								if ($result=mysqli_query($con,$sql)) {
								while ($row=mysqli_fetch_assoc($result)) { ?>
								<div class="media response-info">
									<div class="media-left response-text-left">
										<a href="#">
											<img class="media-object" src="images/icon1.png" alt="" />
										</a>
										<h5><a href="#"><?php echo $row['username']; ?></a></h5>
									</div>
									<div class="media-body response-text-right">
										<p><i>Rating: </i><?php for ($i=0; $i < $row['ratings']; $i++) {
											echo ' <i class="fa fa-star" aria-hidden="true"></i>';
										}
										$i=0; ?></p>
										<p><i>Comments: </i><?php echo $row['comments']; ?></p>
										<ul>
											<li><?php echo $row['review_date']; ?></li>
											
										</ul>
									</div>
									<hr>
									<div class="clearfix"> </div>
								</div>
								<?php	}
								} ?>
							</div>
							
						</div>
					</div>
					<div class="comment-form">
						<p><?php foreach ($msg as $key => $value) {
							echo $value;
						} ?></p>
						<?php if (isset($_SESSION['username'])) { ?>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="POST">
							<div class="form-group">
								<label for="rating">Select a rating</label>
								<select name="ratings" id="rating" class="form-control">
								<option value="0">Select rating</option>
								<option value="5">Excellent</option>
								<option value="4">Best</option>
								<option value="3">Good</option>
								<option value="2">Average</option>
								<option value="1">Bad</option>
							</select>
							</div>
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea name="comment" id="comment" class="form-control" placeholder="Write your comment" rows="8"></textarea> 
							</div>
							<button class="btn btn-primary">Submit</button>
						</form>
					<?php	}else{
						echo '<h3 class="text-danger">* <a href="account.php">Login</a> to add a comment</h3>';
						} ?>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>

		</div>
		<div class="other-products products-grid">
			<div class="container">
				<header>
					<h3 class="like text-center">Related Products</h3>
				</header>
				<?php
				$cat=$row['cat_name'];
				$sql="SELECT * FROM products WHERE products_cat='$cat' AND products_id!='$id'";
				if ($result=mysqli_query($con,$sql)) {
				while ($row=mysqli_fetch_assoc($result)) { ?>
				<div class="col-md-4 product simpleCart_shelfItem text-center">
					<a href="product.php?id=<?php echo $row['products_id']; ?>"><img src="admin/<?php echo $row['products_image']; ?>" alt="" /></a>
					<div class="mask">
						<a href="product.php?id=<?php echo $row['products_id']; ?>">Quick View</a>
					</div>
					<a class="product_name" href="product.php?id=<?php echo $row['products_id']; ?>"><?php echo $row['products_title']; ?></a>
					<p><a class="item_add" href="#"><i></i> <span class="item_price"><?php echo $row['products_price']; ?></span></a></p>
				</div>
				
				<?php 	}
				} ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<?php	}
		} ?>
		<!-- content-section-ends -->
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>JOIN OUR MAILING LIST</h6>
					<div class="sub-left-right">
						<form>
							<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" value="SUBSCRIBE" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<?php require 'inc/footer.php'; ?>
		<script src="js/responsive-tabs.js"></script>
		<script type="text/javascript">
		$( '#myTab a' ).click( function ( e ) {
		e.preventDefault();
		$( this ).tab( 'show' );
		} );
		$( '#moreTabs a' ).click( function ( e ) {
		e.preventDefault();
		$( this ).tab( 'show' );
		} );
		( function( $ ) {
		// Test for making sure event are maintained
		$( '.js-alert-test' ).click( function () {
		alert( 'Button Clicked: Event was maintained' );
		} );
		fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
		} )( jQuery );
		</script>
	</body>
	<script>
	function addToCart(id, price){
		if (id!=null && price!=null) {
			var xmlHttp=new XMLHttpRequest();
		    xmlHttp.open("GET","ajax_action/cart.php?id="+id+"price="+price, false);
		    xmlHttp.send(null);
		    document.getElementById('cart_number').innerHTML=xmlHttp.responseText;
		}else{
			alert("Id Undefined");
		}
  }
</script>
</html>
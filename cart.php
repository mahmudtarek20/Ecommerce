<?php require 'inc/header.php'; 
?>
		<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Cart
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php">Back to Home Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			  <?php if (isset($_SESSION['cart'])) { ?>
			   <h2>MY SHOPPING BAG (<?php echo count($_SESSION['cart']); ?>)</h2>
			 <?php
			 foreach ($_SESSION['cart'] as $key => $value) {
			 	$sql="SELECT * FROM products WHERE products_id='$value'";
			 	if ($result=mysqli_query($con,$sql)) { ?>
			 		<form action="checkout.php" method="POST">
			 			
			 	<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
			 		<input type="hidden" name="product_id" value="<?php echo $row['products_id']; ?>">
		<div class="cart-gd">
				<script>$(document).ready(function() {
					$('.close1').on('click', function(){
						$('.cart-header').fadeOut('slow', function(){
							$('.cart-header').remove();
						});
						});	  
					});
			   </script>
			 <div class="cart-header">
				 <div class="close1"> </div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="admin/<?php echo $row['products_image']; ?>" class="img-responsive" alt="">
						</div>
					   <div class="cart-item-info">
						<h3><a href="product.php?id=<?php echo $row['products_id']; ?>"> <?php echo $row['products_title']; ?> </a><span>Pickup time:</span></h3>
						<input type="hidden" name="products_title" value="<?php echo $row['products_title']; ?>">
						
							 <div class="delivery">
							 <p>Total price : <?php echo $row['products_price']; ?></p>
							 <input type="hidden" name="price" value="<?php echo $row['products_price']; ?>">
							 <span>Delivered in 3 to 5 days when you ordered</span>
							 <div class="clearfix"></div>
				        </div>	
				        <p>Number of product: <input type="number" name="product_amount" value="1"></p>
					   </div>
					   <button class="btn btn-primary btn-lg pull pull-right">Proceed to checkout</button>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			 
			  
		</div>
			 	<?php	}
			 	} ?>
			 		</form>
			<?php }
			  ?>
			<?php  }else{
				echo "<h1>Your cart is empty. Go to <a href='shop.php'>shop</a></h1>";
				} ?>
	</div>
</div>

<!-- //checkout -->	
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
</body>
</html>
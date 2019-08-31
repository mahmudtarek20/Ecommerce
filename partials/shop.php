<?php 
/**
* 
*/
class Shop
{
	
	function __construct()
	{
	}
	function filter_by_price($con,$low,$high){ ?>
<?php

$sql="SELECT * FROM products WHERE products_price >= '$low' AND products_price <= $high ORDER BY products_id DESC";
$result=mysqli_query($con,$sql);
if ($result->num_rows) {
	echo '<ul>';
while ($row=mysqli_fetch_assoc($result)) { ?>
<li>
	<a class="cbp-vm-image" href="product.php?id=<?php echo $row['products_id']; ?>">
		<div class="simpleCart_shelfItem">
			<div class="view view-first">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="admin/<?php echo $row['products_image']; ?>" class="img-responsive" alt=""/>
						<div class="mask">
							<div class="info">Quick View</div>
						</div>
						<div class="product_container">
							<div class="cart-left">
								<p class="title"><?php echo $row['products_title']; ?></p>
							</div>
							<div class="pricey"><span class="item_price">৳ <?php echo $row['products_price'];?></span></div> 
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<button class="cbp-vm-icon cbp-vm-add item_add" onclick="addToCart(<?php echo $row['products_id']; ?>,<?php echo $row['products_price']; ?>)">Add to cart</button>
	</div>
</li>
<?php	}
echo "</ul>";
}else{
	echo "<h3>No product found! :)</h3>";
} ?>

<?php }
function category_based($con,$cat){ ?>
		<ul>
<?php

$sql="SELECT * FROM products JOIN category WHERE category.cat_name=products.products_cat AND category.cat_id='$cat' ORDER BY products_id DESC";
if ($result=mysqli_query($con,$sql)) {
while ($row=mysqli_fetch_assoc($result)) { ?>
<li>
	<a class="cbp-vm-image" href="product.php?id=<?php echo $row['products_id']; ?>">
		<div class="simpleCart_shelfItem">
			<div class="view view-first">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="admin/<?php echo $row['products_image']; ?>" class="img-responsive" alt=""/>
						<div class="mask">
							<div class="info">Quick View</div>
						</div>
						<div class="product_container">
							<div class="cart-left">
								<p class="title"><?php echo $row['products_title']; ?></p>
							</div>
							<div class="pricey"><span class="item_price">৳ <?php echo $row['products_price'];?></span></div> 
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<button class="cbp-vm-icon cbp-vm-add item_add" onclick="addToCart(<?php echo $row['products_id']; ?>,<?php echo $row['products_price']; ?>)">Add to cart</button>
	</div>
</li>
<?php	}
} ?>

</ul>
	<?php }	//Category based

	function defaultShop($con){ ?>
		<ul>
		<?php $sql="SELECT * FROM products ORDER BY products_id DESC";
		if ($result=mysqli_query($con,$sql)) {
			while ($row=mysqli_fetch_assoc($result)) { ?>
			<li>
			<a class="cbp-vm-image" href="product.php?id=<?php echo $row['products_id']; ?>">
				<div class="simpleCart_shelfItem">
			  <div class="view view-first">
	   		  <div class="inner_content clearfix">
				<div class="product_image">
					<img src="admin/<?php echo $row['products_image']; ?>" class="img-responsive" alt=""/>
					<div class="mask">
                   		<div class="info">Quick View</div>
	                  </div>
					<div class="product_container">
					   <div class="cart-left">
						 <p class="title"><?php echo $row['products_title']; ?></p>
					   </div>
					   <div class="pricey"><span class="item_price">৳ <?php echo $row['products_price'];?></span></div>
					   <div class="clearfix"></div>
				     </div>		
				  </div>
                 </div>
              </div>
			 </a>
			<button class="cbp-vm-icon cbp-vm-add item_add" onclick="addToCart(<?php echo $row['products_id']; ?>,<?php echo $row['products_price']; ?>)">Add to cart</button>
			</div>
		</li>
		<?php	}
		 } ?>
		
	</ul>
	<?php }	//Default shop
}



 ?>
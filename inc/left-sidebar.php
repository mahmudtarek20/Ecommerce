<div class="product-listy">
	<h2>Category</h2>
	<ul class="product-list">
		<?php $sql="SELECT * FROM category";
		if ($result=mysqli_query($con,$sql)) {
			while ($row=mysqli_fetch_assoc($result)) {
				echo '<li><a href="'.$_SERVER['PHP_SELF'].'?cat='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
			}
		} ?>
	</ul>
</div>
<div class="product-listy">
	<h2>Filter By Price</h2>
	<ul class="product-list">
		<li><a href="shop.php?low=0&high=1000">0-1K</a></li>
		<li><a href="shop.php?low=1000&high=10000">1k-10K</a></li>
		<li><a href="shop.php?low=10000&high=50000">10-50K</a></li>
		<li><a href="shop.php?low=50000&high=100000">50-100K</a></li>
		<li><a href="shop.php?low=100000&high=150000">100k-150K</a></li>
		<li><a href="shop.php?low=150000&high=200000">150K-200K</a></li>

	</ul>
</div>
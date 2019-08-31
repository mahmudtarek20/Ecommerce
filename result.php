<?php require 'inc/header.php'; ?>

<div class="container">
<?php if (isset($_GET['q'])) {
	$q=$_GET['q'];
	$sql="SELECT * FROM products WHERE products_title LIKE '%".$q."%' OR products_desc LIKE '%".$q."%'";
	if ($result=mysqli_query($con,$sql)) { ?>
		<h3>About <?php echo $result->num_rows; ?> result found!</h3>
		<div class="row">
<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
			<div class="col-md-3 col-sm-6">
				<div class="single-post">
				<a href="product.php?id=<?php echo $row['products_id']; ?>">
					<img src="admin/<?php echo $row['products_image']; ?>" alt="">
					<p><?php echo $row['products_price']; ?></p>
					<h4><?php echo $row['products_title']; ?></h4>

				</a>
				<button class="btn btn-primary">Add to cart</button>
				</div>
			</div>
<?php	}
		echo "</div>";
	}
} ?>
</div>
<?php require 'inc/footer.php'; ?>
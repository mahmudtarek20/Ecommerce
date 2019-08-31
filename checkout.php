<?php require 'inc/header.php'; ?>
<h1 class="text-center">Check Out</h1>
<?php $product_id=$_POST['product_id'];
$price=$_POST['price'];
$product_amount=$_POST['product_amount'];
$product_title=$_POST['products_title'];
$total=$price*$product_amount;
$vat=(0.15*$total);
$subtotal=$vat+$total;
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<p><?php echo $product_title; ?> (<?php echo $product_amount; ?>) <span class="pull pull-right"><?php echo $total; ?></span></p>
			<p>VAT(15%) <span class="pull pull-right"><?php echo $vat; ?></span></p>
			<p>Sub Total: <span class="pull pull-right"><?php echo $subtotal; ?></span></p>
		</div>
	</div>

	<form action="order.php" method="POST">
		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $product_id; ?>">
			<input type="hidden" name="price" value="<?php echo $price; ?>">
			<input type="hidden" name="amount" value="<?php echo $product_amount; ?>">
			<input type="hidden" name="total" value="<?php echo $total; ?>">
			<input type="hidden" name="vat" value="<?php echo $vat; ?>">
			<input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
			<input type="hidden" name="discount" value="0">
			<input type="hidden" name="grandtotal" value="<?php echo $subtotal; ?>">
		</div>
		<button class="btn btn-primary pull pull-right">Order now</button>
	</form>
</div>
<?php require 'inc/footer.php'; ?>
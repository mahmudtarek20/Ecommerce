<?php require 'inc/header.php';
if (!isset($_SESSION['email'])) { ?>
	<script>
		window.location.href="account.php";
	</script>
<?php }
if (isset($_SESSION['username'])) {
	$username=$_SESSION['username'];
}
$id=$_POST['id'];
$price=$_POST['price'];
$amount=$_POST['amount'];
$total=$_POST['total'];
$vat=$_POST['vat'];
$subtotal=$_POST['subtotal'];
$discount=$_POST['discount'];
$grandtotal=$_POST['grandtotal'];
$sql="INSERT INTO orders(order_id,username,products_id,price,quantity, subtotal,vat,total,discount,grand_total,order_status) VALUES(NULL, '$username','$id','$price','$amount','$total','$vat','$subtotal','$discount','$grandtotal',0)";
if (mysqli_query($con,$sql)) {
	echo "<h1 class='container'>Order is successfully placed.</h1>";
}else{
	echo "<h1 class='container'>Order is not placed. Something error. try again later</h1>";
}
 ?>


<?php require 'inc/footer.php'; ?>
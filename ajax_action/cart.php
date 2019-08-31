<?php 
require '../connection.php';
session_start();
$_SESSION['cart'] = array();
if (isset($_GET['id'])) {
	$_SESSION['cart'][]=$_GET['id'];
	if (empty($_SESSION['cart'])) {
		echo "Empty Cart";
	}else{
		echo count($_SESSION['cart']).' Items';
	}
}
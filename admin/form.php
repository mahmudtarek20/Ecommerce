<?php
require '../connection.php';
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle("This is pregenarated", false);


if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
$sql="SELECT * FROM orders NATURAL JOIN customer NATURAL JOIN products WHERE order_id='$id'";
if ($result=mysqli_query($con,$sql)) {
	while ($row=mysqli_fetch_assoc($result)) {
		$pdf->SetFont('Arial','B',24);
		$pdf->Cell(180,20,"Onilne Gadget Shop",4,2,'C');

		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,10,"Customer Name: ",1,0);
		$pdf->Cell(100,10,$row['name'],1,1);
		$pdf->Cell(80,10,"Product Name: ",1,0);
		$pdf->Cell(100,10,$row['products_title'],1,1);
		$pdf->Cell(80,10,"Price: ",1,0);
		$pdf->Cell(100,10,$row['products_price'],1,1);
		$pdf->Cell(80,10,"Quantity: ",1,0);
		$pdf->Cell(100,10,$row['quantity'],1,1);
		$pdf->Cell(80,10,"Subtotal: ",1,0);
		$pdf->Cell(100,10,$row['subtotal'],1,1);
		$pdf->Cell(80,10,"VAT (15%) : ",1,0);
		$pdf->Cell(100,10,$row['vat'],1,1);
		$pdf->Cell(80,10,"Discount: ",1,0);
		$pdf->Cell(100,10,$row['discount'],1,1);
		$pdf->Cell(80,10,"Final Bill: ",1,0);
		$pdf->Cell(100,10,$row['grand_total'],1,1);
		
	}
}
$pdf->Output();
?>

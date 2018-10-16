<?php
//require('fpdf.php');


	
require('code128.php');



$pdf=new PDF_Code128('P','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	
$pdf->setY(25);
	//Logo
	$pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/logo.png',10,16,30);
	// //Arial bold 15
	// $pdf->SetFont('Arial','B',15);
	// //Move to the right
	// $pdf->Cell(80);
	// //Title
	// $pdf->Cell(30,10,'Title',1,0,'C');
	// //Line break

	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(45);
	$pdf->Cell(120, 1, 'Provincial Government of Pampanga',0,1,'C');
	$pdf->Ln(5);
	$pdf->Cell(215, 5, 'ONLINE SCHOLARSHIP AND MANAGEMENT SYSTEM',0,1,'C');
	$pdf->Ln(5);
	$pdf->Cell(205,5,'AUDIT LOGS',0,1,'C');
	$pdf->Ln(10);
	$pdf->Cell(-2);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,7,'#',1,0);
	$pdf->Cell(50,7,'Employee Name',1,0);
	$pdf->Cell(55,7,'Date',1,0);
	$pdf->Cell(25,7,'Time',1,0);
	$pdf->Cell(60,7,'Action',1,1);


//<div class="check">&#10003;</div>

	$pdf->SetFont('Arial','',10);
	$ctr =  count($json);
	$ctr-=1;
	$i=1;
	for($x=0; $x<=$ctr; $x++)
	{
		$pdf->Cell(-2);
		$pdf->Cell(10,7,$i,1,0);
		$pdf->Cell(50,7,$json[$x]['fullname'],1,0);
		//$pdf->Cell(30,7,'',1,0);
		$pdf->Cell(55,7,$json[$x]['date'],1,0);
		$pdf->Cell(25,7,$json[$x]['time'],1,0);
		$pdf->Cell(60,7,$json[$x]['action'],1,1);
		//$pdf->Cell(90,7,'',1,1);
		//$pdf->Cell(30,7,'',1,0);
		$i++;
		//$pdf->Cell(30,7,'',1,1);
		// $pdf->Cell(38,7,'dfd',1,0);
		// $pdf->Cell(38,7,'dsds',1,1);
	}
	

	// Position at 1.5 cm from bottom
	$pdf->SetY(-10);
	// Arial italic 8
	$pdf->SetFont('Arial','I',8);
	// Page number
	$pdf->Cell(0,-15,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');


// Instanciation of inherited class

//$pdf->checkbox("YES");
$pdf->Output();
exit;
?>

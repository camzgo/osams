<?php
require('code128.php');

$pdf=new PDF_Code128('P','mm','Letter');
// $pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->SetAutoPageBreak(false);
$pdf->SetY(15);

   $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/backdrop_reports.png', 15, 10, 190);
    $pdf->setY(10);
    //$pdf->SetWatermarkImage('sandy.jpg',10,13,30);
    //$pdf->SetWatermarkImage= true;
//	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25);
    $pdf->Cell(150, 5, 'Provincial Government of Pampanga',0,1,'C');
    $pdf->Cell(200, 6, 'EDUCATIONAL FINANCIAL ASSISTANCE PROGRAM',0,1,'C');
    $pdf->Ln(5);

    // $con=mysqli_connect('localhost', 'root', '','osams');
    //     $query=mysqli_query($con,"SELECT * FROM eefap LIMIT 1");
    //     while($reports=mysqli_fetch_assoc($query)){

    $pdf->Cell(55);
    $pdf->Cell(45,10,'(  )  RENEWAL',0,0,'L');
    $pdf->Cell(45,10,'(  )  NEW',0,1,'R');
    $pdf->Ln(5);

    $pdf->Ln(2);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(13,0,'DATE:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,'',0,0);
    $pdf->cell(10,0,'_________________________',0,1);
    $pdf->ln(10);
    // }
    $pdf->SetFont('Arial','',10);
    $pdf->cell(13,0,'NAME:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,"  ",0,0);
    $pdf->cell(10,0,'__________________________________________________________________________________________',0,1);
    //}
    $pdf->SetFont('Arial','IB',10);
    $pdf->cell(60.10);
    $pdf->SetTextColor('205','0','0');
    $pdf->Cell(10,7,'Surname '.$pdf->cell(-45,7,'Given Name'),0,0);//.$pdf->cell(20,7,'MIddle Name'),0,0);.$pdf->cell(25,7,'Suffix:Jr.,Sr.,II,III'),0,0);
    $pdf->cell(135.10);
    $pdf->Cell(10,7,'Middle Name'.$pdf->cell(-45,7,'Suffix:Jr.,Sr.,II,III'),0,1);
    $pdf->ln(7);

    $pdf->SetTextColor('0','0','0');
    $pdf->SetFont('Arial','',10);
    $pdf->cell(23,0,'CONTACT #:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,"  ");
    $pdf->cell(10,0,'_____________________________________________________________________________________',0,1);
    $pdf->ln(10);
    
    $pdf->SetFont('Arial','',10);
    $pdf->cell(21,0,'ADDRESS:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,"  ");
    $pdf->cell(10,0,'______________________________________________________________________________________',0,1);
    $pdf->ln(10);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(23,0,'COLLEGE/UNIVERSITY:',0,1);
    $pdf->Cell(40);
    $pdf->SetTextColor('205','0','0');
    $pdf->cell(23,0,'(No abbreviation)',0,1);
    $pdf->ln(8);
    $pdf->SetTextColor('0','0','0');
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,"   ");
    $pdf->cell(10,0,'_________________________________________________________________________________________________',0,1);
    $pdf->ln(9);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(35,0,'SCHOOL ADDRESS:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0," ");
    $pdf->cell(10,0,'_______________________________________________________________________________',0,1);
    $pdf->ln(10);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(18,0,'COURSE:',0,0);
    $pdf->SetTextColor('205','0','0');
    $pdf->cell(29,0,'(No abbreviation)',0,0);
    $pdf->SetTextColor('0','0','0');
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0," ");
    $pdf->cell(10,0,'_________________________________________________________________________',0,1);
    $pdf->ln(10);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(15,0,'MAJOR:',0,0);
    $pdf->SetTextColor('205','0','0');
    $pdf->cell(30,0,'(No abbreviation)',0,0);
    $pdf->SetTextColor('0','0','0');
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,0,"   ");
    $pdf->cell(10,0,'__________________________________________________________________________',0,1);
    $pdf->ln(5);
    // if($reports["program_type"] == "Bachelor's Degree"){
    //     $pdf->Image('Check_mark.png',71,138,6);
    // }else if($reports["program_type"] == "2 year course"){
    //     $pdf->Image('Check_mark.png',20,138,6);
    // }else if($reports["program_type"] == "Ladderized"){
    //     $pdf->Image('Check_mark.png',142,138,6);
    // }
    $pdf->cell(50,10,'(    ) 2 year course',0,0,'C');
    $pdf->cell(60,10,"(    ) Bachelor's Degree",0,0,'C');
    $pdf->cell(70,10,'(    ) Ladderized',0,1,'C');
    $pdf->ln(5);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(25,0,'YEAR LEVEL:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(1,0,"   ");
    $pdf->Cell(10,0,'________',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(51,0,'GRADUATING:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-13);
    // if ($reports["graduating"] == "YES"){
    //     //$pdf->Image('check_mark.png',kaliwa-kanan,taas-baba,laki)
    //     $pdf->Image('Check_mark.png',85,148,6);
    //     }else{
    //     $pdf->Image('Check_mark.png',102,148,6);
    //     $pdf->Cell(1,0,'',0,0);
    //     }    
    $pdf->Cell(16,0,'(    ) YES',0,0);
    $pdf->Cell(16,0,'(    ) NO',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10);
    $pdf->Cell(50,0,'GENERAL AVERAGE:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(1,0,"   ");
    $pdf->Cell(50,0,'____________',0,0);
    $pdf->ln(10);
    // if ($reports["spes"] == "YES"){
    //     $pdf->Image('Check_mark.png',35,158,6);
    // }else{
    //     $pdf->Image('Check_mark.png',149,158,6);
    //     $pdf->Cell(1,0,'',0,0);
    // }

    $pdf->SetFont('Arial','IB',10);
    $pdf->SetTextColor('28','134','238');
    $pdf->Cell(135,0,'I certify that: _____ YES, I am SPES Recipient.',0,0);

    $pdf->SetFont('Arial','IB',10);
    $pdf->SetTextColor('28','134','238');
    $pdf->Cell(25,0,'_____ NO, I am SPES Recipient.',0,1);
    $pdf->ln(6);

    $pdf->SetTextColor('0','0','0');
    $pdf->Cell(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(95,55,'',1,0);
    $pdf->Cell(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(95,55,'',1,0);
    $pdf->SetY(138);
    $pdf->SetX(10);
    $pdf->Cell(65,50,'AWARDS RECEIVED/BANK', 0, 0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(125,50,'REQUIREMENTS SUBMITTED:', 0, 1,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(35,-38,'Please Check:', 0, 0,'C');
    $pdf->Cell(85,-38,'', 0, 1,'C');
    $pdf->Cell(55,48,'_____ with highest honors', 0, 0,'C');
    $pdf->Cell(148,48,'_____Bio-data with 2x2 picture', 0, 1,'C');
    $pdf->Cell(50,-38,'_____ with high honors', 0, 0,'C');
    $pdf->Cell(150,-38,'_____Certificate of Honor', 0, 1,'C');
    $pdf->Cell(42,48,'_____ with honors', 0, 0,'C');
    $pdf->Cell(184,48,'_____Grades/Class Cards/Form 138', 0, 1,'C');
    $pdf->Cell(49,-38,'_____ SK CHAIRMAN', 0, 0,'C');
    $pdf->Cell(177,-38,'_____BRGY.Residency/Indigency (Cert.)', 0, 1,'C');
    $pdf->Cell(50,48,'_____SK COUNCILOR', 0, 0,'C');
    $pdf->Cell(143,48,'_____Official Receipt', 0, 1,'C');
    $pdf->Cell(65,-38,'', 0, 0,'C');
    $pdf->Cell(140,-38,'_____Registration/ Assessment Form ', 0, 1,'C');
    $pdf->Cell(65,48,'', 0, 0,'C');
    $pdf->Cell(95,48,'_____I.D ', 0, 1,'C');
    $pdf->Cell(93,48,'', 0, 1,'C');

    $pdf->Ln(4);

    $pdf->SetTextColor('0','0','0');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(23,-100,'Received by:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(18,-100,'______________',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(41,-100,'Date:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-16);
    $pdf->Cell(41,-100,'______________',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-5);
    $pdf->Cell(40,-100,"Student's Signature:",0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,-100,'________________________',0,0);


//A,C,B sets

$code='123456aswrr78';
$pdf->Code128(120,255,$code,80,8);
//pdf->Ln(5);
$pdf->SetXY(174,263);
//$pdf->Cell(163);
$pdf->Write(5, $code);

$pdf->Output();
exit;

// $samp = "<img src='"."data:image/png;base64, {{DNS1D::getBarcodePNG('11', 'C39')}}"."' alt='"."barcode"."' />";

// $pdf = new FPDF();
// $pdf ->AddPage();
// $pdf ->SetFont('Arial','B',16);
// $pdf ->Cell(40,10, $samp);
// $pdf ->Output();
// exit;


//https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js
//npm i jquery-validation
?>

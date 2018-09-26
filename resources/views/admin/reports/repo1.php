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
    $pdf->Cell(45,10,'(   )  RENEWAL',0,0,'L');
    $pdf->Cell(45,10,'(   )  NEW',0,1,'R');
    $pdf->Ln(5);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(5);
    //$pdf->Cell(25,10,$reports["created_at"],0,0);
    $pdf->Cell(25,7,'Date :',0,0,'C');
    $pdf->Cell(50,7,"",1,0);
    $pdf->Cell(50,7,'',0,1);
    $pdf->Ln(2);

    $pdf->Cell(5);
    $pdf->Cell(25,7,'Name :',0,0,'C');
    $pdf->Cell(160,7,'',1,0);
    $pdf->Cell(160,7,'',0,1);

    $pdf->Cell(47,10,'(Surname,',0,0,'R');
    $pdf->Cell(22,10,' Given Name',0,0,'R');
    $pdf->Cell(30);
    $pdf->Cell(28,10,'Middle Initial    Suffix: Jr., Sr., II,III)',0,1,'R');
       


    $pdf->Cell(10);
    $pdf->Cell(25,7,'Contact # :',0,0);
    $pdf->Cell(50,7,'',1,0);
    //s$pdf->Cell(50,7,'',0,0);
    $pdf->Cell(30);
    $pdf->Cell(25,7,'Facebook Acct :',0,0,'R');
    $pdf->Cell(50,7,'',1,0);
    $pdf->Cell(50,7,'',0,1,'R');
    $pdf->Ln(2);
    
    $pdf->Cell(9);
    $pdf->Cell(30,7,'Guardian Name :',0,0,'C');
    $pdf->Cell(70,7,'',1,0);
    //$pdf->Cell(70,7,'',0,0);
    $pdf->Cell(6);
    $pdf->Cell(25,7,'Contact # :',0,0,'R');
    $pdf->Cell(50,7,'',1,0);
    $pdf->Cell(50,7,'',0,1);
    $pdf->Ln(2);
    //}
    $pdf->Cell(5);
    $pdf->Cell(41,7,'Complete Address :',0,0,'C');
    $pdf->Cell(144,7,'',1,0);
    $pdf->Cell(144,7,'',0,1);
    $pdf->Cell(55);
    $pdf->Cell(30,4,'Barangay',0,0,'R');
    $pdf->Cell(50);
    $pdf->Cell(30,4,'Municipality',0,1,'R');

    $pdf->Cell(9);
    $pdf->Cell(50,7,'College/University : (No Abbreviation)',0,1);
    $pdf->Cell(10);
    $pdf->Cell(180,7,'',1,0);
    $pdf->Cell(160,7,'',0,1,'L');
    $pdf->Ln(2);
   // }
    $pdf->Cell(9);
    $pdf->Cell(31,7,'School Address :',0,0);
    $pdf->Cell(150,7,'',1,0);
    $pdf->Cell(150,7,'',0,1);
    $pdf->Ln(2);

    $pdf->Cell(9);
    $pdf->Cell(49,7,'Course : (No Abbreviation)',0,0);
    $pdf->Cell(132,7,'',1,0);
    $pdf->Cell(132,7,'',0,1,'R');
    $pdf->Ln(2);

    $pdf->Cell(9);
    $pdf->Cell(49,7,'Major : (No Abbreviation)',0,0);
    $pdf->Cell(132,7,'',1,0);
    $pdf->Cell(132,7,'',0,1);
    $pdf->Cell(20);

    $pdf->Cell(10,7,"(   ) 2 Year's Course",0,0,'L');
    $pdf->Cell(80,7,"(   ) Bachelor's Degree",0,0,'R');
    $pdf->Cell(60,7,"(   ) Ladderized",0,1,'R');
    $pdf->Cell(9);
    $pdf->Cell(22,7,'Year Level : ',0,0,'L');
    $pdf->Cell(20,7,'',1,0);
    $pdf->Cell(11,6,'',0,0);
    $pdf->Cell(30,7,'Graduating :',0,0,'R');

    $pdf->Cell(88,7,'(   ) Yes  (   ) No',0,0);
    $pdf->Cell(-3,7,'General Average : ',0,0,'R');
    $pdf->Cell(13,7,'',1,0);
    $pdf->Cell(13,7,'',0,1,'R');
    $pdf->Ln(-2);

    $pdf->Cell(9);
    $pdf->Cell(50,7,'I certify that :',0,1);
    $pdf->Cell(15);
    $pdf->Cell(9,7,'',1,0);
    $pdf->Cell(50,7,'Yes, I am SPES Recipient',0,1);
    $pdf->Ln(1);
    $pdf->Cell(15);
    $pdf->Cell(9,7,'',1,0);
    $pdf->Cell(50,7,'No, I am SPES Recipient',0,1);
    $pdf->Ln(7);

    $pdf->Cell(15);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(85,45,'',1,0);
    $pdf->Cell(1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(85,45,'',1,0);
    $pdf->SetY(158);
    $pdf->SetX(10);
    $pdf->Cell(85,50,'Requirements Submitted:', 0, 0,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(85,50,'REMARKS                   ', 0, 1,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(85,-38,'___ Bio-data w/2x2 picture', 0, 0,'C');

   
    $pdf->Cell(110,-38,'___ Nanay Community Workers (NCW)', 0, 1,'C');
    $pdf->Cell(78,48,'___ Grades/ Form 138', 0, 0,'C');
    $pdf->Cell(120,48,'___ Gender and Development (GAD)', 0, 1,'C');
    $pdf->Cell(120,-38,'___ Certificate of Registration / Assessment Form', 0, 0,'C');
    $pdf->Cell(20,-38,'___ Graduated from Public', 0, 1,'C');
    $pdf->Cell(99,48,'___ Barangay/ Residency/Indigency', 0, 0,'C');
    $pdf->Cell(64,48,'___ Graduated from Private', 0, 1,'C');
    $pdf->Cell(73,-38,'___ Official Receipt', 0, 0,'C');
    $pdf->Cell(105,-38,'___ VG Old and New', 0, 1,'C');
    $pdf->Cell(65,48,'___ School ID', 0, 0,'C');
    $pdf->Cell(93,48,'', 0, 1,'C');

    $pdf->Ln(-10);

    $pdf->Cell(15);
    $pdf->Cell(50,7,'_____________________________',0,0);
    $pdf->Cell(55);
    $pdf->Cell(90,7,'_____________________________',0,1);
    $pdf->Cell(25);
    $pdf->Cell(50,2,'Received By',0,0);
    $pdf->Cell(50);
    $pdf->Cell(50,2,"Applicant's Signature",0,1);


//A,C,B sets

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

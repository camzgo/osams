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
    if($app->renew == 1 && $app->renew == 1){
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',66,28,6);
    }else{
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',135.5,28,6);    //$pdf->Cell(1,0,'',0,0);
    }
    $pdf->Cell(45,10,'(   )  RENEWAL',0,0,'L');
    $pdf->Cell(45,10,'(   )  NEW',0,1,'R');
    $pdf->Ln(5);

    $pdf->Ln(2);
    $pdf->SetFont('Arial','',10);
    $pdf->cell(13,0,'DATE:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,$app->created_at,0,0);
    $pdf->cell(10,0,'_________________________',0,1);
    $pdf->ln(10);
    // }
    $pdf->SetFont('Arial','',10);
    $pdf->cell(13,0,'NAME:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(1,-1,$eefap->surname.', '.$eefap->first_name.' '.$eefap->middle_name.' '.$eefap->suffix,0,0);
    $pdf->cell(10,0,'__________________________________________________________________________________________',0,1);
    //}
    $pdf->SetFont('Arial','IB',10);
    $pdf->cell(35.10);
    $pdf->SetTextColor('205','0','0');
    $pdf->Cell(10,8,'(Surname, '.$pdf->cell(-20,8,'Given Name'),0,0);//.$pdf->cell(20,7,'MIddle Name'),0,0);.$pdf->cell(25,7,'Suffix:Jr.,Sr.,II,III'),0,0);
    $pdf->cell(60.10);
    $pdf->Cell(5,8,'Middle Name'.$pdf->cell(-25,8,'Suffix: Jr.,Sr.,II,III)'),0,1);
    $pdf->ln(7);

    $pdf->SetTextColor('0','0','0');
    $pdf->SetFont('Arial','',10);
    $pdf->cell(26,0,'CONTACT NO : ',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,'0'.$eefap->mobile_number);
    $pdf->cell(-11,0,'_____________________________________________________________________________________',0,1);
    $pdf->ln(10);
    
    $pdf->SetFont('Arial','',10);
    $pdf->cell(21,0,'ADDRESS:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,$eefap->street.' '.$eefap->barangay.', '.$eefap->municipality);
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
    $pdf->Cell(-1,-1,$eefap->college_name);
    $pdf->cell(10,0,'_________________________________________________________________________________________________',0,1);
    $pdf->ln(9);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(35,0,'SCHOOL ADDRESS:',0,0);
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,$eefap->college_address);
    $pdf->cell(10,0,'_______________________________________________________________________________',0,1);
    $pdf->ln(10);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(18,0,'COURSE:',0,0);
    $pdf->SetTextColor('205','0','0');
    $pdf->cell(29,0,'(No abbreviation)',0,0);
    $pdf->SetTextColor('0','0','0');
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,$eefap->course);
    $pdf->cell(10,0,'_________________________________________________________________________',0,1);
    $pdf->ln(10);

    $pdf->SetFont('Arial','',10);
    $pdf->cell(15,0,'MAJOR:',0,0);
    $pdf->SetTextColor('205','0','0');
    $pdf->cell(30,0,'(No abbreviation)',0,0);
    $pdf->SetTextColor('0','0','0');
    $pdf->setfont('arial','b',10);
    $pdf->Cell(-1,-1,$eefap->major);
    $pdf->cell(10,0,'__________________________________________________________________________',0,1);
    $pdf->ln(5);
     if($eefap->program_type == "Bachelor's Degree"){
         $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',71,132,6);
     }else if($eefap->program_type == "2 Years Course"){
         $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',20,132,6);
     }else if($eefap->program_type == "Ladderized"){
         $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',142,132,6);
    }
    $pdf->cell(50,10,'(    ) 2 year course',0,0,'C');
    $pdf->cell(60,10,"(    ) Bachelor's Degree",0,0,'C');
    $pdf->cell(70,10,'(    ) Ladderized',0,1,'C');
    $pdf->ln(5);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(25,0,'YEAR LEVEL:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-1,-1,$eefap->year_level);
    $pdf->Cell(10,0,'________',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(51,0,'GRADUATING:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-13);
     if ($eefap->graduating == "YES"){
         //$pdf->Image('check_mark.png',kaliwa-kanan,taas-baba,laki)
         $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',83,142,6);
         }else{
         $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',100,142,6);
         $pdf->Cell(1,0,'',0,0);
         }    
    $pdf->Cell(16,0,'(    ) YES',0,0);
    $pdf->Cell(16,0,'(    ) NO',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10);
    $pdf->Cell(50,0,'GENERAL AVERAGE:',0,0,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-1,-1,$eefap->general_average);
    $pdf->Cell(50,0,'____________',0,0);
    $pdf->ln(10);

    $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',149,152,6);
    $pdf->Cell(1,0,'',0,0);


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
    if($eefap->awards == "Highest Honors")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',18,171,6);
    }
    $pdf->Cell(55,48,'_____ with Highest Honors', 0, 0,'C');
    if($req->biodata_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,171,6);
    }
    $pdf->Cell(148,48,'_____Bio-data with 2x2 picture', 0, 1,'C');
    if($eefap->awards == "High Honors")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',18,176,6);
    }
    $pdf->Cell(50,-38,'_____ with High Honors', 0, 0,'C');
    if($scholar_id->id !=7)
    {
        if($req->honor_sub == "Submitted")
        {
            $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,176,6);
        }
    }
    
    $pdf->Cell(150,-38,'_____Certificate of Honor', 0, 1,'C');
    if($eefap->awards == "Honors")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',18,181,6);
    }
    $pdf->Cell(42,48,'_____ with Honors', 0, 0,'C');
    if($req->grades_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,181,6);
    }
    $pdf->Cell(184,48,'_____Grades/Class Cards/Form 138', 0, 1,'C');
    if($eefap->awards == "SK Chairman")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',18,186,6);
    }
    $pdf->Cell(49,-38,'_____ SK CHAIRMAN', 0, 0,'C');
    if($req->brgy_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,186,6);
    }
    $pdf->Cell(181,-38,'_____ Barangay/Residency/Indigency (Cert.)', 0, 1,'C');
    if($eefap->awards == "SK Councilor")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',18,191,6);
    }
    $pdf->Cell(50,48,'_____ SK COUNCILOR', 0, 0,'C');
    if($req->or_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,191,6);
    }
    $pdf->Cell(143,48,'_____ Official Receipt', 0, 1,'C');
    $pdf->Cell(65,-38,'', 0, 0,'C');
    if($req->cor_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,196,6);
    }
    $pdf->Cell(140,-38,'_____ Registration/ Assessment Form ', 0, 1,'C');
    $pdf->Cell(65,48,'', 0, 0,'C');
    if($req->oid_sub == "Submitted")
    {
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',117,201,6);
    }
    $pdf->Cell(106,48,'_____ Official ID ', 0, 1,'C');
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
$pdf->SetFont('Arial','',10);
$pdf->Code128(144,255,$app->barcode_number,60,8);
//pdf->Ln(5);
$pdf->SetXY(179,263);
//$pdf->Cell(163);
$pdf->Write(5, $app->barcode_number);

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

<?php
require('code128.php');

$pdf=new PDF_Code128('P','mm','Letter');
// $pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->SetAutoPageBreak(false);
$pdf->SetY(55);

   $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/backdrop_reports.png', 15, 10, 190);
    $pdf->setY(10);
    //$pdf->SetWatermarkImage('sandy.jpg',10,13,30);
    //$pdf->SetWatermarkImage= true;
//	$pdf->SetFont('Arial','B',12);
	$pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/pcl.jpg',10,13,30);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(80);
    $pdf->Cell(30,7,'VICE GOV. DENNIS "DELTA" PINEDA',0,1,'C');
    
    $pdf->Cell(80);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30, 5,'EDUCATIONAL FINANCIAL ASSISTANCE PROGRAM',0,1,'C');
    $pdf->Cell(80);
    $pdf->Cell(30, 5,'PHILIPPINES COUNCILORS LEAGUE-PAMPANGA CHAPTER ',0,1,'C');
    $pdf->Ln(5);


    // $con=mysqli_connect('localhost', 'root', '','osams');
    //     $query=mysqli_query($con,"SELECT * FROM eefap LIMIT 1");
    //     while($reports=mysqli_fetch_assoc($query)){

    $pdf->Cell(55);
    if($app->renew != 1 && $app->renew == 1){
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',65.5,34,6);
    }else{
        $pdf->Image('C:/xampp/htdocs/osams_001/resources/views/admin/reports/Check_mark.png',138,34,6);    //$pdf->Cell(1,0,'',0,0);
    }
    $pdf->Cell(45,10,'(   )  RENEWAL',0,0,'L');
    $pdf->Cell(45,10,'(   )  NEW',0,1,'R');
    $pdf->Ln(5);
    $pdf->SetTextColor('255','127','36');
    //$pdf->Cell(20);
    //$pdf->Cell(50,7,'District: __________',0,0);
    //$pdf->Cell(50,7,'Town: __________',0,1);
    $pdf->Cell(13,1,'District: __________',0,0);
    $pdf->Cell(50,1,$eefap->district,0,0);
    $pdf->Cell(13,1,'Town: __________',0,0);
    $pdf->Cell(-2);
    $pdf->Cell(50,1,$eefap->municipality,0,0);
    $pdf->Cell(50,1,'Date:___________________',0,1);
    $pdf->Cell(133);
    $pdf->Cell(500,-1,$app->created_at,0,0);
    $pdf->Ln(1);
    $pdf->SetTextColor('0','0','0');
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(5);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(5);
    //$pdf->Cell(25,10,$reports["created_at"],0,0);
     $pdf->Cell(10);
    //$pdf->cell(100,10,'pdf is Header',0,1,'C');
	$pdf->SetFont('Arial','BI',10);
    $pdf->Cell(100,10,'PERSONAL DATA',0,'C');
    $pdf->Ln(10);
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Name:',0,1);
    $pdf->SetFont('Arial','B',10);

    $pdf->SetTextColor('0','0','0');
    $pdf->Cell(12);
    $pdf->Cell(50,0,$eefap->first_name.' '.$eefap->middle_name.' '.$eefap->surname.' '.$eefap->suffix,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    // echo "<td>".$reports['id']."</td>";
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Address:',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(15);
    $pdf->Cell(50,0,$eefap->street.' '.$eefap->barangay.', '.$eefap->municipality,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Contact No:',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20);
    $pdf->Cell(50,0,'0'.$eefap->mobile_number,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'School Enrolled:',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(28);
    $pdf->Cell(50,0,$eefap->school_enrolled,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);
    
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Course:',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(15);
    $pdf->Cell(50,0,$eefap->course,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Year Level:',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20);
    $pdf->Cell(50,0,$eefap->year_level,0,1);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(8);

    $pdf->Cell(10);
    $pdf->SetFont('Arial','BI',10);
    $pdf->Cell(100,10,'OTHER INFORMATIONS',0,'C');
    $pdf->Ln(12);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Sex:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-40);
    $pdf->Cell(40,0,$eefap->gender,0,0); 
    $pdf->Cell(-50);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Civil Status:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-30);
    $pdf->Cell(40,0,$eefap->civil_status,0,0);
    $pdf->Cell(-60);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Date of Birth:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-28);
    $pdf->Cell(28,0,$eefap->birthdate,0,0);
    $pdf->Cell(-50);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(74,0,'Place of Birth:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-50);
    $pdf->Cell(40,0,$eefap->birth_place,0,0);
    $pdf->Cell(-64);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,'Citizenship:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-30);
    $pdf->Cell(28,0,$eefap->nationality,0,0);
    $pdf->Cell(-48);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(68,0,'Religion:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-53);
    $pdf->Cell(40,0,$eefap->religion,0,0);
    $pdf->Cell(-55);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,"Father's Name:",0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-25);
    $pdf->Cell(28,0,$eefap->ffirst_name.' '.$eefap->fmiddle_name.' '.$eefap->fsurname.' '.$eefap->fsuffix,0,0);  
    $pdf->Cell(-53);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(68,0,'Occupation:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-48);
    $pdf->Cell(30,0,$eefap->foccupation,0,0);
    $pdf->Cell(-50);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,0,"Mother's Name:",0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-25);
    $pdf->Cell(28,0,$eefap->mfirst_name.' '.$eefap->mmiddle_name.' '.$eefap->msurname.' '.$eefap->msuffix,0,0); 
    $pdf->Cell(-53);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(68,0,'Occupation:',0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-48);
    $pdf->Cell(30,0,$eefap->moccupation,0,0);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(-50);
    $pdf->Cell(50,1,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(70,0,'Address:',0,1,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(15);
    $pdf->Cell(40,0,$eefap->address,0,0);
    $pdf->Cell(-55);
    $pdf->Cell(50,0,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(74,0,'Person to be contacted in case of Emergency:',0,1,'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(73);
    $pdf->Cell(40,0,$eefap->emergency,0,0);
    $pdf->Cell(-113);
    $pdf->Cell(50,0,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(7);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(70,0,'Contact No:',0,1,'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(19);
    $pdf->Cell(40,0,$eefap->mobile_number,0,0);
    $pdf->Cell(-59);
    $pdf->Cell(50,0,'_____________________________________________________________________________________________',0,1);
    $pdf->Ln(17);

    //$pdf->SetFont('Arial','BI',10);
    //$pdf->Cell(65,7,'CHARACTER REFERENCES',0,1,'R');
    //$pdf->Ln(2);

    //$pdf->SetFont('Arial','',10);
    //$pdf->cell(16);
    //$pdf->cell(45,0,'Name',0,1,'L');
    //$pdf->cell(56);
    //$pdf->cell(74,0,'Occupation',0,1,'C');
    //$pdf->cell(96);
    //$pdf->cell(74,0,'Address',0,1,'R');
    //$pdf->setfont('arial','b',10);
    //$pdf->cell(50,7,'_____________________________________________________________________________________________',0,1);
    //$pdf->setfont('arial','b',10);
    //$pdf->cell(50,7,'_____________________________________________________________________________________________',0,1);
    //$pdf->setfont('arial','b',10);
    //$pdf->cell(50,7,'_____________________________________________________________________________________________',0,1);
    //$pdf->setfont('arial','b',10);
    //$pdf->cell(50,7,'_____________________________________________________________________________________________',0,1);
    //$pdf->ln(10);

    $pdf->cell(84);
    $pdf->cell(100,7,'______________________________',0,1,'R');
    $pdf->cell(84);
    $pdf->cell(90,7,"Applicant's Signature",0,0,'R');


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

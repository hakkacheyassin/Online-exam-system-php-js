<?php
require_once('constants/check-login.php');
require('../assets/pdf/code128.php');

if (isset($_GET['node'])) {

	$enroll_no = $_GET['node'];
	require_once('../assets/constants/config.php');
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_enroll_numbers a  LEFT JOIN tbl_students b ON a.student = b.id 
		LEFT JOIN tbl_exams c ON a.exam = c.exam_id WHERE a.code = :code");
	$stmt->bindParam(':code', $enroll_no);
	$stmt->execute();
	$result = $stmt->fetchAll();
	$rec = count($result);

	if ($rec < 1) {
		header("location:./");
	}

    foreach($result as $row)
    {
    	$student_id = $row[1];
    	$enroll_no = $row[0];
    	$expire_date = $row[3];
        $fname = utf8_decode($row[5]);
        $lname = utf8_decode($row[6]);
        $exam = utf8_decode($row[15]);

		
	}


	$stmt = $conn->prepare("SELECT * FROM tbl_school_info");
	$stmt->execute();
	$result = $stmt->fetchAll();

    foreach($result as $row)
    {
    	$school_name = utf8_decode($row[0]);
		$phone = utf8_decode($row[1]);
		$email = utf8_decode($row[2]);
		$address = utf8_decode($row[3]);
		$logo = utf8_decode($row[4]);
		
	}

					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
 

}else{

	header("location:./");
}

$pdf=new PDF_Code128();
$pdf->SetTitle('Enroll Number - '.$enroll_no.'.pdf');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Image('../assets/uploads/logo/'.$logo.'',10,12,-500);
$pdf->Cell(23);
$pdf->Cell(100,10,''.$school_name.'');
$pdf->Ln(5);
$pdf->Cell(23);
$pdf->Cell(40,10,''.$phone.', '.$email.'');
$pdf->Ln(5);
$pdf->Cell(23);
$pdf->Cell(40,10,''.$address.'');
$pdf->Ln(5);
$pdf->Cell(23);
$pdf->Cell(40,10,'Enroll Number');

$pdf->Ln(10);

$pdf->SetFont('Courier','',12);
$pdf->Cell(40,10,'Student ID : '.$student_id.'');
$pdf->Ln(5);
$pdf->Cell(40,10,'Student Name : '.$fname.' '.$lname.'');
$pdf->Ln(5);
$pdf->Cell(40,10,'Exam Title : '.$exam .'');
$pdf->Ln(5);
$pdf->Cell(40,10,'Enroll Number : '.$enroll_no.'');
$pdf->Ln(5);
$pdf->Cell(40,10,'Expire Date : ' .$expire_date.'');
$pdf->Ln(5);


$code=$enroll_no;
$pdf->Code128(10,70,$code,50,10);
$pdf->Cell(5);
$pdf->Write(45,''.$code.'');

$pdf->Output('Enroll Number - '.$code.'.pdf', 'I');
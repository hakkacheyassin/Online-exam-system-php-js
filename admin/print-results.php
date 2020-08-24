<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
require('../assets/pdf/html_table.php');

if (isset($_GET['node'])) {

    $exam_id = $_GET['node'];
}else{
    header("location:./");
}


    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        echo "error : " . mysqli_connect_error();
    }


    $stmt = ("SELECT * FROM tbl_school_info");
    
    $result = mysqli_query($conn,$stmt);

    while($row = mysqli_fetch_array($result))
    {
        $school_name = utf8_decode($row[0]);
        $phone = utf8_decode($row[1]);
        $email = utf8_decode($row[2]);
        $address = utf8_decode($row[3]);
        $logo = $row[4];
    }

    $stmt = ("SELECT a.*, b.*, c.* FROM tbl_asessment_records a LEFT JOIN  tbl_exams b ON a.exam = b.exam_id
	                   LEFT JOIN tbl_students c ON a.student = c.id WHERE a.exam = '$exam_id' ORDER BY a.score DESC");
    
    $result = mysqli_query($conn,$stmt);
    $rec = mysqli_query_nums($result);
    $data = "";

    if ($rec > 0) {

    }else{
        header("location:./");
    }
    while($row = mysqli_fetch_array($result))
    {
        $exam_title = utf8_decode($row[7]);
        $passmark = $row[9];

        if ($row[5] >= $passmark) {
            $status = "PASS";
        }else{
            $status = "FAIL";
        }

        $data = ''.$data.'<tr>
<td>'. utf8_decode($row[1]).'</td>
<td>'. utf8_decode($row[20]).' '.utf8_decode($row[21]).'</td>
<td>'. utf8_decode($row[22]).'</td>
<td>'. utf8_decode($row[5]).'%</td>
<td>'. utf8_decode($status).'</td>
</tr>';


    }

$pdf=new PDF_HTML_Table('L','mm','A4');
$pdf->SetTitle(''.$exam_title.' Exam Results.pdf');
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
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
$pdf->Cell(40,10,''.$exam_title.' Exam Results');

$pdf->Ln(10);
$htmlTable='<table>
<tr>
<td>STUDENT ID</td>
<td>STUDENT NAME</td>
<td>GENDER</td>
<td>SCORE</td>
<td>STATUS</td>
</tr>
'.$data.'</table>';

$pdf->SetFont('courier','',11);
$pdf->WriteHTML($htmlTable);

$pdf->Output(''.$exam_title.' Exam Results.pdf', 'I');
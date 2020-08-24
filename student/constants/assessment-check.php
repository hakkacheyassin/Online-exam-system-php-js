<?php

if (isset($_SESSION['exam_allowed']) && $_SESSION['exam_allowed'] == "YES") {

$examtime = $_SESSION['exam_time'];
$examtitle = $_SESSION['exam_title'];
$exam_id = $_SESSION['current_examid'];
$student_retake = $_SESSION['student_retake'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_asessment_records WHERE student = :me AND exam = :exam");
$stmt->bindParam(':me', $_SESSION['id']);
$stmt->bindParam(':exam', $exam_id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

    if ($student_retake == "1") {
    
    $stmt = $conn->prepare("DELETE from tbl_asessment_records WHERE student = :me AND exam = :exam");
    $stmt->bindParam(':me', $_SESSION['id']);
    $stmt->bindParam(':exam', $exam_id);
    $stmt->execute();

    $score = "0";
    $date_taken = date('d/m/Y h:i:s');
    $stmt = $conn->prepare("INSERT INTO tbl_asessment_records (student, exam, date_taken, score) VALUES (:me, :exam, :datetaken, :score)");
    $stmt->bindParam(':me', $_SESSION['id']);
    $stmt->bindParam(':exam', $exam_id);
    $stmt->bindParam(':datetaken', $date_taken);
    $stmt->bindParam(':score', $score);
    $stmt->execute();

    $_SESSION['student_retake'] = 0;

    }else{

        header("location:./view-exam?node=$exam_id");

    }

}else{

    $score = "0";
    $date_taken = date('d/m/Y h:i:s');
    $stmt = $conn->prepare("INSERT INTO tbl_asessment_records (student, exam, date_taken, score) VALUES (:me, :exam, :datetaken, :score)");
    $stmt->bindParam(':me', $_SESSION['id']);
    $stmt->bindParam(':exam', $exam_id);
    $stmt->bindParam(':datetaken', $date_taken);
    $stmt->bindParam(':score', $score);
    $stmt->execute();
}
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

header("location:./");


}

?>
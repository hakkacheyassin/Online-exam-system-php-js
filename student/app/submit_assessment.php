<?php
error_reporting(0);
require_once('../../assets/constants/config.php');
session_start();
$starting_mark = 1;
$mytotal_marks = 0;
$exam_id = $_SESSION['current_examid'];
$student = $_SESSION['id'];
$date_submit = date('d/m/Y h:i:s');
$questions = $_SESSION['questions'];

while ($starting_mark <= $questions) {
if (strtoupper($_POST['q'.$starting_mark.'']) == strtoupper(base64_decode($_POST['a'.$starting_mark.'']))) {
$mytotal_marks = $mytotal_marks + 1;	
}else{
        
}
$starting_mark++;
}

$percent_score = ($mytotal_marks / $questions) * 100;
$percent_score = floor($percent_score);
    
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_asessment_records SET completed = :completed, score = :score WHERE exam = :exam AND student = :student");
$stmt->bindParam(':completed', $date_submit);
$stmt->bindParam(':score', $percent_score);
$stmt->bindParam(':exam', $exam_id);
$stmt->bindParam(':student', $student);

$stmt->execute();

header("location:../assessment-info");
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


?>
<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$exam = $_GET['node'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_questions WHERE exam = :exam");
$stmt->bindParam(':exam', $exam);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

$stmt = $conn->prepare("UPDATE tbl_exams SET status = 'ACTIVE' WHERE exam_id = :exam");
$stmt->bindParam(':exam', $exam);
$_SESSION['reply'] = "033";
header("location:../exams");

$stmt->execute();

}else{

$_SESSION['reply'] = "032";
header("location:../exams");
}
				  
}catch(PDOException $e)
{
 echo "Connection failed: " . $e->getMessage();
}





}else{

header("location:../");

}

?>
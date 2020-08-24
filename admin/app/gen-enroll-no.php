<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$en_no = 'EN-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'-'.get_rand_numbers(3).'';
$student = $_POST['student'];
$expiredate = $_POST['expiredate'];
$exam = $_POST['exam'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("DELETE FROM tbl_enroll_numbers WHERE student = :student AND exam = :exam");
$stmt->bindParam(':student', $student);
$stmt->bindParam(':exam', $exam);
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO tbl_enroll_numbers (code, student, exam, expire_date) VALUES (:code, :student, :exam, :expiredate)");
$stmt->bindParam(':code', $en_no);
$stmt->bindParam(':student', $student);
$stmt->bindParam(':exam', $exam);
$stmt->bindParam(':expiredate', $expiredate);
$stmt->execute();

header("location:../print-enroll?node=$en_no");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>

<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$exam = $_GET['node'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("UPDATE tbl_exams SET status = 'INACTIVE' WHERE exam_id = :exam");
$stmt->bindParam(':exam', $exam);
$_SESSION['reply'] = "034";


$stmt->execute();
header("location:../exams");	
				  
}catch(PDOException $e)
{
 echo "Connection failed: " . $e->getMessage();
}





}else{

header("location:../");

}

?>



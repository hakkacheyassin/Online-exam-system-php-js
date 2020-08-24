<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = 'EX-'.get_rand_numbers(6).'';
$exam = ucwords($_POST['name']);
$duration = $_POST['duration'];
$passmark = $_POST['passmark'];
$attempts = $_POST['attempts'];
$deadline = $_POST['deadline'];
$department = $_POST['department'];
$class = $_POST['class'];
$subject = $_POST['subject'];
$type = $_POST['type'];

if ($type == "Free") {
$price = "";
}else{
$price = $_POST['price'];
}

$terms = $_POST['terms'];


try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_exams WHERE name = :name AND department = :department AND class = :class AND subject = :subject");
$stmt->bindParam(':name', $firstname);
$stmt->bindParam(':department', $lastname);
$stmt->bindParam(':class', $email);
$stmt->bindParam(':subject', $email);
$stmt->execute();
$result = $stmt->fetchAll();

$rec = count($result);

if ($rec > 0) {

$_SESSION['reply'] = "002";
header("location:../exams");

}else{

$stmt = $conn->prepare("INSERT INTO tbl_exams (exam_id, name, duration, passmark, re_exam, deadline, department, class, subject, exam_type, fee, terms) VALUES (:id, :name, :duration, :pass, :rex, :dead, :dep, :class, :subject, :type, :fee, :terms)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $exam);
$stmt->bindParam(':duration', $duration);
$stmt->bindParam(':pass', $passmark);
$stmt->bindParam(':rex', $attempts);
$stmt->bindParam(':dead', $deadline);
$stmt->bindParam(':dep', $department);
$stmt->bindParam(':class', $class);
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':fee', $price);
$stmt->bindParam(':terms', $terms);
$stmt->execute();

$_SESSION['reply'] = "018";
header("location:../exams");

}

foreach($result as $row)
{

}
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}






}else{

header("location:../");

}

?>

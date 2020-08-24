<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

$id = $_POST['subjectid'];
$name = ucwords($_POST['name']);
$dep = $_POST['department'];
$class = $_POST['class'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_subjects WHERE name = :name AND department = :dep AND class = :class AND id != :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':dep', $dep);
$stmt->bindParam(':class', $class);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

$_SESSION['reply'] = "002";
header("location:../edit-subject?node=$id");

}else{

$stmt = $conn->prepare("UPDATE tbl_subjects SET name = :name, department = :dep, class = :class WHERE id = :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':dep', $dep);
$stmt->bindParam(':class', $class);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['reply'] = "011";
header("location:../edit-subject?node=$id");

}

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>

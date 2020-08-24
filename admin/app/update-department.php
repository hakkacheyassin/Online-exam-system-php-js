<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

$id = $_POST['id'];
$name = ucwords($_POST['name']);

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_departments WHERE name = :name AND id != :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

$_SESSION['reply'] = "002";
header("location:../departments");

}else{

$stmt = $conn->prepare("UPDATE tbl_departments SET name = :name WHERE id = :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['reply'] = "005";
header("location:../departments");

}

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>

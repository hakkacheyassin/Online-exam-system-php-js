<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = $_POST['id'];
$name = ucwords($_POST['name']);
$dep = $_POST['department'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_classes WHERE name = :name AND department = :dep AND id != :id");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':dep', $dep);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

$_SESSION['reply'] = "002";
header("location:../classes");

}else{
 
$stmt = $conn->prepare("UPDATE tbl_classes SET name = :name, department = :dep WHERE id = :id");

$stmt->bindParam(':name', $name);
$stmt->bindParam(':dep', $dep);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['reply'] = "008";
header("location:../classes");

}

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>

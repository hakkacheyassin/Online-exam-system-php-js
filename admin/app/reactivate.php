<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$ass_id = $_GET['node'];
$src = $_GET['src'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("DELETE FROM tbl_asessment_records WHERE id = :id");
$stmt->bindParam(':id', $ass_id);
$stmt->execute();

$_SESSION['reply'] = "027";
header("location:$src");

}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}else{

header("location:../");

}

?>

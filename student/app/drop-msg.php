<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "student") {

require_once('../../assets/constants/config.php');

$message =  $_GET['node'];
$receiver = $_GET['red'];
$loc = base64_encode($receiver);

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("DELETE FROM tbl_pm WHERE message_id = :myid AND sender = :sender");
$stmt->bindParam(':myid', $message);
$stmt->bindParam(':sender', $_SESSION['id']);

$stmt->execute();

header("location:../private-message?node=$loc");
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

	header("location:../");
}


?>
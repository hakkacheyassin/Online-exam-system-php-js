<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "student") {

require_once('../../assets/constants/config.php');

$new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_students SET login = :login WHERE id = :myid");
$stmt->bindParam(':login', $new_password);
$stmt->bindParam(':myid', $_SESSION['id']);

$stmt->execute();
$_SESSION['reply'] = "023";
header("location:../account");
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

	header("location:../");
}


?>
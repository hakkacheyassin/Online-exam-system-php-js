<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "student") {

require_once('../../assets/constants/config.php');
$new_file_name = "";
$old_avator = $_GET['node'];
$unlink = '../../assets/uploads/avatar/'.$old_avator.'';


if (!unlink($unlink))
  {

  }
else
  {

  }

  try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$stmt = $conn->prepare("UPDATE tbl_students SET avator = :avator WHERE id = :id");
$stmt->bindParam(':avator', $new_file_name);
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();

$_SESSION['avator'] = $new_file_name;

$_SESSION['reply'] = "022";
header("location:../account");

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}



}else{

	header("location:../");
}


?>
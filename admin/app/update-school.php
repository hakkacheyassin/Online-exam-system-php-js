<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

$school_name = ucwords($_POST['name']);
$school_phone = $_POST['phone'];
$school_email = $_POST['email'];
$school_address = $_POST['address'];
$school_logo = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$old_logo = $_POST['schoollogo'];

if ($school_logo == null) {

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$stmt = $conn->prepare("UPDATE tbl_school_info SET school_name = :name, phone = :phone, email = :email, address = :address");
$stmt->bindParam(':name', $school_name);
$stmt->bindParam(':phone', $school_phone);
$stmt->bindParam(':email', $school_email);
$stmt->bindParam(':address', $school_address);
$stmt->execute();

$_SESSION['reply'] = "016";
header("location:../school");

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

$data = getimagesize($_FILES["image"]["tmp_name"]);
$width = $data[0];
$height = $data[1];

if ($width == "400" && $height = "400") {

$new_file_name = ''.rand(10000,90000).'.png';
$target_dir = "../../assets/uploads/logo/";
$target_file = '../../assets/uploads/logo/'.$new_file_name.'';
$unlink = '../../assets/uploads/logo/'.$old_logo.'';

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

if (!unlink($unlink))
  {

  }
else
  {

  }


 try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
$stmt = $conn->prepare("UPDATE tbl_school_info SET school_name = :name, phone = :phone, email = :email, address = :address, logo = :logo");
$stmt->bindParam(':name', $school_name);
$stmt->bindParam(':phone', $school_phone);
$stmt->bindParam(':email', $school_email);
$stmt->bindParam(':address', $school_address);
$stmt->bindParam(':logo', $new_file_name);
$stmt->execute();

$_SESSION['reply'] = "016";
header("location:../school");

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}





}else{

$_SESSION['reply'] = "017";
header("location:../school");

}

}


}else{

header("location:../");

}

?>

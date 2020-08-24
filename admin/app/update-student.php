<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id =  $_POST['studentid'];
$fname = ucwords($_POST['fname']);
$lname = ucwords($_POST['lname']);
$gender = $_POST['gender'];
$email = $_POST['email'];
$dep = $_POST['department'];
$class = $_POST['class'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT email FROM tbl_admin WHERE email = :email UNION SELECT email FROM tbl_students WHERE email = :email AND id != :id");
$stmt->bindParam(':email', $email_address);
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec > 0) {

$_SESSION['reply'] = "012";
header("location:../edit-student?node=$id");

}else{

$stmt = $conn->prepare("UPDATE tbl_students SET first_name = :fname, last_name = :lname, gender = :gender, department = :dep, class = :class, email = :email WHERE id = :id");

$stmt->bindParam(':fname', $fname);
$stmt->bindParam(':lname', $lname);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':dep', $dep);
$stmt->bindParam(':class', $class);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['reply'] = "015";
header("location:../edit-student?node=$id");

}

					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

header("location:../");

}

?>

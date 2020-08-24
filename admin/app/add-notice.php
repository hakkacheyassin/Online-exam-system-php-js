<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

$title = ucwords($_POST['title']);
$desc =  $_POST['description'];
$posted = date('d/m/Y h:i:s');

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_notice (title, notice, posted_date) VALUES (:title, :notice, :posted_date)");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':notice', $desc);
$stmt->bindParam(':posted_date', $posted );
$stmt->execute();

$_SESSION['reply'] = "030";
header("location:../notice");
				  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

header("location:../");

}

?>

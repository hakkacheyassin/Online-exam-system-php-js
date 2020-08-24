<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');	
$id = $_GET['node'];

$conn = mysqli_connect($servername,$username,$password,$dbname);	
$stmt = ("DELETE FROM tbl_departments WHERE id = '$id'");
$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "004";					  
header("location:../departments");
}else{
    header("location:../");
}

?>
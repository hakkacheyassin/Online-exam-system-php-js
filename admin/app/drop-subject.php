<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');	
$id = $_GET['node'];

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error : " . mysqli_fetch_array();
}
	
$stmt = ("DELETE FROM tbl_subjects WHERE id = '$id'");
$result = mysqli_connect($conn,$stmt);

$_SESSION['reply'] = "010";					  
header("location:../subjects");

}else{

header("location:../");

}

?>
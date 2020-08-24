<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');	
$id = $_GET['node'];

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error : " . mysqli_connect_error();
}

	
$stmt = ("DELETE FROM tbl_classes WHERE id = '$id'");
$result = mysqli_query($conn,$stmt);

$_SESSION['reply'] = "007";					  
header("location:../classes");

}else{

header("location:../");

}

?>
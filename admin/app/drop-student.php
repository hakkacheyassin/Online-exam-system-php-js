<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');	
$id = $_GET['node'];
$av = $_GET['a'];

if ($av == "") {

}else{
	$unlink = '../../assets/uploads/avatar/'.$av.'';
	if (!unlink($unlink)) {

}
else{

}


}

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	echo "error : " . mysqli_connect_error();
}

	
$stmt = ("DELETE FROM tbl_students WHERE id = '$id'");
$result = mysqli_query($conn,$stmt);

$stmt = ("DELETE FROM tbl_ase4ssment_records WHERE student = '$id'");
$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "014";					  
header("location:../students");

}else{

header("location:../");

}

?>
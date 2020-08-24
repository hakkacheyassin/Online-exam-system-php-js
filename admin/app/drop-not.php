<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$notice_id = $_GET['node'];

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error : " . mysqli_connect_error();
}
	
$stmt = ("DELETE from tbl_notice WHERE id = '$id'");
$result = mysqli_query($conn,$stmt);

$_SESSION['reply'] = "031";
header("location:../notice");
                  
}else{

header("location:../");

}

?>

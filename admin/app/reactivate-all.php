<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$ass_id = $_GET['node'];


$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "error : " . mysqli_connect_error();
}
	
$stmt = ("DELETE FROM tbl_asessment_records WHERE exam = '$ass_id'");

$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "028";
header("location:../exams");


}else{

header("location:../");

}

?>

<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');	
$id = $_GET['node'];
$exam = $_GET['ex'];

$conn =  mysqli_connect($servername,$username,$password,$dbname);	
    if(!$conn)
    {
        echo "error : " . mysqli_connect_error();
    }
$stmt = ("DELETE FROM tbl_questions WHERE id = '$id'");
$result = mysqli_query($conn,$stmt);

$_SESSION['reply'] = "035";					  
header("location:../view-exam?node=$exam");

}else{

header("location:../");

}

?>
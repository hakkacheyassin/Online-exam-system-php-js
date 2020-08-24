<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "error : " . mysqli_connect_error();
}

if ($_POST['type'] == "1") {

$question = ucfirst($_POST['question']);
$op1 = ucfirst($_POST['op1']);
$op2 = ucfirst($_POST['op2']);
$op3 = ucfirst($_POST['op3']);
$op4 = ucfirst($_POST['op4']);
$answer = $_POST['answer'];
$type = $_POST['type'];
$exam = $_POST['examid'];


	
$stmt = ("INSERT INTO tbl_questions (question, type, op1, op2, op3, op4, answer, exam) VALUES ('$question', '$type', '$op1', '$op2', '$op3', '$op4', '$answer', '$exam')");
$result = mysqli_query($conn,$stmt);

$_SESSION['reply'] = "021";
header("location:../add-questions?node=$exam");
					  
}





if ($_POST['type'] == "2") {

$question = ucfirst($_POST['question']);
$answer = $_POST['answer'];
$type = $_POST['type'];
$exam = $_POST['examid'];


	
$stmt = ("INSERT INTO tbl_questions (question, type, answer, exam) VALUES ('$question', '$type', '$answer', '$exam')");
$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "021";
header("location:../add-questions?node=$exam");
}
}else{

header("location:../");

}

?>

<?php
$mysubjects = 0;
$myexams = 0;
$myassessment = 0;
$notice = 0;

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "error : " . mysqli_connect_error();
}
    $class = $_SESSION['class'];
    $id = $_SESSION['id'];
$stmt = ("SELECT * FROM tbl_subjects WHERE class = '$class'");
$result = mysqli_query($conn,$stmt);
$mysubjects = mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_exams WHERE class = '$class'");
$result = mysqli_query($conn,$stmt);
$myexams = mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_asessment_records WHERE student = $id");
$result = mysqli_query($conn,$stmt);
$myassessment = mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_notice");
$result = mysqli_query($conn,$stmt);
$notice = mysqli_num_rows($result);


?>
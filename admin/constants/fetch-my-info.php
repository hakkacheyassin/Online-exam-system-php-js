<?php
$mysubjects = 0;
$myexams = 0;
$mydepartments = 0;
$notice = 0;
$classes = 0;
$students = 0;


$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo "erreur " . mysqli_connect_error();
}
	
$stmt = "SELECT * FROM tbl_subjects";
$result  = mysqli_query($conn,$stmt);
$row = mysqli_fetch_array($result);
$mysubjects = mysqli_num_rows($result);

$stmt = "SELECT * FROM tbl_exams";
$result  = mysqli_query($conn,$stmt);

$row = mysqli_fetch_array($result);
$myexams = mysqli_num_rows($result);

$stmt = "SELECT * FROM tbl_departments";
$result  = mysqli_query($conn,$stmt);

$row = mysqli_fetch_array($result);
$mydepartments =mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_notice");
$result  = mysqli_query($conn,$stmt);

$row = mysqli_fetch_array($result);
$notice = mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_classes");
$result  = mysqli_query($conn,$stmt);
$row = mysqli_fetch_array($result);
$classes = mysqli_num_rows($result);

$stmt = ("SELECT * FROM tbl_students");
$result  = mysqli_query($conn,$stmt);

$row = mysqli_fetch_array($result);
$students = mysqli_num_rows($result);





?>
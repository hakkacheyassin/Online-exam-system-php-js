<?php
session_start();
//configuration file
require_once('../constants/config.php');

$email_address = $_POST['email'];
$login = $_POST['password'];


$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo "erreur " . mysqli_connect_error();
}
	
$stmt = "SELECT email,login,role,avator FROM tbl_admin WHERE email = '$email_address' 
    UNION SELECT email,login,role,avator FROM tbl_students WHERE email = '$email_address'";
$result = mysqli_query($conn,$stmt);


if (mysqli_num_rows($result) > 0) {

		$row = mysqli_fetch_array($result);
		$role = $row['role'];
		$avator = $row['avator'];		

switch ($role) {
	case 'admin':
		# verifying password
	if ($login == $row['login']) {

	admin_login();

	}else{

	$_SESSION['reply'] = "001";
    header("location:../../");

	}
		break;
	
	case 'student':

	if ($login==$row['login']) {

	student_login();

	}else{

	$_SESSION['reply'] = "001";
    header("location:../../");

	}
		break;
}

}else{

$_SESSION['reply'] = "001";
header("location:../../");

}


function admin_login() {

$_SESSION['logged'] = "1";
$_SESSION['role'] = "admin";
$_SESSION['email'] = $GLOBALS['email_address'];
$_SESSION['avator'] = $GLOBALS['avator'];
header("location:../../admin");

}


function student_login() {
require('../constants/config.php');
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "oes";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
$_SESSION['logged'] = "1";
$_SESSION['role'] = "student";
$_SESSION['email'] = $GLOBALS['email_address'];
$_SESSION['avator'] = $GLOBALS['avator'];

	$email = $_SESSION['email'];
	$sql ="SELECT * FROM tbl_students WHERE email = '$email'";
	$result1 = mysqli_query($conn,$sql);
	$row1 = mysqli_fetch_array($result1);


    	$_SESSION['id'] = $row1['id'];
    	$_SESSION['fname'] = $row1['first_name'];
    	$_SESSION['lname'] = $row1['last_name'];
    	$_SESSION['gender'] = $row1['gender'];
    	$_SESSION['dep'] = $row1['department'];
    	$_SESSION['class'] = $row1['class'];
		
	

	header("location:../../student");
					  
	}
    
?>
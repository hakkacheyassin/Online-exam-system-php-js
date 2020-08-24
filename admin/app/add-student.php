<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = 'ST-'.get_rand_numbers(6).'';
$fname = ucwords($_POST['fname']);
$lname = ucwords($_POST['lname']);
$gender = $_POST['gender'];
$email = $_POST['email'];
$dep = $_POST['department'];
$class = $_POST['class'];

$login_pass = password_hash(strtoupper(''.$fname.''.$lname.''), PASSWORD_DEFAULT);

$conn = mysqli_connect($servername,$username, $password, $dbname);
if(!$conn)
{
	echo "error : " . mysqli_connect_error();
}

$stmt = ("SELECT email FROM tbl_admin WHERE email = '$email_address' UNION SELECT email FROM tbl_students WHERE email = '$email_address'");
$result = mysqli_query($conn,$stmt);

$rec = mysqli_num_rows($result);

if ($rec > 0) {

$_SESSION['reply'] = "012";
header("location:../students");

}else{
if($dep = "Computer Science")
{
	// insert the student in online exam
	$dbname = "myjudge";
	$conn1 = mysqli_connect($servername,$username,$password,$dbname);
	if(!$conn1)
	{
		echo "error: " . mysqli_connect($conn);
	}
	$usern = ucwords(''.$fname.''.$lname.'');
	$pass = $login_pass;
	$disp_name = $usern;
	$email = $email;
	$role =
	$query = "insert into shj_users()";
}

$stmt = $conn->prepare("INSERT INTO tbl_students (id, first_name, last_name, gender, department, class, email, login) VALUES ('$id', '$fname', '$lname', '$gender', '$gender', '$dep', '$class', '$email','$login_pass')");

$_SESSION['reply'] = "013";
header("location:../students");
}
}else{

header("location:../");

}

?>

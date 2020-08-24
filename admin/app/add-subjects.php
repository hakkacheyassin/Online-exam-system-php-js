<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = 'SB-'.get_rand_numbers(6).'';
$name = ucwords($_POST['name']);
$dep = $_POST['department'];
$class = $_POST['class'];
$reg_date = date('d/m/Y');

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "error : " . mysqli_connect_error();
}
	
$stmt = ("SELECT * FROM tbl_subjects WHERE name = '$name' AND department = '$dep' AND class = '$class'");
$result = mysqli_query($conn,$stmt);
$rec = mysqli_num_rows($result);

if($rec > 0) {
    $_SESSION['reply'] = "002";
    header("location:../subjects");
}
else{
$stmt = "INSERT INTO tbl_subjects (id, name, department, class, reg_date) VALUES ('$id', '$name', '$dep', '$class', '$reg_date')";
$result = mysqli_query($conn,$stmt);

$_SESSION['reply'] = "009";
header("location:../subjects");

}
}

?>

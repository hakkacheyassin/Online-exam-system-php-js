<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = 'DP-'.get_rand_numbers(6).'';
$name = ucwords($_POST['name']);
$reg_date = date('d/m/Y');


$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    echo "fail : " . mysqli_connect_error();
}

	
$stmt = ("SELECT * FROM tbl_departments WHERE name = '$name'");
$result = mysqli_query($conn,$stmt);
$rec = mysqli_num_rows($result);

if ($rec > 0) {

    $_SESSION['reply'] = "002";
    header("location:../departments");

}else{

$stmt = "INSERT INTO tbl_departments (id, name, reg_date) VALUES ('$id', '$name', '$reg_date')";
$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "003";
header("location:../departments");

}

}else{

header("location:../");

}

?>

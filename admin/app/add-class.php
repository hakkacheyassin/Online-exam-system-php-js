<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
require_once('../../assets/constants/uniques.php');

$id = 'CL-'.get_rand_numbers(6).'';
$name = ucwords($_POST['name']);
$dep = $_POST['department'];
$reg_date = date('d/m/Y');

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    echo "erreur" . mysqli_connect_error();
}

	
$stmt = "SELECT * FROM tbl_classes WHERE name = '$name' AND department = '$dep'";
$result  = mysqli_query($conn,$stmt);
$rec = mysqli_num_rows($result);

if ($rec > 0) {

$_SESSION['reply'] = "002";
header("location:../classes");

}else{

$stmt = "INSERT INTO tbl_classes (id, name, department, reg_date) VALUES ('$id', '$name', '$dep', '$reg_date')";
$result = mysqli_query($conn,$stmt);
$_SESSION['reply'] = "006";
header("location:../classes");

}

}else{

header("location:../");

}

?>

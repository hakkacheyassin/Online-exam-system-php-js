<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');
$new_file_name = "";
$old_avator = $_GET['node'];
$unlink = '../../assets/uploads/avatar/'.$old_avator.'';


if (!unlink($unlink))
  {

  }
else
  {

  }
$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
  echo "error : " . mysqli_connect_error();
}
	
$stmt = ("UPDATE tbl_admin SET avator = '$new_file_name'");
$result = mysqli_query($conn,$stmt);

$_SESSION['avator'] = $new_file_name;
$_SESSION['reply'] = "022";
header("location:../account");

}else{

	header("location:../");
}


?>
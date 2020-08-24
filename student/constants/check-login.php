<?php

session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "student") {

$myemail = $_SESSION['email'];
$myvataor = $_SESSION['avator'];
$myid = $_SESSION['id'];
$myfname = $_SESSION['fname'];
$mylname = $_SESSION['lname'];
$mygender = $_SESSION['gender'];
$mydep = $_SESSION['dep'];
$myclass = $_SESSION['class'];

}else{

header("location:../");

}

?>
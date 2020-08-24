<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "admin") {

require_once('../../assets/constants/config.php');

if ($_POST['type'] == "1") {
$question_id = $_POST['ques'];
$question = ucfirst($_POST['question']);
$op1 = ucfirst($_POST['op1']);
$op2 = ucfirst($_POST['op2']);
$op3 = ucfirst($_POST['op3']);
$op4 = ucfirst($_POST['op4']);
$answer = $_POST['answer'];
$type = $_POST['type'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_questions SET question = :ques, op1 = :op1, op2 = :op2, op3 = :op3, op4 = :op4, answer = :answer WHERE id = :id");
$stmt->bindParam(':ques', $question);
$stmt->bindParam(':op1', $op1);
$stmt->bindParam(':op2', $op2);
$stmt->bindParam(':op3', $op3);
$stmt->bindParam(':op4', $op4);
$stmt->bindParam(':answer', $answer);
$stmt->bindParam(':id', $question_id);
$stmt->execute();

$_SESSION['reply'] = "036";
header("location:../edit-question?node=$question_id");
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

}



if ($_POST['type'] == "2") {

$question = ucfirst($_POST['question']);
$answer = $_POST['answer'];
$type = $_POST['type'];
$question_id = $_POST['ques'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_questions SET question = :ques, answer = :answer WHERE id = :id");
$stmt->bindParam(':ques', $question);
$stmt->bindParam(':answer', $answer);
$stmt->bindParam(':id', $question_id);
$stmt->execute();

$_SESSION['reply'] = "036";
header("location:../edit-question?node=$question_id");
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}



}else{

header("location:../");

}

?>

<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == "1" && $_SESSION['role'] == "student") {

require_once('../../assets/constants/config.php');
$enroll_number = $_GET['opt'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_enroll_numbers WHERE code = :code AND student = :student AND exam = :exam");
$stmt->bindParam(':code', $enroll_number);
$stmt->bindParam(':student', $_SESSION['id']);
$stmt->bindParam(':exam', $_SESSION['current_examid']);
$stmt->execute();
$result = $stmt->fetchAll();

$rec = count($result);

if ($rec > 0) {

    foreach($result as $row)
    {
		
$deadline_conv = date_format(date_create_from_format('d F, Y', $row['expire_date']), 'Y/m/d');
$today_date = date('Y/m/d');

if(strtotime($today_date) >= strtotime($deadline_conv)){ 

?>
	<div class="alert alert-warning" role="alert">
     Enroll number is already expired.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
     </div>
     <div class="col-md-5">
     <input id="enrollnumber" type="text" class="form-control" placeholder="Enter your enroll number eg: EN-XXX-XXX-XXX">
     </div>
     <div class="col-md-2 mt-3 mt-md-0">
      <button onclick="update(enrollnumber.value)" class="btn btn-primary btn-block">Check Number</button>
    </div>

<?php
}else{

$_SESSION['exam_allowed'] = "YES";

?>
<a class="btn btn-primary m-1" onclick = "return confirm('Are you sure you want to begin the assessment ?');" href="assessment">Begin Assessment</a>
<?php
}


}



	

}else{
	?>
	<div class="alert alert-warning" role="alert">
     Enroll number appears to be invalid.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
     </div>
     <div class="col-md-5">
     <input id="enrollnumber" type="text" class="form-control" placeholder="Enter your enroll number eg: EN-XXX-XXX-XXX">
     </div>
     <div class="col-md-2 mt-3 mt-md-0">
      <button onclick="update(enrollnumber.value)" class="btn btn-primary btn-block">Check Number</button>
    </div>


	<?php
}

foreach($result as $row)
{
		

}
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


}else{

	header("location:../");
}


?>
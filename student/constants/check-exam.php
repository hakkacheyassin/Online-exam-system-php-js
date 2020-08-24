<?php
if (isset($_GET['node'])) {

	$exam_id = $_GET['node'];

	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$stmt = $conn->prepare("SELECT a.*, b.*, c.*, d.* FROM tbl_exams a LEFT JOIN tbl_departments b ON a.department = b.id LEFT JOIN tbl_classes c ON a.class = c.id LEFT JOIN tbl_subjects d ON a.subject = d.id WHERE a.class = :myclass AND a.exam_id = :examid");
	 $stmt->bindParam(':myclass', $_SESSION['class']);
	 $stmt->bindParam(':examid', $exam_id);
	
	$stmt->execute();
	$result = $stmt->fetchAll();
	$rec = count($result);

	if ($rec > 0) {

	}else{

		header("location:../");
	}

    foreach($result as $row)
    {
    	$exam_name = $row[1];
    	$exam_duration = $row[2];
    	$exam_passmark = $row[3];
    	$exam_retake = $row[4];
    	$exam_deadline = $row[5];
    	$exam_type = $row[9];
    	$exam_fee = $row[10];
    	$exam_terms = $row[11];
    	$exam_status = $row[12];
    	$exam_department = $row[14];
    	$exam_class = $row[17]; 
		$exam_subject = $row[21];
		$dcv = date_format(date_create_from_format('d F, Y', $row['deadline']), 'Y/m/d');


		
	}

	if ($exam_type == "Free") { 
	$exam_fee = "-NIL-";
    } else {
    $exam_fee = ''.$exam_fee.' '.$currency.'';
    }

    $today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$exam_retake.' days'));
    $next_retake = date_format(date_create_from_format('m/d/Y', $next_retake), 'd F, Y');

  
    $deadline_conv = date_format(date_create_from_format('d F, Y', $exam_deadline), 'Y/m/d');
    $nxt_retake_conv = date_format(date_create_from_format('d F, Y', $next_retake), 'Y/m/d');

	if(strtotime($today_date) >= strtotime($deadline_conv)){ 
    $exam_expired = "YES";
	}else{
	$exam_expired = "NO";
	}




					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


    $stmt = $conn->prepare("SELECT * FROM tbl_questions WHERE exam = :exam");
    $stmt->bindParam(':exam', $exam_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $questions = count($result);

    $stmt = $conn->prepare("SELECT * FROM tbl_asessment_records WHERE student = :student AND exam = :exam");
    $stmt->bindParam(':student', $_SESSION['id']);
    $stmt->bindParam(':exam', $exam_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);

    if ($rec > 0) {
    	$exam_attended = "1";
    }else{
    	$exam_attended = "0";
	}

	
	if(strtotime($today_date) >= strtotime($nxt_retake_conv)){ 
	$retake_allowed = "YES";
	}else{
	$retake_allowed = "NO";
	}

     foreach($result as $row)
     {
		 $a_date_taken = $row['date_taken'];
		
	 }

	 if ($exam_attended == "1") {

		$a_date_taken = date_format(date_create_from_format('d/m/Y h:i:s', $a_date_taken), 'Y/m/d');
		$retakeconv = $a_date_taken;
		$tc = strtotime($today_date);
		$rc = strtotime($retakeconv);
		$td = ($tc - $rc)/86400;
   
		$next_retake_b = date('d F, Y', strtotime($a_date_taken. ' + '.$exam_retake.' days'));

	 }




}else{

	header("location:./");
}

?>
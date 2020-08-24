<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$stmt = $conn->prepare("SELECT * FROM tbl_questions WHERE exam = :exam");
	$stmt->bindParam(':exam', $exam_id);
	$stmt->execute();
	$result = $stmt->fetchAll();

	$q = 1;

    foreach($result as $row)
    {
    	?>
    	<li class="nav-item">
        <a class="nav-link <?php if ($q == "1") { print ' active show'; }  ?>" id="#q<?php echo $q; ?>-tab" data-toggle="tab" href="#q<?php echo $q; ?>" role="tab" aria-controls="homeBasic" aria-selected="true"><?php echo $q; ?></a>
        </li>


        <?php
        $q++;
    	

	}
					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>

<?php
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_asessment_records a LEFT JOIN tbl_exams b ON a.exam = b.exam_id 
                                    LEFT JOIN tbl_students c ON a.student = c.id WHERE a.student = :me  ORDER BY a.id DESC LIMIT 5");
$stmt->bindParam(':me', $_SESSION['id']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
    ?>  <tr>
        <td><?php echo $row[7]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?>%</td>
     
        <?php
         $score = $row[5];
         $passmark = $row[9];
        if ($score >= $passmark) {
        $status = "<span style='font-size:12px;' class='badge badge-success'>You Passed!</span>";
        }else{
        $status = "<span style='font-size:12px;' class='badge badge-warning'>You Failed!</span>";
        }

            ?>

        <td><?php echo $status; ?></td>
        </tr>

        <?php

		
}
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
<?php
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_asessment_records a LEFT JOIN tbl_exams b ON a.exam = b.exam_id 
    LEFT JOIN tbl_students c ON a.student = c.id ORDER BY a.id DESC LIMIT 5");
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
    ?>  <tr>
        <td><?php echo $row[20]; ?> <?php echo $row[21]; ?></td>
        <td><?php echo $row[7]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?>%</td>
     
        <?php
         $score = $row[5];
         $passmark = $row[9];
        if ($score >= $passmark) {
        $status = "<span style='font-size:12px;' class='badge badge-success'>Passed!</span>";
        }else{
        $status = "<span style='font-size:12px;' class='badge badge-warning'>Failed!</span>";
        }

            ?>

        <td><?php echo $status; ?></td>
        <td><a onclick="return confirm('Are you sure you want to re-acativate ?');" href="app/reactivate.php?node=<?php echo $row[0]; ?>&src=../" class="btn btn-primary btn-sm m-0">Re-activate</a></td>
        </tr>

        <?php

		
}
					  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
?>
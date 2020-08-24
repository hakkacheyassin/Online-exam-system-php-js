<?php
require_once('../../assets/constants/config.php');
$class_id = $_GET['opt'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM tbl_subjects WHERE class = :class ORDER BY name");
$stmt->bindParam(':class', $class_id);
$stmt->execute();
$result = $stmt->fetchAll();

print '<option value="" disabled selected>Select Subject</option>';

foreach($result as $row)
{
print '<option value="'.$row[0].'">'.$row[1].'</option>';
        
}
                      
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>

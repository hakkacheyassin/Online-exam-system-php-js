<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
	$stmt = $conn->prepare("SELECT * FROM tbl_questions WHERE exam = :exam ORDER BY rand()");
	$stmt->bindParam(':exam', $exam_id);
	$stmt->execute();
	$result = $stmt->fetchAll();

	$q = 1;

    foreach($result as $row)
    {
    	$qs = $row['question'];
		$type = $row['type'];
		$op1 = $row['op1'];
		$op2 = $row['op2'];
		$op3 = $row['op3'];
		$op4 = $row['op4'];
		$answer = $row['answer'];
    	?>

        <div class="tab-pane fade<?php if ($q == "1") { print '  active show '; } ?>" id="q<?php echo $q; ?>" role="tabpanel" aria-labelledby="q<?php echo $q; ?>">
          <?php echo $q; ?> . <?php echo $row['question'];  print '<br>';

          if ($type == "1") {

           ?><br><div style="margin-left:20px;">
           <label class="radio radio-outline-primary">
             <input type="radio" name="q<?php echo $q; ?>" value="<?php echo $row['op1']; ?>">
             <span><?php echo $op1; ?></span>
             <span class="checkmark"></span>
              </label>

              <label class="radio radio-outline-primary">
              <input type="radio" name="q<?php echo $q; ?>" value="<?php echo $row['op2']; ?>">
             <span><?php echo $op2; ?></span>
             <span class="checkmark"></span>
              </label>

              <label class="radio radio-outline-primary">
              <input type="radio" name="q<?php echo $q; ?>" value="<?php echo $row['op3']; ?>">
             <span><?php echo $op3; ?></span>
             <span class="checkmark"></span>
              </label>

              <label class="radio radio-outline-primary">
              <input type="radio" name="q<?php echo $q; ?>" value="<?php echo $row['op4']; ?>">
             <span><?php echo $op4; ?></span>
             <span class="checkmark"></span>
              </label>
              <?php
              switch ($row['answer']) {
                case 'op1':
                $realanswer = $row['op1']; 
                break;
                case 'op2':
                $realanswer = $row['op2']; 
                break;

                case 'op3':
                $realanswer = $row['op3']; 
                break;

                case 'op4':
                $realanswer = $row['op4']; 
                break;
              }
              ?>

              <input type="hidden" name="a<?php echo $q; ?>" value="<?php echo base64_encode($realanswer); ?>">
          </div>




          <?php
          }


          if ($type == "2") {


          	?><br>
          	<div style="margin-left:20px;">
          	<div class="form-group">
            <input name="q<?php echo $q; ?>"  type="text" class="form-control">
            <input type="hidden" name="a<?php echo $q; ?>" value="<?php echo base64_encode($row['answer']); ?>">
            </div>
            </div>



          	<?php






          }



          ?>


        

       </div>

        <?php
    	
    	$q++;

	}
					  
	}catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


?>

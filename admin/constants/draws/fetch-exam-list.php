<?php


    $conn =mysqli_connect($servername,$username,$password,$dbname);
  $stmt = ("SELECT * FROM tbl_questions WHERE exam = '$exam_id' ORDER BY id");
	$result  = mysqli_query($conn,$stmt);
	$q = 1;
  
  ?>
    <?php while($row = mysqli_fetch_array($result)): ?>
     <?php
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
            <input  <?php if ($answer == "op1") { print ' checked ';} ?> type="radio">
            <span><?php echo $op1;?></span>
            <span class="checkmark"></span>
            </label>

              <label class="radio radio-outline-primary">
             <input  <?php if ($answer == "op2") { print ' checked ';} ?> type="radio">
             <span><?php echo $op2; ?></span>
             <span class="checkmark"></span>
              </label>

              <label class="radio radio-outline-primary">
             <input <?php if ($answer == "op3") { print ' checked ';} ?> type="radio">
             <span><?php echo $op3; ?></span>
             <span class="checkmark"></span>
             </label>

              <label class="radio radio-outline-primary">
             <input <?php if ($answer == "op4") { print ' checked ';} ?> type="radio">
             <span><?php echo $op4; ?></span>
             <span class="checkmark"></span>
              </label>
          </div>
    
          <hr>
          <a class="btn btn-primary m-1" href="edit-question?node=<?php echo $row['id']; ?>">Edit</a>
          <a onclick="return confirm('Delete question ?');"  class="btn btn-danger m-1" href="app/drop-question?node=<?php echo $row['id']; ?>&ex=<?php echo $exam_id; ?>">Delete</a>




          <?php
          }


          if ($type == "2") {


          	?><br>
          	<div style="margin-left:20px;">
          	<div class="form-group">
            <input type="text" class="form-control" value="<?php echo $answer; ?>">
            </div>
            </div>
             <hr>
          <a class="btn btn-primary m-1" href="edit-question?node=<?php echo $row['id']; ?>">Edit</a>
          <a onclick="return confirm('Delete question ?');" class="btn btn-danger m-1" href="app/drop-question?node=<?php echo $row['id']; ?>&ex=<?php echo $exam_id; ?>">Delete</a>



          	<?php






          }



          ?>


        

       </div>

        <?php
    	
    	$q++; ?>

        
        

  <?php endwhile; ?>


    

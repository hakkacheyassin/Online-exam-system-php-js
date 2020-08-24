<?php


    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        echo "fail : " . mysqli_connect_error();
    }
	$stmt = ("SELECT * FROM tbl_questions WHERE exam = '$exam_id' ORDER BY id");
    $result = mysqli_query($conn,$stmt);
    $q = 1;
?>
    <?php while($row = mysqli_fetch_array($result)) : ?>
    
    	<li class="nav-item">
        <a class="nav-link <?php if ($q == "1") { print ' active show'; }  ?>" id="#q<?php echo $q; ?>-tab" data-toggle="tab" href="#q<?php echo $q; ?>" role="tab" aria-controls="homeBasic" aria-selected="true"><?php echo $q; ?></a>
        </li>
    <?php $q++; ?> 
    
    <?php endwhile; ?> 
    	


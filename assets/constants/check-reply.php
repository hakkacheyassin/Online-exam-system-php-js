<?php

if (isset($_SESSION['reply'])) {
	$error_code = $_SESSION['reply'];



    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        echo   "fail : ". mysqli_connect_error();
    }


	
    $sql = "SELECT * FROM tbl_alerts WHERE code = '$error_code'";

    $result = mysqli_query($conn,$sql);
    if($result){
    foreach($result as $row)
    {
	
     print '
    <div class="alert alert-'.$row['type'].'" role="alert">
    '.$row['description'].'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
    </div>
     ';
	}
    }

    unset($_SESSION['reply']);


}

?>
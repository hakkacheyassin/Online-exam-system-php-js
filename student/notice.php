<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT * FROM tbl_admin");
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{

$adminemail = $row['email'];
$adminavator = $row['avator'];
        
}                 
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - Notice</title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">


</head>

<style>


</style>

<body>
    <div class="app-admin-wrap">
        <div class="main-header">
            <div class="logo">
                <img src="../assets/images/logo.png" alt="">
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>


            <div style="margin: auto"></div>

            <div class="header-part-right">

                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>


                <div class="dropdown">
                    <div class="user colalign-self-end">
                        <?php
                        if ($myvataor == null) {

                        print ' <img class="img-crop" src="../assets/images/blank_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                        }else{

                        print ' <img class="img-crop" src="../assets/uploads/avatar/'.$myvataor.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                        }

                        ?>
                       

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> <?php echo $myemail; ?>
                            </div>
                            <a class="dropdown-item" href="account">Account settings</a>
                            <a class="dropdown-item" href="../logout">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-content-wrap">
            <div class="sidebar-left open" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="navigation-left">
                    <li class="nav-item ">
                        <a class="nav-item-hold" href="./">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="subjects">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text">Subjects</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="students">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Students</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="exams">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">Examinations</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item  active">
                        <a class="nav-item-hold" href="notice">
                            <i class="nav-icon i-Bell"></i>
                            <span class="nav-text">Notice</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item-hold" href="assessments">
                            <i class="nav-icon i-Data"></i>
                            <span class="nav-text">Assessment Records</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                </ul>
            </div>


            <div class="sidebar-overlay"></div>
        </div>


        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1>Notice</h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                    	<?php
                    	try {
    					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
						$stmt = $conn->prepare("SELECT * FROM tbl_notice ORDER BY id DESC");
						$stmt->execute();
						$result = $stmt->fetchAll();
						$colid = "1";

    					foreach($result as $row)
    					{
    		
    						?>
    						<div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapse<?php echo $colid; ?>" 
                                    <?php if ($colid == "1") { print ' aria-expanded="true" '; } ?>aria-controls="collapse<?php echo $colid; ?>">
                                        <?php echo $row['title']; ?>
                                    </button> <span class="badge badge-primary m-2"><?php echo $row['posted_date']; ?></span>
                                </h5>
                            </div>

                            <div id="collapse<?php echo $colid; ?>" 
                            	<?php if ($colid == "1") { 

                            	print ' class="collapse show" '; 

                                }else{ print ' class="collapse" ';
  
                                } 
                                ?> 
                                aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                  <?php echo $row['notice']; ?>
                                  <hr>
                                  <div class="d-flex align-items-center border-bottom-dotted-dim pb-3 mb-3">
                                 <?php
                                 if ($adminavator == null) {

                                    print '<img class="avatar-md rounded mr-3" src="../assets/images/blank_avatar.png" alt="">';

                                 }else{
                                    print '<img class="avatar-md rounded mr-3" src="../assets/uploads/avatar/'.$adminavator.'" alt="">';

                                 }

                                 ?>
                                
                                <div class="flex-grow-1">
                                    <h6 class="m-0">Administrator</h6>
                                    <p class="m-0 text-small text-muted"><?php echo $adminemail; ?></p>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $colid++;
		
						}
					  
						}catch(PDOException $e)
    					{
    					echo "Connection failed: " . $e->getMessage();
    					}

    					?>


                    </div>
                </div>
            </div>
                </div>


            </div>

            <div class="flex-grow-1"></div>
            <div class="app-footer">
                <div class="row">
                    <div class="col-md-9">
                        <p><strong>Online Examination System</strong></p>
                    </div>
                </div>
                <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                    <div class="d-flex align-items-center">
                        <img class="logo" src="../assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; <?php echo date('Y'); ?> Developed By <a href="https://www.instagram.com/__programmer/" class="text-muted" >Bwire  Mashauri</a></p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/perfect-scrollbar.min.js"></script>

    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
    <script src="../assets/js/datatables.script.js"></script>

</body>


</html>
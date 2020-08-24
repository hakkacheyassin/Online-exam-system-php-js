<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

if (isset($_GET['node'])) {

$student_id = $_GET['node'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_students a LEFT JOIN tbl_departments b ON a.department  = b.id LEFT JOIN tbl_classes c ON a.class = c.id WHERE a.id = :student");
$stmt->bindParam(':student', $student_id);
$stmt->execute();
$result = $stmt->fetchAll();
$rec = count($result);

if ($rec < 1) {
    header("location:./");
}

foreach($result as $row)
{
    $sfname = $row[1];
    $slname = $row[2];
    $semail = $row[6];
    $sgender = $row[3];
    $savator = $row[9];
    $sdepartment = $row[11];
    $sclass = $row[14];


}                 
}catch(PDOException $e){ }


}else{
    header("location:./");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - <?php echo $sfname; ?> <?php echo $slname; ?></title>
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

            <div class="d-flex align-items-center">
                <div class="search-bar">
                    <input type="text" placeholder="Search students..">
                    <i class="search-icon text-muted i-Magnifi-Glass1"></i>
                </div>
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
                    <li class="nav-item" >
                        <a class="nav-item-hold" href="./">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="departments">
                            <i class="nav-icon i-File"></i>
                            <span class="nav-text">Departments</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="classes">
                            <i class="nav-icon i-Folder-Open"></i>
                            <span class="nav-text">Classes</span>
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
                    <li class="nav-item  active">
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
                    <li class="nav-item">
                        <a class="nav-item-hold" href="notice">
                            <i class="nav-icon i-Bell"></i>
                            <span class="nav-text">Notice</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="enroll_numbers">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Enroll Numbers</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="school">
                            <i class="nav-icon i-Big-Data"></i>
                            <span class="nav-text">School Info</span>
                        </a>
                        <div class="triangle"></div>
                    </li>

                </ul>
            </div>


            <div class="sidebar-overlay"></div>
        </div>


        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="breadcrumb">
                <h1><?php echo $sfname; ?> Profile</h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
            
                            <div class="mr-3 ml-3">
                             <?php require_once('../assets/constants/check-reply.php') ;?>
                         </div>

                         <div class="col-md-12">
                            <div class="card card-ecommerce-3 o-hidden mb-4">
                                <div class="d-flex flex-column flex-sm-row">
                                    <div class="">
                                        <?php
                                    if ($savator == null) {

                                    print ' <img class="card-img-left myavatar"  src="../assets/images/blank_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    }else{

                                    print ' <img class="card-img-left myavatar"  src="../assets/uploads/avatar/'.$savator.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    }

                                    ?>

                
                                    </div>
                                    <div class="flex-grow-2 p-4">
                                        <h5 class="m-1"><?php echo $sfname; ?> <?php echo $slname; ?></h5>
                                          <p style="font-size:16px;" class="m-0">ID: <?php echo $student_id; ?></p>
                                        <p style="font-size:16px;" class="m-0">Email Address: <?php echo $semail; ?></p>
                                        <p style="font-size:16px;" class="m-0">Gender: <?php echo $sgender; ?></p>
                                        <p style="font-size:16px;" class="m-0">Department: <?php echo $sdepartment; ?></p>
                                        <p style="font-size:16px;" class="m-0">Class: <?php echo $sclass; ?></p>

                                    </div>
                                </div>
                            </div>
                            <h5>Assessment History</h5>

                        </div>

                            <div class="table-responsive">
                                <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr><th>Student</th>
                                            <th>Exam</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Score</th>
                                            <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                    $stmt = $conn->prepare("SELECT a.*, b.*, c.* FROM tbl_asessment_records a LEFT JOIN tbl_exams b ON a.exam = b.exam_id 
                                    LEFT JOIN tbl_students c ON a.student = c.id WHERE a.student = :student ORDER BY a.id");
                                    $stmt->bindParam(':student', $student_id);
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
                                    <td><a onclick="return confirm('Are you sure you want to re-acativate ?');" href="app/reactivate.php?node=<?php echo $row[0]; ?>&src=../student?node=<?php echo $student_id; ?>" class="btn btn-primary btn-sm m-0">Re-activate</a></td>
                                    </tr>

                                    <?php

        
                                    }
                      
                                    }catch(PDOException $e)
                                    {
                                    echo "Connection failed: " . $e->getMessage();
                                    }
                                    ?>


                                    </tbody>
                                    <tfoot>
                                         <tr><th>Student</th>
                                            <th>Exam</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Score</th>
                                            <th>Status</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
                            <p class="m-0">&copy; <?php echo date('Y'); ?> Developed By <a href="https://www.instagram.com/beatsbybwire/" class="text-muted" >Bwire  Mashauri</a></p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="search-ui">
        <div class="search-header">
            <img src="assets/images/logo.png" alt="" class="logo">
            <button class="search-close btn btn-icon bg-transparent float-right mt-2">
                <i class="i-Close-Window text-22 text-muted"></i>
            </button>
        </div>
        <form action="search" method="GET" autocomplete="OFF">
        <input type="text" name="keyword" required  placeholder="first name OR last name" class="search-input" autofocus>
        </form>

    </div>

    <script src="../assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/perfect-scrollbar.min.js"></script>

    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
    <script src="../assets/js/datatables.script.js"></script>

</body>


</html>
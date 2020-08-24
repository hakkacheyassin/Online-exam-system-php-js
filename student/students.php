<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - Students In My Class</title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
</head>

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
            <div class="sidebar-left open">
                <ul class="navigation-left">
                    <li class="nav-item" >
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
                    <li class="nav-item active">
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
                <h1>Students In My Class</h1>

            </div>

            <div class="separator-breadcrumb border-top"></div>
            <div class="row">
                        <?php

                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                        $stmt = $conn->prepare("SELECT * FROM tbl_students WHERE class = :class ORDER BY first_name");
                        $stmt->bindParam(':class', $_SESSION['class']);
                        $stmt->execute();
                        $result = $stmt->fetchAll();

                        foreach($result as $row)
                        {
                            ?>
                        <div class="col-md-3">
                            <div class="card card-profile-1 mb-4">
                                <div class="card-body text-center">
                                    <div class="avatar box-shadow-2 mb-3">
                         <?php
                        if ($row[9] == null) {

                        print ' <img class="img-crop2" src="../assets/images/blank_avatar.png" >';

                        }else{

                        print ' <img class="img-crop2" src="../assets/uploads/avatar/'.$row[9].'">';

                        }

                        ?>
                               
                                    </div>
                                    <h5 class="m-0"><?php echo $row[1]; ?> <?php echo $row[2]; ?></h5>
                                    <p class="mt-0 text-muted"><?php echo $row[3]; ?></p>
                                    <p class="mt-0 text-muted"><?php echo $row[6]; ?></p>


                                </div>
                            </div>
                        </div>
                        <?php
        

                        }

                        ?>




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
    <script src="../assets/js/vendor/echarts.min.js"></script>
    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/vendor/sweetalert2.min.js"></script>
    <script src="../assets/js/es5/echart.options.min.js"></script>
    <script src="../assets/js/es5/dashboard.v2.script.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
</body>

</html>
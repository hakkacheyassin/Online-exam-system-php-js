<?php
$myemail="";
$myvataor="";
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');
require_once('constants/fetch-my-info.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES</title>
    <link rel="icon" href="../assets/images/student.png">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
</head>

<body>
    <div class="app-admin-wrap"> <!-- 10326  -->

        <div class="main-header"><!-- 13311  -->


            <div class="logo">
                <img src="../assets/images/student.png" alt="">

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
                    <li class="nav-item active" >
                        <a class="nav-item-hold" href="./">
                            <i class="nav-icon i-Bar-Chart"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="departments">
                            <i class="nav-icon i-File"></i>
                            <span class="nav-text">Departments</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-item-hold" href="classes">
                            <i class="nav-icon i-Folder-Open"></i>
                            <span class="nav-text">Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="subjects">
                            <i class="nav-icon i-Library"></i>
                            <span class="nav-text">Subjects</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="students">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Students</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="exams">
                            <i class="nav-icon i-File-Horizontal-Text"></i>
                            <span class="nav-text">Examinations</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="notice">
                            <i class="nav-icon i-Bell"></i>
                            <span class="nav-text">Notice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="enroll_numbers">
                            <i class="nav-icon i-File-Clipboard-File--Text"></i>
                            <span class="nav-text">Enroll Numbers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-hold" href="school">
                            <i class="nav-icon i-Big-Data"></i>
                            <span class="nav-text">School Info</span>
                        </a>

                    </li>
                </ul>
            </div>

            <div class="sidebar-overlay"></div>
        </div>

        <div class="main-content-wrap sidenav-open d-flex flex-column">

            <div class="breadcrumb">
                <h1>Online Examination System</h1>
            </div>

            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-File-Cloud"></i>
                                    <p class="text-muted mt-2 mb-2">Departments</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($mydepartments); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Folders"></i>
                                    <p class="text-muted mt-2 mb-2">Classes</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($classes); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Open-Book"></i>
                                    <p class="text-muted mt-2 mb-2">Subjects</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($mysubjects); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-File-Bookmark"></i>
                                    <p class="text-muted mt-2 mb-2">Exams</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($myexams); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Student-MaleFemale"></i>
                                    <p class="text-muted mt-2 mb-2">Students</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($students); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-icon mb-4">
                                <div class="card-body text-center">
                                    <i class="i-Christmas-Bell"></i>
                                    <p class="text-muted mt-2 mb-2">Notice</p>
                                    <p class="text-primary text-24 line-height-1 m-0"><?php echo number_format($notice); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-md-12">
                    <div class="card o-hidden mb-4">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="w-50 float-left card-title m-0">Recent Assessments Taken</h3>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                               <?php require_once('../assets/constants/check-reply.php') ;?>

                                <table id="user_table" class="table dataTable-collapse text-center">
                                    <thead>
                                        <tr><th scope="col">Student</th>
                                            <th scope="col">Exam</th>
                                            <th scope="col">Start Time</th>
                                            <th scope="col">End Time</th>
                                            <th scope="col">Score</th>
                                            <th scope="col">Status</th>
                                             <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php require_once('constants/my-recent-assessment.php'); ?>

                                    </tbody>
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
                            <p class="m-0"> <?php echo date('Y'); ?> </p>
                            <p class="m-0"></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




    <!---->
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
    <script src="../assets/js/vendor/echarts.min.js"></script>
    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/vendor/sweetalert2.min.js"></script>
    <script src="../assets/js/es5/echart.options.min.js"></script>
    <script src="../assets/js/es5/dashboard.v2.script.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
</body>


</html>
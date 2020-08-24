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
                <h1>Notice</h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
            
                      
                            <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-icon-pill" data-toggle="pill" href="#addPIll" role="tab" aria-controls="homePIll" aria-selected="true">Add Notice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-icon-pill" data-toggle="pill" href="#mngPIll" role="tab" aria-controls="profilePIll" aria-selected="false">Manage Notice</a>
                                </li>

                            </ul><br>
                            <div class="mr-3 ml-3">
                             <?php require_once('../assets/constants/check-reply.php') ;?>
                         </div>
                            <div class="tab-content" id="myPillTabContent">
                                <div class="tab-pane fade active show" id="addPIll" role="tabpanel" aria-labelledby="home-icon-pill">
                           <div class="card mb-5">
                        <div class="card-body">
                            <form action="app/add-notice.php" method="POST" autocomplete="OFF">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Notice Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" required name="title" class="form-control" id="inputEmail3" placeholder="Enter notice title">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea required name="description" class="form-control" id="inputEmail3" ></textarea>
                                    </div>
                                </div>
     
  
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                                </div>
                                <div class="tab-pane fade" id="mngPIll" role="tabpanel" aria-labelledby="profile-icon-pill">
                           <div class="table-responsive">
                                <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Pinned</th>
                                            <th style="width:5px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $mid = 1;

    
                                    $stmt = $conn->prepare("SELECT * FROM tbl_notice");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php echo $row[2]; ?></td>
                                            <td><?php echo $row[3]; ?></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to delete ?')" title="Delete" href="app/drop-not.php?node=<?php echo $row[0]; ?>" class="btn btn-danger btn-sm m-1">
                                                  Delete
                                                </a>


       

                                            </td>
                                        </tr>

                                        <?php
                                         $mid++;
                                
        
                                    }
                      
                                    }catch(PDOException $e)
                                    {
                                    echo "Connection failed: " . $e->getMessage();
                                    }
                                    ?>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Pinned</th>
                                             <th style="width:10px;">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                                </div>
           
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
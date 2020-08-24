<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

if (isset($_GET['node'])) {

    $question_id = $_GET['node'];

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT * FROM tbl_questions WHERE id = :id");
    $stmt->bindParam(':id', $question_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);

    if ($rec < 1) {
        header("location:./");
    }

    foreach($result as $row)
    {
        $question = $row[1];
        $ques_type = $row[2];
        $op1 = $row[3];
        $op2 = $row[4];
        $op3 = $row[5];
        $op4 = $row[6];
        $answer = $row[7];
        

    }
                      
    }catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


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
    <title>OES - Edit Question</title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.date.css">


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
                            <a class="dropdown-item" href="../account">Account settings</a>
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
                    <li class="nav-item   active">
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
                <h1>Edit Question</h1>
                <p id="app_data"></p>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
            
                      
                            <ul class="nav nav-pills" id="myPillTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link 
                                    <?php
                                    if ($ques_type == '1') {

                                        print ' active show ';

                                    }else{
                                        print ' disabled ';
                                    }
                                    ?>

                                    " id="home-icon-pill" data-toggle="pill" href="#addPIll" role="tab" aria-controls="homePIll" aria-selected="true">Multiple Choice Questions</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link
                                     <?php
                                    if ($ques_type == '2') {

                                        print ' active show ';

                                    }else{
                                        print ' disabled ';
                                    }
                                    ?>

                                    " id="profile-icon-pill" data-toggle="pill" href="#mngPIll" role="tab" aria-controls="profilePIll" aria-selected="false">Filling Blank Space Questions</a>
                                </li>

                            </ul><br>
                            <div class="mr-3 ml-3">
                             <?php require_once('../assets/constants/check-reply.php') ;?>
                         </div>
                            <div class="tab-content" id="myPillTabContent">
                                <div class="tab-pane fade
                                    <?php
                                    if ($ques_type == '1') {

                                        print ' active show ';

                                    }
                                    ?> 


                                " id="addPIll" role="tabpanel" aria-labelledby="home-icon-pill">
                           <div class="card mb-5">
                        <div class="card-body">
                            <form action="app/update-question.php" method="POST" autocomplete="OFF">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Question</label>
                                    <div class="col-sm-10">
                                        <input type="text"  value="<?php echo $question; ?>" required name="question" class="form-control" id="inputEmail3" placeholder="Enter question">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Option 1</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="<?php echo $op1; ?>" required name="op1" class="form-control" id="inputEmail3" placeholder="Enter first option">
                                    </div>

                                    <div class="col-sm-2">
                                    <label class="radio radio-outline-primary">
                                    <input <?php if ($answer == "op1") { print 'checked="true" '; } ?> type="radio" name="answer" value="op1" required>
                                    <span>Mark as answer</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>

                                </div>



                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Option 2</label>
                                    <div class="col-sm-8">
                                        <input type="text"  value="<?php echo $op2; ?>" required name="op2" class="form-control" id="inputEmail3" placeholder="Enter second option">
                                    </div>

                                    <div class="col-sm-2">
                                    <label class="radio radio-outline-primary">
                                    <input <?php if ($answer == "op2") { print 'checked="true" '; } ?>  type="radio" name="answer" value="op2" required>
                                    <span>Mark as answer</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Option 3</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="<?php echo $op3; ?>" required name="op3" class="form-control" id="inputEmail3" placeholder="Enter third option">
                                    </div>

                                    <div class="col-sm-2">
                                    <label class="radio radio-outline-primary">
                                    <input type="radio"  <?php if ($answer == "op3") { print 'checked="true" '; } ?>  name="answer" value="op3" required>
                                    <span>Mark as answer</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>

                                </div>



                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Option 4</label>
                                    <div class="col-sm-8">
                                        <input type="text" required name="op4"  value="<?php echo $op4; ?>"  class="form-control" id="inputEmail3" placeholder="Enter fourth option">
                                    </div>

                                    <div class="col-sm-2">
                                    <label class="radio radio-outline-primary">
                                    <input type="radio" <?php if ($answer == "op4") { print 'checked="true" '; } ?> name="answer" value="op4" required>
                                    <span>Mark as answer</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>

                                </div>

                                 <input type="hidden" name="ques" value="<?php echo $question_id; ?>">
                                <input type="hidden" name="type" value="1">

     
  
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                                </div>
                     <div class="tab-pane fade
                     <?php
                    if ($ques_type == '2') {

                    print ' active show ';

                     }
                     ?>
                     " id="mngPIll" role="tabpanel" aria-labelledby="profile-icon-pill">
                          <div class="card mb-5">
                        <div class="card-body">
                            <form action="app/update-question.php" method="POST" autocomplete="OFF">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Question</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $question; ?>" required name="question" class="form-control" id="inputEmail3" placeholder="Enter question">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Answer</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $answer; ?>" required name="answer" class="form-control" id="inputEmail3" placeholder="Enter answer">
                                    </div>

                                </div>

                                <input type="hidden" name="ques" value="<?php echo $question_id; ?>">
                                <input type="hidden" name="type" value="2">

     
  
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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

    <script src="../assets/js/vendor/pickadate/picker.js"></script>
    <script src="../assets/js/vendor/pickadate/picker.date.js"></script>

    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
    <script src="../assets/js/datatables.script.js"></script>
    <script src="../assets/js/form.basic.script.js"></script>

        <script>
        $("[data-toggle=popover]").popover();
    </script>


</body>


</html>
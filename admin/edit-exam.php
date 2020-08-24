<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

if (isset($_GET['node'])) {

    $exam_id = $_GET['node'];

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT * FROM tbl_exams WHERE exam_id = :id");
    $stmt->bindParam(':id', $exam_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);

    if ($rec < 1) {
        header("location:./");
    }

    foreach($result as $row)
    {
        $exam_name = $row[1];
        $duration = $row[2];
        $passmark = $row[3];
        $reexam = $row[4];
        $deadline = $row[5];
        $department = $row[6];
        $class = $row[7];
        $subject = $row[8];
        $type = $row[9];
        $fee = $row[10];
        $terms = $row[11];
        

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
    <title>OES - Edit <?php echo $exam_name; ?></title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.date.css">

     <script type="text/javascript">
   function update(str)
   {

    var txt;
         var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("class-data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","constants/fetch-class.php?opt="+str, true);
      xmlhttp.send();

  }


</script>

<script>
         function updateb(str)
   {

    var txt;
         var xmlhttp;

      if (window.XMLHttpRequest)
      {
        xmlhttp=new XMLHttpRequest();
      }
      else
      {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("subject-data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","constants/fetch-subjects.php?opt="+str, true);
      xmlhttp.send();

  }
</script>

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
                <h1>Edit <?php echo $exam_name; ?></h1>
                <p id="app_data"></p>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                   
                            <div class="mr-3 ml-3">
                             <?php require_once('../assets/constants/check-reply.php') ;?>
                         </div>
                            <div class="tab-content" id="myPillTabContent">
                                <div class="tab-pane fade active show" id="addPIll" role="tabpanel" aria-labelledby="home-icon-pill">
                           <div class="card mb-5">
                        <div class="card-body">
                            <form action="app/update-exam.php" method="POST" autocomplete="OFF">
                                <input type="hidden" name="id" value="<?php echo $exam_id; ?>">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Exam Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $exam_name; ?>" required name="name" class="form-control" id="inputEmail3" placeholder="Enter exam name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Exam Duration (Minutes)</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="<?php echo $duration; ?>" required name="duration" class="form-control" id="inputEmail3" placeholder="Enter duration in minutes">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Passmark (%)</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="<?php echo $passmark; ?>" required name="passmark" class="form-control" id="inputEmail3" placeholder="Enter passmark in percent">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Re-exam (if student take exam then show it again after some days)</label>
                                    <div class="col-sm-10">
                                        <input type="number" value="<?php echo $reexam; ?>" required name="attempts" class="form-control" id="inputEmail3" placeholder="Enter days to attempt">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Deadline</label>
                                    <div class="col-sm-10">
                                      <input required id="picker2" value="<?php echo $deadline; ?>" class="form-control" placeholder="Deadline" name="deadline">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10">
                                        <select onchange="update(this.value)" required name="department" class="form-control" >
                                            <option value=""selected disabled>Select department</option>
                                            <?php
                                            try {
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                            $stmt = $conn->prepare("SELECT * FROM tbl_departments ORDER BY name");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach($result as $row)
                                            {
                                                print '<option value="'.$row[0].'">'.$row[1].'</option>';
        
                                            }
                      
                                            }catch(PDOException $e)
                                            {
                                            echo "Connection failed: " . $e->getMessage();
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Class</label>
                                    <div class="col-sm-10">
                                        <select onchange="updateb(this.value)" required id="class-data" name="class" class="form-control" >
                                            <?php
                                            try {
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                            $stmt = $conn->prepare("SELECT * FROM tbl_classes WHERE department = :dep ORDER BY name");
                                            $stmt->bindParam(':dep', $department);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach($result as $row)
                                            {
                                                print '<option'; if ($class == $row[0]) { print ' selected '; } print ' value="'.$row[0].'">'.$row[1].'</option>';
        
                                            }
                      
                                            }catch(PDOException $e)
                                            {
                                            echo "Connection failed: " . $e->getMessage();
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-10">
                                        <select required id="subject-data" name="subject" class="form-control" >

                                            <?php
                                            try {
                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
                                            $stmt = $conn->prepare("SELECT * FROM tbl_subjects WHERE class = :class ORDER BY name");
                                            $stmt->bindParam(':class', $class);
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach($result as $row)
                                            {
                                                print '<option'; if ($subject == $row[0]) { print ' selected '; } print ' value="'.$row[0].'">'.$row[1].'</option>';
        
                                            }
                      
                                            }catch(PDOException $e)
                                            {
                                            echo "Connection failed: " . $e->getMessage();
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Exam Type</label>
                                    <div class="col-sm-3">
                                    <label class="radio radio-outline-primary">
                                    <input type="radio" <?php if ($type == "Free") { print ' checked="true" '; } ?> name="type" value="Free" required>
                                    <span>Enroll students for Free</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="radio radio-outline-primary">
                                    <input type="radio" <?php if ($type == "Paid") { print ' checked="true" '; } ?> name="type" value="Paid" required>
                                    <span>Enroll students using enroll number</span>
                                    <span class="checkmark"></span>
                                    </label>
                                    </div>

                                 <div class="col-sm-3 input-group mb-3">
                                <input type="number" class="form-control" value="<?php echo $fee; ?>" name="price" placeholder="Exam fee if available" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><?php echo $currency; ?></span>
                                </div>
                            </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Terms and Conditions</label>
                                    <div class="col-sm-10">
                                        <textarea name="terms"  rows="6"  class="form-control" id="inputEmail3" >
                                         <?php echo $terms; ?>
                                        </textarea>
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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Department</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Deadline</th>
                                            <th style="width:90px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $mid = 1;

    
                                    $stmt = $conn->prepare("SELECT a.*, b.*, c.*, d.* FROM tbl_exams a LEFT JOIN tbl_departments b ON a.department = b.id LEFT JOIN tbl_classes c ON a.class = c.id LEFT JOIN tbl_subjects d ON a.subject = d.id");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr>
                                            <td><a data-container="body" data-toggle="popover" data-placement="right" 
                                           data-content="Exam ID : <?php echo $row[0]; ?> , Duration : <?php echo $row[2]; ?> Minutes , Passmark : <?php echo $row[3]; ?>% , Re-take exam after <?php echo $row[4]; ?> Days" data-original-title="" title=""><?php echo $row[1]; ?></a>
                                            </td>
                                            <td><?php echo $row[9]; ?></td>
                                            <td><?php echo $row[14]; ?></td>
                                            <td><?php echo $row[17]; ?></td>
                                            <td><?php echo $row[21]; ?></td>
                                            <td><?php echo $row[5]; ?></td>
                                            <td><center>
                                            <select onchange="javascript:location.href = this.value;">
                                            <option selected disabled>Select</option>
                                            <option value="edit-exam?node=<?php echo $row[0]; ?>">Edit Exam</option>
                                            <option value="view-exam?node=<?php echo $row[0]; ?>">View Exam</option>
                                            <option value="add-questions?node=<?php echo $row[0]; ?>">Add Questions</option>
                                            <option value="print-results?node=<?php echo $row[0]; ?>">Print Results</option>
                                            <option value="app/reactivate-all?node=<?php echo $row[0]; ?>">Re-acativate Assessments</option>
                                             <option value="app/drop-exam?node=<?php echo $row[0]; ?>">Delete</option>
                                            </select>
                                            </center>

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
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Department</th>
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Deadline</th>
                                            <th>Action</th>
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
<?php
require_once('constants/check-login.php');
require_once('../assets/constants/config.php');
require_once('constants/check-exam.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - <?php echo $exam_name; ?></title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.css">
    <link rel="stylesheet" href="../assets/styles/vendor/pickadate/classic.date.css">


</head>

 <script type="text/javascript">
   function update(str)
   {

	if(document.getElementById('enrollnumber').value == "")
   {
	alert("Please enter your enroll number");

    }else{
		  document.getElementById("data").innerHTML = "Please wait...";
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
          document.getElementById("data").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET","app/check-enrollment.php?opt="+str, true);
      xmlhttp.send();
}

  }
  

</script>

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
                    <li class="nav-item">
                        <a class="nav-item-hold" href="students">
                            <i class="nav-icon i-Administrator"></i>
                            <span class="nav-text">Students</span>
                        </a>
                        <div class="triangle"></div>
                    </li>
                    <li class="nav-item  active">
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
                <h1>Take Assessment</h1>

            </div>
            <div class="separator-breadcrumb border-top"></div>
             <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                                   <table class="table">
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <th scope="row">1</th>
                                                   <td>Exam Name</td>
                                                   <td><?php echo "$exam_name"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row">2</th>
                                                   <td>Subject</td>
                                                   <td><?php echo $exam_subject; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Deadline</td>
                                                   <td><?php echo $exam_deadline; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row">4</th>
                                                   <td>Duration</td>
                                                   <td><?php echo number_format($exam_duration); ?> <b>minutes</b></td>
                                               </tr>
											   
											  <tr>
                                                   <th scope="row">5</th>
                                                   <td>Next Re-take</td>
                                                   <td><?php echo $next_retake; ?></td>
                                               </tr>
											   
											   <tr>
                                                   <th scope="row">6</th>
                                                   <td>Passmark</td>
                                                   <td><?php echo $exam_passmark; ?>%</td>
                                               </tr>
											   
											   	<tr>
                                                   <th scope="row">7</th>
                                                   <td>Questions</td>
                                                   <td><?php echo $questions; ?></td>
                                               </tr>

                                               <tr>
                                                   <th scope="row">8</th>
                                                   <td>Exam Type</td>
                                                   <td><?php echo $exam_type; ?></td>
                                               </tr>

                                               	<tr>
                                                   <th scope="row">9</th>
                                                   <td>Exam Fee</td>
                                                   <td><?php echo $exam_fee; ?></td>
                                               </tr>
                                              
                                           </tbody>
                                        </table>


                    <div class="col-md-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       Terms and conditions
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                <?php echo $exam_terms; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><br>
                 <div class="col-md-12">
                

                <?php
                if ($exam_expired == "YES") {
                	print '<div class="alert alert-warning" role="alert">
                            <strong class="text-capitalize">Error!</strong> This exam is already expired, you can not attend it.
                           </div>';

                }else{

                if ($exam_status == "INACTIVE") {
                	  print '<div class="alert alert-warning" role="alert">
                            <strong class="text-capitalize">Error!</strong> This exam is not activated yet, contact your instructor for more information.
                           </div>';

                }else{

                if ($exam_type == "Free") {

                if ($exam_attended == "0") {

                $_SESSION['current_examid'] = $exam_id;
				$_SESSION['student_retake'] = 0;
				$_SESSION['exam_allowed'] = "YES";
				$_SESSION['exam_time'] = $exam_duration;
                $_SESSION['exam_title'] = $exam_name;
                $_SESSION['questions'] = $questions;
				?>
				<a class="btn btn-primary m-1" onclick = "return confirm('Are you sure you want to begin the assessment ?');" href="assessment">Begin Assessment</a>
 

				<?php


                }else{


                if ($td >= $exam_retake) {

                $_SESSION['current_examid'] = $exam_id;
                $_SESSION['student_retake'] = 1;
                $_SESSION['exam_allowed'] = "YES";
                $_SESSION['exam_time'] = $exam_duration;
                $_SESSION['exam_title'] = $exam_name;
                $_SESSION['questions'] = $questions;

                ?><a class="btn btn-primary m-1" onclick = "return confirm('Are you sure you want to begin the assessment ?');" href="assessment">Begin Assessment</a>
                <?php

                }else{

                print '<div class="alert alert-warning" role="alert">
                <strong class="text-capitalize">Exam Attended</strong><br>You have already attended this exam, you will be able to re-take it again on <strong>'.$next_retake_b.'</strong>.
                </div>';

                  }
                }
                


                }else{

                if ($exam_attended == "0") {

                $_SESSION['current_examid'] = $exam_id;
                $_SESSION['student_retake'] = 0;
                $_SESSION['exam_allowed'] = "NO";
                $_SESSION['exam_time'] = $exam_duration;
                $_SESSION['exam_title'] = $exam_name;
                $_SESSION['questions'] = $questions;

                ?>

                <div class="row row-xs col-sm-12" id="data">
                <div class="col-md-5">
                <input id="enrollnumber" type="text" class="form-control" placeholder="Enter your enroll number eg: EN-XXX-XXX-XXX">
                </div>
                <div class="col-md-2 mt-3 mt-md-0">
                <button onclick="update(enrollnumber.value)" class="btn btn-primary btn-block">Check Number</button>
                </div>
                </div>
 

        <?php


                }else{


                if ($td >= $exam_retake) {

                $_SESSION['current_examid'] = $exam_id;
                $_SESSION['student_retake'] = 1;
                $_SESSION['exam_allowed'] = "NO";
                $_SESSION['exam_time'] = $exam_duration;
                $_SESSION['exam_title'] = $exam_name;
                $_SESSION['questions'] = $questions;

                ?>

                <div class="row row-xs col-sm-12" id="data">
                <div class="col-md-5">
                <input id="enrollnumber" type="text" class="form-control" placeholder="Enter your enroll number eg: EN-XXX-XXX-XXX">
                </div>
                <div class="col-md-2 mt-3 mt-md-0">
                <button onclick="update(enrollnumber.value)" class="btn btn-primary btn-block">Check Number</button>
                </div>
                </div>
                <?php

                }else{

                print '<div class="alert alert-warning" role="alert">
                <strong class="text-capitalize">Exam Attended</strong><br>You have already attended this exam, you will be able to re-take it again on <strong>'.$next_retake_b.'</strong>.
                </div>';

                  }
                }




                }


                }


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
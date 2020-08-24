<?php
require_once('../assets/constants/config.php');
require_once('constants/check-login.php');

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT * FROM tbl_departments WHERE id = :dep");
$stmt->bindParam(':dep', $_SESSION['dep']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
        
$dep_name = $row[1];
}
                      
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
$stmt = $conn->prepare("SELECT * FROM tbl_classes WHERE id = :class");
$stmt->bindParam(':class', $_SESSION['class']);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
        
$class_name = $row[1];
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
    <title>OES - Account</title>
    <link rel="icon" href="../assets/images/favicon.ico">
    <link href="../assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/vendor/datatables.min.css">
    <link rel="stylesheet" href="../assets/styles/css/themes/lite-purple.min.css">
    <link rel="stylesheet" href="../assets/styles/vendor/perfect-scrollbar.css">
</head>

<style>
.myavatar {
     height:180px;
    width:180px;
    object-fit:cover;
}

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

                        print ' <img  class="img-crop" src="../assets/images/blank_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                        }else{

                        print ' <img  class="img-crop" src="../assets/uploads/avatar/'.$myvataor.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

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
                <h1>My Account</h1>

            </div>

            <div class="separator-breadcrumb border-top"></div>


            <div class="row">
                <div class="col-lg-12 col-md-12">
                   <?php require_once('../assets/constants/check-reply.php') ;?>
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="card-title">Profile Information</div>
                             
                                <div class="d-flex flex-column flex-sm-row">
                                    <div class="">
                                     <?php
                                    if ($myvataor == null) {

                                    print ' <img  id="blah" class="card-img-left myavatar"  src="../assets/images/blank_avatar.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    }else{

                                    print ' <img  id="blah" class="card-img-left myavatar"  src="../assets/uploads/avatar/'.$myvataor.'" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';

                                    }

                                    ?>
                                       
                                    </div>
                                    <div class="flex-grow-1 p-4">
                                        <h5 class="m-0"><?php echo $myfname; ?> <?php echo $mylname; ?></h5>
                                        <p class="m-0">ID: <?php echo $myid; ?></p>
                                        <p class="m-0">Email Address: <?php echo $myemail; ?></p>
                                        <p class="m-0">Gender: <?php echo $mygender; ?></p>
                                        <p class="m-0">Department: <?php echo $dep_name; ?></p>
                                        <p class="m-0">Class: <?php echo $class_name; ?></p>
                                        <p class="m-0">Update Avatar
                                        <form action="app/update-profile.php" method="POST" autocomplete="OFF" enctype="multipart/form-data" >
                                        <input type="file"  onchange="readURL(this);"  required name="image" accept="image/*" id="inputEmail3" >
                                        <script>
                                        function readURL(input) {
                                        if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                        $('#blah')
                                        .attr('src', e.target.result);
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                        }
                                        }
                                        </script>
                                        <input type="hidden" name="current" value="<?php echo $myvataor; ?>">
                                        <button type="submit" class="btn btn-primary btn-sm m-1">Save Changes</button>
                                        <?php
                                        if ($myvataor == null) {

                                        }else{
                                        ?><a class="btn btn-danger btn-sm m-1" onclick = "return confirm('Delete avatar ?');" href="app/drop-avatar.php?node=<?php echo $myvataor; ?>">Delete Avatar</a>
                                        <?php


                                        }
                                        ?>
                                        </form>

                                        </p>

                                    </div>
                                </div>
                       
                            
                        </div>
                    </div>


                        <div class="card mb-4">
                        <div class="card-body">

                            <div class="card-title">Password Update</div>
                               <form name="frm1" action="app/new-pw.php" method="POST" autocomplete="OFF">
                             
                                <div class="row row-xs">
                                <div class="col-md-5">
                                    <input type="password" name="password" required class="form-control" placeholder="Enter new password">
                                </div>
                                <div class="col-md-5 mt-3 mt-md-0">
                                    <input type="password" name="confirmpassword" required class="form-control" placeholder="Confirm new password">
                                </div>
                                <div class="col-md-2 mt-3 mt-md-0">
                                    <button onclick="return val_a();" type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </form>
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
    <script src="../assets/js/vendor/echarts.min.js"></script>
    <script src="../assets/js/vendor/datatables.min.js"></script>
    <script src="../assets/js/vendor/sweetalert2.min.js"></script>
    <script src="../assets/js/es5/echart.options.min.js"></script>
    <script src="../assets/js/es5/dashboard.v2.script.min.js"></script>
    <script src="../assets/js/es5/script.min.js"></script>
    <script>
        function val_a(){
if(frm1.password.value == "")
{
    alert("Enter the Password.");
    frm1.password.focus(); 
    return false;
}
if((frm1.password.value).length < 8)
{
    alert("Password should be minimum 8 characters.");
    frm1.password.focus();
    return false;
}

if((frm1.password.value).length > 20)
{
    alert("Password should be maximum 20 characters.");
    frm1.password.focus();
    return false;
}

if(frm1.confirmpassword.value == "")
{
    alert("Enter the Confirmation Password.");
    return false;
}
if(frm1.confirmpassword.value != frm1.password.value)
{
    alert("Password confirmation does not match.");
    return false;
}

return true;
}
</script>
</body>


</html>
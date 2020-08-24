
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
<style>

    </style>
<div>
    <div class="app-admin-wrap">


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




?>

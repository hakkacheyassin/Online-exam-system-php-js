<?php
session_start();
require_once('assets/constants/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - Reset Password</title>
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="assets/google-fonts/nunito.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
</head>

<body>
    <div class="auth-layout-wrap" style="background-image: url(assets/images/photo-wide-4.jpg);">
        <div class="auth-content" >
            <div class="card o-hidden col-md-6" style="margin:auto;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="assets/images/logo.png" alt="">
                            </div>
                            <center><h1 class="mb-3 text-18">Online Examination System</h1></center>
                            <?php


                            //checking for reply
                            require_once('assets/constants/check-reply.php');

                            ?>
                            <form action="assets/app/find-acc.php" method="POST" autocomplete="OFF">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" required class="form-control" type="email">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mt-2">Reset Password</button>

                            </form>

                            <div class="mt-3 text-center">
                                Have an account ? <a href="./" class="text-muted" >Login Here</a><br>
                                <label for="copyright">&copy; <?php echo date('Y'); ?> Developed By <a href="https://www.instagram.com/__programmer/" class="text-muted" >Bwire  Mashauri</a></label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/es5/script.min.js"></script>
</body>


</html>
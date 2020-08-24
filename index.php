<?php
session_start();
require_once('assets/constants/config.php');
// CONNEXION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brevet de Technicien Supérieur</title>
    <link rel="icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/styles/css/themes/lite-purple.min.css">
</head>




<body>
    <div class="auth-layout-wrap" style="background-image: url(assets/images/first.jpg);">
        <div class="auth-content" >
            <div class="card o-hidden col-md-6" style="margin:auto;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4">
                                <img src="assets/images/student.png" alt="">
                            </div>
                            <center><h1 class="mb-3 text-18">Brevet de Technicien Supérieur</h1><h3>LYCEE TECHNIQUE</h3></center>
                            <?php


                            //checking for reply
                            require_once('assets/constants/check-reply.php');

                            ?>
                            <form action="assets/app/auth.php" method="POST" autocomplete="OFF">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" name="email" required class="form-control" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" name="password" required class="form-control" type="password">
                                </div>
                                <button type="submit" class="btn btn-warning btn-block mt-2" id = "signin">Sign In</button>

                            </form>

                            <div class="mt-3 text-center">
                          <a href="reset-pw" class="text-muted">Mot de passe oublié</a><br>
                                <label for="copyright">&copy; <?php echo date('Y'); ?> LYCEE TECHNIQUE<a href="#" class="text-muted" ></a></label>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
</body>


</html>
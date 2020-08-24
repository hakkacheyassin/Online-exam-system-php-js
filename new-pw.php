<?php
session_start();
require_once('assets/constants/config.php');

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $conn->prepare("SELECT * FROM tbl_reset_tokens WHERE token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $rec = count($result);

    if ($rec > 0) {

    }else{
        header("location:./");
    }

    foreach($result as $row)
    {
        $_SESSION['reset_email'] = $row['user'];
        $_SESSION['reset_role'] = $row['role'];
        $email = $row['user'];
        $role = $row['role'];
    }
                      
    }catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


}else{

    header("location:../");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OES - Change Password</title>
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
                            <form name="frm1" action="assets/app/new-pw.php" method="POST" autocomplete="OFF">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email"  value="<?php echo $email; ?>" readonly="true" required class="form-control" type="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">New Password</label>
                                    <input id="email" name="password" required class="form-control" type="password">
                                </div>

                                <div class="form-group">
                                    <label for="email">Confirm New Password</label>
                                    <input id="email" name="confirmpassword" required class="form-control" type="password">
                                </div>

                                <button onclick="return val_a();" type="submit" class="btn btn-primary btn-block mt-2">Reset Password</button>

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
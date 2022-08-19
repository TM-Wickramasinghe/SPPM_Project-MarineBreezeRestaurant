<?php
include '../includes/security.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marine Breeze</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../css/style.css" <!-- End layout styles -->
    <link rel="shortcut icon" href="../../images/Logo.jpeg" />
</head>

<body>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <center><img class="img-fluid rounded-circle" src="../../images/Logo.jpeg"></center>
                            </div>
                            <h4>CHANGE PASSWORD</h4>
                            <form action="codelogin.php" method="POST" class="pt-3">
                                <input type="hidden" name="pwdtoken" value="<?php if (isset($_GET['token'])) {
                                                                                echo $_GET['token'];
                                                                            } ?>" readonly>
                                <div class="form-outline">
                                    <input type="email" value="<?php if (isset($_GET['aEmail'])) {
                                                                    echo $_GET['aEmail'];
                                                                } ?>" class="form-control form-control-lg b" id="email1" name="email1" placeholder="Enter Your Email Address">
                                </div><br>
                                <div class="form-outline">
                                    <input type="password" class="form-control form-control-lg b" id="pwd" name="pwd" placeholder="Enter New Password">
                                </div><br>
                                <div class="form-outline">
                                    <input type="password" class="form-control form-control-lg b" id="pwd1" name="pwd1" placeholder="Enter Confirm Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="reset" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">UPDATE PASSWORD</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <button type="submit" name="back" class="btn btn-block btn-dark btn-lg font-weight-medium auth-form-btn"><a href="login.php">LOGIN</a></button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <?php
            include '../includes/footer.php';
            ?>
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <?php
    include '../includes/script.php';
    ?>
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
                            <h4>Hello! Admin</h4>
                            <h6 class="font-weight-light">Please kindly sign in with your credentials.</h6>
                            <form action="codelogin.php" method="POST" class="pt-3">
                                <div class="form-outline">
                                    <input type="email" class="form-control form-control-lg b" id="email" name="email" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="pwd" name="pwd" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">
                                            <input type="checkbox" class="form-check-input" role="switch" id="flexSwitchCheckChecked" checked> Keep me signed in </label>
                                    </div>

                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>

                            </form>
                        </div>
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
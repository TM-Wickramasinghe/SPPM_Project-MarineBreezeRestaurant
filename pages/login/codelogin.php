<?php
include '../includes/security.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $desig = 'Admin';

    $query = "SELECT * FROM admin WHERE  aEmail='$email' AND aPwd = '$pwd' ";
    $query_run = mysqli_query($connection, $query);

    $query1 = "SELECT * FROM admin WHERE  Designation ='$desig' AND aEmail='$email' ";
    $query_run1 = mysqli_query($connection, $query1);
    if (!$query_run1) {
        echo $connection->error;
        exit;
    } else {
        if ($query_run || $query_run1) {

            if (mysqli_num_rows($query_run) == 1) {
                if (mysqli_num_rows($query_run1) == 1) {
                    $_SESSION['status'] = "LogIn Successful!";
                    $_SESSION['status_code'] = "success";
                    header('Location: ../admin/admin.php');
                } else {
                    $_SESSION['status'] = "LogIn Successful!";
                    $_SESSION['status_code'] = "success";
                    header('Location: ../product/items.php');
                }
            }
        } else {
            $_SESSION['status'] = "Invalid Username Or Password";
            $_SESSION['status_code'] = "error";
            header('Location: login.php');
        }
    }
}

//forget password

if (isset($_POST['forget'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email1']);

    $query = "SELECT * FROM admin WHERE  aEmail='$email' ";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {

        $query1 = "SELECT aPwd FROM admin WHERE  aEmail='$email' ";
        $query_run1 = mysqli_query($connection, $query1);

        if ($query_run1) {
            $subject = 'Marine Breeze Restaurant';
            $message = "Password for your account is $query1";
            $header = 'From:heartgame.hg@gmail.com';
            $retval = mail($email, $subject, $message, $header);
            if ($retval == true) {
                $_SESSION['status'] = "Email sent successfully!";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');
            } else {
                $_SESSION['status'] = "Email could not be sent!";
                $_SESSION['status_code'] = "error";
                header('Location: forgetpw.php');
            }
        } else {
            $_SESSION['status'] = "Something went wrong!";
            $_SESSION['status_code'] = "error";
            header('Location: forgetpw.php');
        }
    } else {
        $_SESSION['status'] = "Invalid Email!!!";
        $_SESSION['status_code'] = "error";
        header('Location: forgetpw.php');
    }
}

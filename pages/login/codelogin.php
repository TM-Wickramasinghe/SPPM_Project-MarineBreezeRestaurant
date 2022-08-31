<?php
include '../includes/security.php';

//login
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
                $user = mysqli_fetch_assoc($query_run);
                $_SESSION['name'] = $user['aName'];
                $_SESSION['desig'] = $user['Designation'];

                if (mysqli_num_rows($query_run1) == 1) {
                    $_SESSION['status'] = "LogIn Successful!";
                    $_SESSION['status_code'] = "success";
                    header('Location: ../admin/admin.php');
                } else {
                    $_SESSION['status'] = "LogIn Successful!";
                    $_SESSION['status_code'] = "success";
                    header('Location: ../product/items.php');
                }
            }else{
                $_SESSION['status'] = "Invalid Username Or Password";
                $_SESSION['status_code'] = "error";
                header('Location: login.php');
            }
        } else {
            $_SESSION['status'] = "Something went wrong.#1";
            $_SESSION['status_code'] = "error";
            header('Location: login.php');
        }
    }
}

//forget password

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["forget"])) {
    $email = mysqli_real_escape_string($connection, $_POST['email1']);
    $token = md5(rand());

    $check_email = "SELECT aEmail FROM admin WHERE  aEmail='$email' LIMIT 1";
    $check_email_run = mysqli_query($connection, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {

        $row = mysqli_fetch_array($check_email_run);
        $get_email = $row['aEmail'];

        $update_token = "UPDATE admin SET verifyToken='$token' WHERE aEmail='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($connection, $update_token);

        if ($update_token_run) {
            $mail = new PHPMailer(true);
            //Server settings

            $mail->isSMTP();                                                       //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                                 //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                               //Enable SMTP authentication
            $mail->Username   = 'marinebreeze3@gmail.com';                         //SMTP username
            $mail->Password   = 'uxuswdswirjdyzyh';                               //SMTP password
            $mail->SMTPSecure = 'ssl';                                            //Enable implicit TLS encryption
            $mail->Port       = 465;                                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('marinebreeze3@gmail.com');
            $mail->addAddress($get_email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Notification';

            $email_template = "
            <h3>Hello Admin,</h3>
            <h4>You are receiving this email because we received a password rese request for your account.</h4>
            <h5>Click here:</h5>
            <a href='http://localhost/SPPM_Project-MarineBreezeRestaurant-main/SPPM_Project-MarineBreezeRestaurant-main/pages/login/resetpw.php?token=$token&aEmail=$get_email'>Link<a/>
            ";

            $mail->Body    = $email_template;
            $mail->send();

            $_SESSION['status'] = "We Emailed You a Password Reset Link";
            $_SESSION['status_code'] = "success";
            header('Location: forgetpw.php');
            exit(0);
        } else {
            $_SESSION['status'] = "Something Went Wrong. #1";
            $_SESSION['status_code'] = "error";
            header('Location: forgetpw.php');
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Email Found!!!";
        $_SESSION['status_code'] = "error";
        header('Location: forgetpw.php');
        exit(0);
    }
}

if (isset($_POST["reset"])) {
    $email = mysqli_real_escape_string($connection, $_POST['email1']);
    $newpwd = mysqli_real_escape_string($connection, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($connection, $_POST['pwd1']);
    $token = mysqli_real_escape_string($connection, $_POST['pwdtoken']);

    if (!empty($token)) {
        if (!empty($email) && !empty($newpwd) && !empty($cpwd)) {

            //checking token is valid or not
            $chk_token = "SELECT verifyToken FROM admin WHERE  verifyToken='$token' LIMIT 1";
            $chk_token_run = mysqli_query($connection, $chk_token);

            if (mysqli_num_rows($chk_token_run) > 0) {

                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $newpwd);
                $lowercase = preg_match('@[a-z]@', $newpwd);
                $number = preg_match('@[0-9]@', $newpwd);
                $specialChars = preg_match('@[^\w]@', $newpwd);
                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpwd) < 8) {
                    $_SESSION['status'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character!";
                    $_SESSION['status_code'] = "error";
                    header("Location: resetpw.php?token='$token'&aEmail='$email'");
                    exit(0);
                } else {

                    if ($newpwd == $cpwd) {
                        $update_pwd = "UPDATE admin SET aPwd='$newpwd' WHERE verifyToken='$token' LIMIT 1";
                        $update_pwd_run = mysqli_query($connection, $update_pwd);

                        if ($update_pwd_run) {
                            $new_token = md5(rand());
                            $update_tonewtoken = "UPDATE admin SET verifyToken='$new_token' WHERE verifyToken='$token' LIMIT 1";
                            $update_tonewtoken_run = mysqli_query($connection, $update_tonewtoken);

                            $_SESSION['status'] = "New Password Successfully Updated!";
                            $_SESSION['status_code'] = "success";
                            header("Location: login.php");
                            exit(0);
                        } else {
                            $_SESSION['status'] = "Password not Updated, Something went Wrong.!";
                            $_SESSION['status_code'] = "error";
                            header("Location: resetpw.php?token=$token&aEmail=$email");
                            exit(0);
                        }
                    } else {
                        $_SESSION['status'] = "Password & Confirm Password does not match!";
                        $_SESSION['status_code'] = "error";
                        header("Location: resetpw.php?token=$token'&aEmail=$email");
                        exit(0);
                    }
                }
            } else {
                $_SESSION['status'] = "Invalid Token!";
                $_SESSION['status_code'] = "error";
                header("Location: resetpw.php?token=$token&aEmail=$email");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "All fields are Mandetory!!!";
            $_SESSION['status_code'] = "error";
            header("Location: resetpw.php?token=$token&aEmail=$email");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Token Available!!!";
        $_SESSION['status_code'] = "error";
        header('Location: resetpw.php');
        exit(0);
    }
}

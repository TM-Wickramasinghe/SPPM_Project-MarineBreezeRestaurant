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
            }
        } else {
            $_SESSION['status'] = "Invalid Username Or Password";
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

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marinebreeze3@gmail.com'; // Your gmail
    $mail->Password = 'uxuswdswirjdyzyh'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $email = mysqli_real_escape_string($connection, $_POST['email1']);

    $query = "SELECT * FROM admin WHERE  aEmail='$email' ";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {

        $query1 = "SELECT aPwd FROM admin WHERE  aEmail='$email' ";
        $query_run1 = mysqli_query($connection, $query1);

        if ($query_run1) {
            $subject = 'Marine Breeze Restaurant';
            $message = "Password for your account is " . $query1;

            $mail->setFrom('marinebreeze3@gmail.com'); // Your gmail

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            $_SESSION['status'] = "Email sent successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: login.php');
        } else {
            $_SESSION['status'] = "Email could not be sent!";
            $_SESSION['status_code'] = "error";
            header('Location: forgetpw.php');
        }
    } else {
        $_SESSION['status'] = "Invalid Email!!!";
        $_SESSION['status_code'] = "error";
        header('Location: forgetpw.php');
    }
}

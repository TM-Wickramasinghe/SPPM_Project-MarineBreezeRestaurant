<?php
include '../includes/security.php';

//add reservation 

if (isset($_POST['addbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['cNo'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $peoplecount = $_POST['NOP'];
    $message = $_POST['msg'];

    $query = "INSERT INTO reservation (rName, rEmail, rContactNumber, rDate, rTime, rNoOfPeople, rMessage) VALUES ('$name', '$email', '$contactNumber', '$date', '$time', '$peoplecount', '$message')";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Add Reservation Success!!!";
        $_SESSION['status_code'] = "success";
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Add Reservation Failed";
        $_SESSION['status_code'] = "error";
        header('Location: reservation.php');
    }
}

//add reservation1 

if (isset($_POST['addbtn1'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['cNo'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $peoplecount = $_POST['NOP'];
    $message = $_POST['msg'];

    $query = "INSERT INTO reservation (rName, rEmail, rContactNumber, rDate, rTime, rNoOfPeople, rMessage) VALUES ('$name', '$email', '$contactNumber', '$date', '$time', '$peoplecount', '$message')";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Add Reservation Success!!!";
        $_SESSION['status_code'] = "success";
        header('Location: reservation1.php');
    } else {
        $_SESSION['status'] = "Add Reservation Failed";
        $_SESSION['status_code'] = "error";
        header('Location: reservation1.php');
    }
}

//edit reservation
if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $date = $_POST['edit_date'];
    $time = $_POST['edit_time'];
    $peoplecount = $_POST['edit_NOP'];
    $message = $_POST['edit_msg'];

    $query = "UPDATE reservation SET rDate='$date', rTime='$time', rNoOfPeople='$peoplecount', rMessage='$message' WHERE rID='$id' ";

    $query_run = mysqli_query($connection, $query);

    if (!$query_run) {
        echo $connection->error;
        exit;
    } else {
        if ($query_run) {
            $_SESSION['status'] = "Your Data is Updated";
            $_SESSION['status_code'] = "success";
            header('Location: reservation.php');
        } else {
            $_SESSION['status'] = "Your Data is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: reservation.php');
        }
    }
}

//edit reservation1
if (isset($_POST['update_btn1'])) {
    $id = $_POST['edit_id'];
    $date = $_POST['edit_date'];
    $time = $_POST['edit_time'];
    $peoplecount = $_POST['edit_NOP'];
    $message = $_POST['edit_msg'];

    $query = "UPDATE reservation SET rDate='$date', rTime='$time', rNoOfPeople='$peoplecount', rMessage='$message' WHERE rID='$id' ";

    $query_run = mysqli_query($connection, $query);

    if (!$query_run) {
        echo $connection->error;
        exit;
    } else {
        if ($query_run) {
            $_SESSION['status'] = "Your Data is Updated";
            $_SESSION['status_code'] = "success";
            header('Location: reservation1.php');
        } else {
            $_SESSION['status'] = "Your Data is NOT Updated";
            $_SESSION['status_code'] = "error";
            header('Location: reservation1.php');
        }
    }
}


//delete reservation
if (isset($_POST['deletebtn'])) {
    $ID = $_POST['delete_id'];

    $query = "DELETE  FROM reservation WHERE  rID='$ID' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Reservation Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Reservation is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: reservation.php');
    }
}

//delete reservation1

if (isset($_POST['deletebtn1'])) {
    $ID = $_POST['delete_id1'];

    $query = "DELETE  FROM reservation WHERE  rID='$ID' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Reservation Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: reservation1.php');
    } else {
        $_SESSION['status'] = "Reservation is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: reservation1.php');
    }
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//cancel reservation
if (isset($_POST['cancelbtn'])) {
    $ID = $_POST['cancel_ID'];

    $query1 = "SELECT * FROM reservation WHERE  rID='$ID' ";
    $query_run1 = mysqli_query($connection, $query1);
    $user = mysqli_fetch_assoc($query_run1);
    $get_email = $user['rEmail'];

    if ($query_run1) {
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
        $mail->Subject = 'Reservation Cancellation';

        $email_template = "
            <h3>Dear Customer,</h3>
            <h4>Thank you for adding a reservation at our Marine Breeze Restaurant. Unfortunately, this email confirms that your reservation at Marine Breeze Restaurant has been cancelled. 
            Due to insufficient space.</h4>
            <h4>Thank you.</h4>
            <h4>Marine Breeze Restaurant,</h4>
            <h4>Kalutara.</h4>
            ";

        $mail->Body    = $email_template;
        $mail->send();

        $query = "DELETE  FROM reservation WHERE  rID='$ID' ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['status'] = "Reservation Cancellation Successfull";
            $_SESSION['status_code'] = "success";
            header('Location: reservation.php');
        } else {
            $_SESSION['status'] = "Reservation Cancellation Failed";
            $_SESSION['status_code'] = "error";
            header('Location: reservation.php');
        }
    } else {
        $_SESSION['status'] = "Something went wronged. #1";
        $_SESSION['status_code'] = "error";
        header('Location: reservation.php');
    }
}

//cancel reservation1
if (isset($_POST['cancelbtn1'])) {
    $ID = $_POST['cancel_ID1'];

    $query1 = "SELECT * FROM reservation WHERE  rID='$ID' ";
    $query_run1 = mysqli_query($connection, $query1);
    $user = mysqli_fetch_assoc($query_run1);
    $get_email = $user['rEmail'];

    if ($query_run1) {
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
        $mail->Subject = 'Reservation Cancellation';

        $email_template = "
            <h3>Dear Customer,</h3>
            <h4>Thank you for adding a reservation at our Marine Breeze Restaurant. Unfortunately, this email confirms that your reservation at Marine Breeze Restaurant has been cancelled. 
            Due to insufficient space.</h4>
            <h4>Thank you.</h4>
            <h4>Marine Breeze Restaurant,</h4>
            <h4>Kalutara.</h4>
            ";

        $mail->Body    = $email_template;
        $mail->send();

        $query = "DELETE  FROM reservation WHERE  rID='$ID' ";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['status'] = "Reservation Cancellation Successfull";
            $_SESSION['status_code'] = "success";
            header('Location: reservation1.php');
        } else {
            $_SESSION['status'] = "Reservation Cancellation Failed";
            $_SESSION['status_code'] = "error";
            header('Location: reservation1.php');
        }
    } else {
        $_SESSION['status'] = "Something went wronged. #1";
        $_SESSION['status_code'] = "error";
        header('Location: reservation1.php');
    }
}

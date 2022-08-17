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
        $_SESSION['status'] = "Registration Success!!!";
        $_SESSION['status_code'] = "success";
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Registration Failed";
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
        $_SESSION['status'] = "Registration Success!!!";
        $_SESSION['status_code'] = "success";
        header('Location: reservation1.php');
    } else {
        $_SESSION['status'] = "Registration Failed";
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
        $_SESSION['status'] = "Admin Profile Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: reservation.php');
    } else {
        $_SESSION['status'] = "Admin Profile is NOT DELETED";
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
        $_SESSION['status'] = "Admin Profile Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: reservation1.php');
    } else {
        $_SESSION['status'] = "Admin Profile is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: reservation1.php');
    }
}

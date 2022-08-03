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

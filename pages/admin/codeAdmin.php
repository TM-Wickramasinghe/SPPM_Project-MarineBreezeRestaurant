<?php
include '../includes/security.php';

//register ADMIN

if (isset($_POST['addbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwdconf = $_POST['repwd'];
    $designation = $_POST['desig'];

    //name validate

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $_SESSION['status'] = "Only alphabets and white space are allowed in name!";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    } else {

        //validate email

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = "Invalid format and please re-enter valid email!";
            $_SESSION['status_code'] = "error";
            header('Location: admin.php');
        } else {
            //email already taken or not
            $email_query = "SELECT * FROM admin WHERE 'aEmail'=$email";
            $email_query_run = mysqli_query($connection, $email_query);
            if (mysqli_num_rows($email_query_run) > 0) {
                $_SESSION['status'] = "Email Already Taken!";
                $_SESSION['status_code'] = "error";
                header('Location: admin.php');
            } else {

                // Validate password strength

                $uppercase = preg_match('@[A-Z]@', $pwd);
                $lowercase = preg_match('@[a-z]@', $pwd);
                $number = preg_match('@[0-9]@', $pwd);
                $specialChars = preg_match('@[^\w]@', $pwd);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
                    $_SESSION['status'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character!";
                    $_SESSION['status_code'] = "error";
                    header('Location: admin.php');
                } else {

                    //password equality validate

                    if ($pwd === $pwdconf) {
                        $query = "INSERT INTO admin(aID,aName,aEmail,aPwd,Designation) VALUES (NULL, '$name', '$email', '$pwd','$designation')";

                        $query_run = mysqli_query($connection, $query);

                        if ($query_run) {
                            $_SESSION['status'] = "Registration Success!!!";
                            $_SESSION['status_code'] = "success";
                            header('Location: admin.php');
                        } else {
                            $_SESSION['status'] = "Registration Failed";
                            $_SESSION['status_code'] = "error";
                            header('Location: admin.php');
                        }
                    } else {

                        $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                        $_SESSION['status_code'] = "warning";
                        header('Location: admin.php');
                    }
                }
            }
        }
    }
}

//edit admin details
if (isset($_POST['edit_'])) {
    $id = $_POST['edit_aid'];
    $email = $_POST['edit_email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Invalid format and please re-enter valid email!";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    } else {
        //email already taken or not
        $email_query = "SELECT * FROM admin WHERE 'aEmail'=$email";
        $email_query_run = mysqli_query($connection, $email_query);
        if (mysqli_num_rows($email_query_run) > 0) {
            $_SESSION['status'] = "Email Already Taken!";
            $_SESSION['status_code'] = "error";
            header('Location: admin.php');
        } else {

            $query = "UPDATE admin SET  aEmail='$email' WHERE aID='$id' ";
            $query_run = mysqli_query($connection, $query);

            if (!$query_run) {
                echo $connection->error;
                exit;
            } else {
                if ($query_run) {
                    $_SESSION['status'] = "Your Data is Updated";
                    $_SESSION['status_code'] = "success";
                    header('Location: admin.php');
                } else {
                    $_SESSION['status'] = "Your Data is NOT Updated";
                    $_SESSION['status_code'] = "error";
                    header('Location: admin.php');
                }
            }
        }
    }
}

//delete admin profiles

if (isset($_POST['deletebtn'])) {
    $aID = $_POST['delete_aID'];

    $query = "DELETE  FROM admin WHERE  aID='$aID' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Admin Profile Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: admin.php');
    } else {
        $_SESSION['status'] = "Admin Profile is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: admin.php');
    }
}

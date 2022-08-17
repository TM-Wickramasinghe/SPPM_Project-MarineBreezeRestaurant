<?php
include '../includes/security.php';
?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php

//delete feedback

if (isset($_POST['deletebtn'])) {
    $fID = $_POST['delete_fID'];

    $query = "DELETE  FROM feedback WHERE  fID='$fID' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Feedback Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: feedback.php');
    } else {
        $_SESSION['status'] = "Feedback is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: feedback.php');
    }
}

//delete feedback1

if (isset($_POST['deletebtn1'])) {
    $fID = $_POST['delete_fID1'];

    $query = "DELETE  FROM feedback WHERE  fID='$fID' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Feedback Successfully DELETED";
        $_SESSION['status_code'] = "success";
        header('Location: feedback1.php');
    } else {
        $_SESSION['status'] = "Feedback is NOT DELETED";
        $_SESSION['status_code'] = "error";
        header('Location: feedback1.php');
    }
}

//print report - not used

if (isset($_POST['printbtn'])) {
    $id = $_POST['fID'];
    $name = $_POST['fName'];
    $email = $_POST['fEmail'];
    $msg = $_POST['fMsg'];

    $body = '<h1>EMPLOYEE DETAILS</h1>'
        . '<h4>Customer ID :    ' . $id . '</h4>'
        . '<h4>Full Name :    ' . $name . '</h4>'
        . '<h4>Email :         ' . $email . '</h4>'
        . '<h4>Comment :    ' . $msg . '</h4>';

    require_once __DIR__ . '/vendor/autoload.php';
    //$mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($body);

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;

    //call watermark content and image
    $mpdf->SetWatermarkText('Marine Breeze');
    $mpdf->showWatermarkText = true;
    $mpdf->watermarkTextAlpha = 0.1;

    //output in browser
    $mpdf->Output();
}

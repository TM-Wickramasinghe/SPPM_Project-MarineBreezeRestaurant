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
if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "DELETE  FROM feedback WHERE  fID='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo "Feedback deleted successfully";
        $_SESSION['status'] = "Feedback Successfully DELETED";
        $_SESSION['status_code'] = "success";
    } else {
        echo "Error deleting Feedback";
        $_SESSION['status'] = "Feedback is NOT DELETED";
        $_SESSION['status_code'] = "error";
    }
}

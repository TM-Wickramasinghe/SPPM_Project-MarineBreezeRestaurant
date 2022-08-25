<?php
include '../includes/security.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(".delbutton").click(function() {
            //Save the link in a variable called element
            var element = $(this);
            //Find the id of the link that was clicked
            var del_id = element.attr("id");
            //Built a url to send
            var info = 'id=' + del_id;
            if (confirm("Sure you want to delete this reservation? There is NO undo!")) {
                $.ajax({
                    type: "GET",
                    url: "codefeedback.php",
                    data: info,
                    success: function(data) {
                        alert(data);
                    }
                }).then((Confirmed) => {
                    window.location.reload();
                });
            }
            return false;
        });
    });
</script>

<?php
include '../includes/header.php';
include '../includes/nav.php';

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Customer FeedBack </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php
                    $desig = $_SESSION['desig'];
                    ?>
                    <li class="breadcrumb-item"><a href="#"><?php echo $desig ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">FeedBacks</h4>

                        <div class="template-demo">
                            <button type="submit" class="btn btn-dark" name="printbtn1" onclick="window.print();">PRINT</button>
                        </div>

                        <?php

                        $query = "SELECT * FROM feedback order by fID";
                        $query_run = mysqli_query($connection, $query);

                        if (!$query_run) {
                            echo $connection->error;
                            exit;
                        } else {
                        ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr align="center">
                                        <br>
                                        <th>NAME</th>
                                        <th>FEEDBACK</th>
                                        <th>DELETE</th></br>
                                    </tr>
                                </thead>
                                <?php

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>
                                        <tbody>
                                            <tr align="center">
                                                <td><?php echo $row['fName']; ?></td>
                                                <td><?php echo $row['fComment']; ?></td>

                                                <td align="center">
                                                    <button type="button" class='delbutton btn btn-danger' id='<?php echo $row['fID']; ?>'>
                                                        <i class="icon-trash"></i></button>
                                                </td>

                                            </tr>
                                        </tbody>
                            <?php

                                    }
                                } else {
                                    $_SESSION['status'] = "No Records Founded";
                                    $_SESSION['status_code'] = "error";
                                }
                            }
                            ?>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</div>

<?php
include '../includes/script.php';
?>

<?php
include '../includes/security.php';
include '../includes/header.php';
include '../includes/nav.php';

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Admin Management </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Panel</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Management Panel</h4>
                        <div class="template-demo">
                            <button type="button" class="btn btn-dark" name="addbtn1"><a href="#add1">Add</a></button>
                        </div>
                        <?php

                        $query = "SELECT * FROM admin order by aID";
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
                                        <th>ADMIN ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>DESIGNATION</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th></br>
                                    </tr>
                                </thead>
                                <?php

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                                ?>
                                        <tbody>
                                            <tr align="center">
                                                <td><?php echo $row['aID']; ?></td>
                                                <td><?php echo $row['aName']; ?></td>
                                                <td><?php echo $row['aEmail']; ?></td>
                                                <td><?php echo $row['Designation']; ?></td>

                                                <td align="center">
                                                    <form action="admin.php" method="post">
                                                        <div class="template-demo">
                                                            <input type="hidden" name="edit_ID" value="<?php echo $row['aID']; ?>">
                                                            <button type="submit" class="btn btn-warning " name="edittbtn"><i class="icon-pencil"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>

                                                <td align="center">
                                                    <form action="codeAdmin.php" method="post">
                                                        <div class="template-demo">
                                                            <input type="hidden" name="delete_aID" value="<?php echo $row['aID']; ?>">
                                                            <button type="submit" class="btn btn-danger " name="deletebtn"><i class="icon-trash"></i></button>
                                                        </div>
                                                    </form>
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

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card" align="center">
                <div class="card" align="center">
                    <div class="card-body">
                        <h4 class="card-title"><a id="add1">Adding a New Employer</a></h4>
                        <form action="codeAdmin.php" method="POST" class="forms-sample">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pwd" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="pwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="repwd" class="col-sm-3 col-form-label">Re Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="repwd" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="desig" class="col-sm-3 col-form-label">Designation</label>
                                <div class="col-sm-9">

                                    <select class="form-control" name="desig" placeholder="Designation">
                                        <option>Designation</option>
                                        <option>Admin</option>
                                        <option>Manager</option>
                                    </select>
                                </div>
                            </div>


                            <button type="submit" name="addbtn" class="btn btn-primary mr-2">Add</button>
                            <button type="reset" name="resetbtn" class="btn btn-secondary mr-2">Reset</button>
                            <button class="btn btn-light"><a href="admin.php">Cancel</a></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- edit details -->


            <div class="col-md-6 grid-margin stretch-card" align="center">
                <?php

                if (isset($_POST['edittbtn'])) {
                    $aid = $_POST['edit_ID'];

                    $query = "SELECT * FROM admin WHERE aID='$aid' ";
                    $query_run = mysqli_query($connection, $query);

                    if (!$query_run) {
                        echo $connection->error;
                        exit;
                    } else {

                        //display entered data

                        foreach ($query_run as $row) {
                ?>
                            <div class="card" align="center">
                                <div class="card-body">
                                    <h4 class="card-title">Update Details</h4>
                                    <form action="codeAdmin.php" method="POST" class="forms-sample">
                                        <div class="mt-10" align="center">
                                            <div class="form-group row">
                                                <label for="id" class="col-sm-3 col-form-label">Admin ID</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="edit_aid" placeholder="ID" readonly value="<?php echo $row['aID'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="edit_name" placeholder="Name" readonly value="<?php echo $row['aName'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="email" class="form-control" name="edit_email" placeholder="Email" value="<?php echo $row['aEmail'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="pwd" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" name="edit_pwd" placeholder="Password" value="<?php echo $row['aPwd'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="desig" class="col-sm-3 col-form-label">Designation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="edit_desig" placeholder="Designation" readonly value="<?php echo $row['Designation'] ?>">
                                                </div>
                                            </div align="center">
                                            <button type="submit" name="edit_" class="btn btn-primary mr-2" align="center">Update</button>
                                            <button type="reset" name="resetbtn" class="btn btn-secondary mr-2">Reset</button>
                                            <button class="btn btn-light"> <a href="admin.php" align="center">Cancel</a></button>
                                    </form>
                        <?php
                        }
                    }
                }
                        ?>
                                </div>
                            </div>
            </div>
            <?php
            include '../includes/footer.php';
            ?>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
</div>

<?php
include '../includes/script.php';
?>

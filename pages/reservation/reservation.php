<?php
include '../includes/security.php';
include '../includes/header.php';
include '../includes/nav1.php';
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Reservation Management </h3>
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

            <h4 class="card-title">RESERVATIONS</h4>
            <div class="template-demo">
              <button type="button" class="btn btn-dark" name="addbtn1">Book</button>
            </div>

            <?php

            $query = "SELECT * FROM reservation";
            $query_run = mysqli_query($connection, $query);


            if (mysqli_num_rows($query_run) > 0) {
            ?>

              <table class="table table-hover">
                <thead>
                  <tr align="center">
                    <br>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CO. #</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>N.O.P</th>
                    <th>MESSAGE</th>
                    <th>EDIT</th>
                    <th>DELETE</th></br>
                  </tr>
                </thead>

                <?php


                while ($row = mysqli_fetch_assoc($query_run)) {

                ?>

                  <tbody>
                    <tr align="center">
                      <td><?php echo $row['rName'] ?></td>
                      <td><?php echo $row['rEmail'] ?></td>
                      <td><?php echo $row['rContactNumber'] ?></td>
                      <td><?php echo $row['rDate'] ?></td>
                      <td><?php echo $row['rTime'] ?></td>
                      <td><?php echo $row['rNoOfPeople'] ?></td>
                      <td><?php echo $row['rMessage'] ?></td>
                      <td align="center">
                        <form action="reservation.php" method="post">
                          <div class="template-demo">
                            <input type="hidden" name="edit_ID" value="<?php echo $row['rID']; ?>">
                            <button type="submit" class="btn btn-warning " name="editbtn"><i class="icon-pencil"></i></button>
                          </div>
                        </form>
                      </td>

                      <td align="center">
                        <form action="code.php" method="post">
                          <div class="template-demo">
                            <input type="hidden" name="delete_id" value="<?php echo $row['rID']; ?>">
                            <button type="submit" class="btn btn-danger " name="deletebtn"><i class="icon-trash"></i></button>
                          </div>
                        </form>
                      </td>
                    </tr>
                  <?php
                }
                  ?>
                  </tbody>
              </table>
            <?php
            } else {
              echo "No Record Found";
            }

            ?>
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
            <form action="code.php" method="POST" class="forms-sample">
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
                <label for="cNo" class="col-sm-3 col-form-label">Contact Number</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="cNo" placeholder="Contact Number">
                </div>
              </div>
              <div class="form-group row">
                <label for="date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="date" placeholder="Date">
                </div>
              </div>
              <div class="form-group row">
                <label for="time" class="col-sm-3 col-form-label">Time</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" name="time" placeholder="Time">
                </div>
              </div>
              <div class="form-group row">
                <label for="NOP" class="col-sm-3 col-form-label">No. of People</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name="NOP" placeholder="No. of People">
                </div>
              </div>
              <div class="form-group row">
                <label for="msg" class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="msg" placeholder="Message">
                </div>
              </div>



              <button type="submit" name="addbtn" class="btn btn-primary mr-2">Submit</button>
              <button type="reset" name="resetbtn" class="btn btn-secondary mr-2">Reset</button>
              <button class="btn btn-light"><a href="reservation.php">Cancel</a></button>
            </form>
          </div>
        </div>
      </div>
      <!-- edit details -->


      <div class="col-md-6 grid-margin stretch-card" align="center">
        <?php

        if (isset($_POST['editbtn'])) {
          $id = $_POST['edit_ID'];

          $query = "SELECT * FROM reservation WHERE rID='$id' ";
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
                  <form action="code.php" method="POST" class="forms-sample">
                    <input type="hidden" name="edit_ItemNo" value="<?php echo $row['rID'] ?>">
                    <div class="mt-10" align="left">
                      <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" name="edit_id" placeholder="ID" readonly value="<?php echo $row['rID'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="edit_name" placeholder="Name" readonly value="<?php echo $row['rName'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="edit_email" placeholder="Email" readonly value="<?php echo $row['rEmail'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="cNo" class="col-sm-3 col-form-label">Contact Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="edit_cNo" placeholder="Contact Number" readonly value="<?php echo $row['rContactNumber'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                        <div class="col-sm-9">
                          <input type="date" class="form-control" name="edit_date" placeholder="Date" value="<?php echo $row['rDate'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="time" class="col-sm-3 col-form-label">Time</label>
                        <div class="col-sm-9">
                          <input type="time" class="form-control" name="edit_time" placeholder="Time" value="<?php echo $row['rTime'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="NOP" class="col-sm-3 col-form-label">No. of People</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" name="edit_NOP" placeholder="No. of People" value="<?php echo $row['rNoOfPeople'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="msg" class="col-sm-3 col-form-label">Message</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="edit_msg" placeholder="Message" value="<?php echo $row['rMessage'] ?>">
                        </div>
                      </div>

                      <button type="submit" name="update_btn" class="btn btn-primary mr-2">Update</button>
                      <button class="btn btn-light"> <a href="admin.php">Cancel</a></button>
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

</div>

<?php
include '../includes/script.php';
?>
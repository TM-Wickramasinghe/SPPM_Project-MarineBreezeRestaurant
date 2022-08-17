<?php
include '../includes/security.php';
include '../includes/header.php';
include '../includes/nav.php';
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> Product Management </h3>
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
      <div class="col-lg-24 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Products</h4>
            <div class="template-demo">
              <button type="button" class="btn btn-dark" name="addbtn"><a href="#add1">Add</a></button>
            </div>
            <?php

            $query = "SELECT * FROM menu";
            $query_run = mysqli_query($connection, $query);


            if (mysqli_num_rows($query_run) > 0) {

            ?>
              <table class="table table-hover">
                <thead>
                  <tr align="center">
                    <br>

                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>PICTURE</th>
                    <th>DESCRIPTION</th>
                    <th>SMALL</th>
                    <th>MEDIUM</th>
                    <th> LARGE</th>
                    <th>AVAILABILITY</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_assoc($query_run)) {
                  ?>
                    <tr align="center">

                      <td><?php echo $row['Name'] ?></td>
                      <td><?php echo $row['Category'] ?></td>
                      <td><?php echo '<img src="upload/' . $row['Picture'] . '" width="200px;" height="200px;" alt="Image">' ?></td>
                      <td><?php echo $row['Description'] ?></td>
                      <td><?php echo $row['PriceSmall'] ?></td>
                      <td><?php echo $row['PriceMedium'] ?></td>
                      <td><?php echo $row['PriceLarge'] ?></td>
                      <td><?php echo $row['Availability'] ?></td>
                      <td align="center">
                        <form action="items1.php" method="post">
                          <div class="template-demo">
                            <input type="hidden" name="edit_ID1" value="<?php echo $row['ItemNo']; ?>">
                            <button type="submit" class="btn btn-warning " name="edittbtn1"><i class="icon-pencil"></i></button>
                          </div>
                        </form>
                      </td>
                      <td align="center">
                        <form action="code.php" method="post">
                          <div class="template-demo">
                            <input type="hidden" name="delete_id1" value="<?php echo $row['ItemNo']; ?>">
                            <button type="submit" class="btn btn-danger " name="delete_btn1"><i class="icon-trash"></i></button>
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
    <br><br>

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card" align="center">
        <div class="card" align="center">
          <div class="card-body">
            <h4 class="card-title"><a id="add1">Adding a New Product</a></h4>
            <form action="code.php" method="POST" enctype="multipart/form-data" class="forms-sample">
              <div class="form-group row">
                <label for="category" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                  <input type="text" name="product_category" class="form-control" id="category" placeholder="Category">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" name="product_name" class="form-control" id="name" placeholder="Name">
                </div>
              </div>
              <div class="form-group row">
                <label for="picture" class="col-sm-3 col-form-label">Picture</label>
                <div class="col-sm-9">
                  <input type="file" name="product_image" class="form-control" id="picture" placeholder="Product image">
                </div>
              </div>
              <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <input type="text" name="product_description" class="form-control" id="desc" placeholder="Description">
                </div>
              </div>
              <div class="form-group row">
                <label for="pricesmall" class="col-sm-3 col-form-label">Portion small price</label>
                <div class="col-sm-9">
                  <input type="text" name="product_smallprice" class="form-control" id="smallprice" placeholder="smallprice">
                </div>
              </div>
              <div class="form-group row">
                <label for="pricemedium" class="col-sm-3 col-form-label">Portion medium price</label>
                <div class="col-sm-9">
                  <input type="text" name="product_mediumprice" class="form-control" id="mediumprice" placeholder="mediumprice">
                </div>
              </div>
              <div class="form-group row">
                <label for="pricelarge" class="col-sm-3 col-form-label">portion large price</label>
                <div class="col-sm-9">
                  <input type="text" name="product_largeprice" class="form-control" id="largeprice" placeholder="largeprice">
                </div>
              </div>
              <div class="form-group row">
                <label for="availability" class="col-sm-3 col-form-label">Availability</label>
                <div class="col-sm-9">
                  <select class="form-control" name="product_availability" id="availability" placeholder="Availability">
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                </div>
              </div>


              <button type="submit" name="save_product" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light"><a href="items1.php">Cancel</a></button>
            </form>

          </div>
        </div>
      </div>

      <!---edit details--->



      <div class="col-md-6 grid-margin stretch-card" align="center">
        <?php

        if (isset($_POST['edittbtn1'])) {
          $id = $_POST['edit_ID1'];

          $query = "SELECT * FROM menu WHERE ItemNo='$id' ";
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
                  <h4 class="card-title"><a id="edit1">Update Product Details</a></h4>



                  <form action="code.php" method="POST" enctype="multipart/form-data" class="forms-sample">


                    <input type="hidden" name="edit_ItemNo" value="<?php echo $row['ItemNo'] ?>">

                    <div class="form-group row">
                      <label for="category" class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_category" value="<?php echo $row['Category'] ?>" class="form-control" id="edit_category" placeholder="Category">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_name" class="form-control" value="<?php echo $row['Name'] ?>" id="edit_name" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="picture" class="col-sm-3 col-form-label">Picture</label>
                      <div class="col-sm-9">
                        <input type="file" name="product_image" class="form-control" value="<?php echo $row['Picture'] ?>" id="edit_picture" placeholder="Picture">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_description" class="form-control" value="<?php echo $row['Description'] ?>" id="edit_description" placeholder="Description">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pricesmall" class="col-sm-3 col-form-label">Portion small price</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_smallprice" class="form-control" value="<?php echo $row['PriceSmall'] ?>" id="edit_smallprice" placeholder="smallprice">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pricemedium" class="col-sm-3 col-form-label">Portion medium price</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_mediumprice" class="form-control" value="<?php echo $row['PriceMedium'] ?>" id="edit_mediumprice" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pricelarge" class="col-sm-3 col-form-label">portion large price</label>
                      <div class="col-sm-9">
                        <input type="text" name="edit_largeprice" class="form-control" value="<?php echo $row['PriceLarge'] ?>" id="edit_largeprice" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="availability" class="col-sm-3 col-form-label">Availability</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="edit_availability" value="<?php echo $row['Availability'] ?>" id="edit_availability" placeholder="Availability">
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>
                    </div>

                    <button type="submit" name="update_btn1" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light"> <a href="items1.php">Cancel</a></button>
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

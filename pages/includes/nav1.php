<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                    <?php
                    $name = $_SESSION['name'];
                    $desig = $_SESSION['desig'];
                    ?>
                    <div class="text-wrapper">
                        <p class="profile-name"><?php echo $name ?></p>
                        <p class="designation"><?php echo $desig ?></p>
                    </div>

                </a>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../product/items.php">
                    <span class="menu-title">Product Management</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../reservation/reservation.php">
                    <span class="menu-title">Reservation Management</span>
                    <i class="icon-layers menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../feedback/feedback.php">
                <span class="menu-title">FeedBack</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            </li>
        </ul>
    </nav>
    <!-- partial -->

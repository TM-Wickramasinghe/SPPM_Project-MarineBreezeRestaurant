
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
</body>

</html>
<!-- sweetalert messages -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?> ",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK Done!",
        });
    </script>
<?php
    unset($_SESSION['status']);
}

?>
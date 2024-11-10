<?php require_once('../config/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register </title>
    <link rel="stylesheet" href="../public/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../public/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../public/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../public/assets/css/select.dataTables.min.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/assets/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="shortcut icon" href="../public/assets/images/isatlogo.png" />
</head>

<body>
    <div class="row mx-auto">
        <form method="post" enctype="multipart/form-data"action="../actions/register.php">
        <div class="col-md-5 shadow border mx-auto mt-5 py-5 rounded">
            <div class="row mx-auto">
                <div class="col-md-6 mx-auto p-0 mt-3">
                    <h4 class="text-center">Upload Valid ID</h4>
                </div>
            </div>
            <div id="previewImage" class="col-md-6 mx-auto border shadow mt-2 img-preview"></div>
            <div class="row mx-auto">
                <div class="col-md-6 mx-auto p-0 mt-3">
                    <div class="form-group">
                        <input type="file" class="form-control" accept=".jpg, .jpeg, .png, .gif" name="IDPicture"id="imageInput" placeholder="Upload ID">
                        <input type="hidden" name="patient_ID" value="<?php echo $_GET['patient_ID']?>">
                    </div>
                    <div class="form-group">
                        <div class="row mx-auto">
                            <button class="btn btn-primary"name="uploadID">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
    </div>
    <script src="../public/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../public/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../public/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../public/assets/js/off-canvas.js"></script>
    <script src="../public/assets/js/hoverable-collapse.js"></script>
    <script src="../public/assets/js/template.js"></script>
    <script src="../public/assets/js/settings.js"></script>
    <script src="../public/assets/js/todolist.js"></script>
    <script src="../public/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../public/assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../public/assets/js/sweetalert2.min.js"></script>
    <script src="../public/assets/js/Chart.roundedBarCharts.js"></script>
    <script src="../public/assets/js/main.js"></script>

    <?php if ($flash = getFlash('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: "<?php echo $flash; ?>",
                showConfirmButton: true,
            });
        </script>
    <?php endif; ?>

    <?php if ($flash = getFlash('failed')) : ?>
        <script>
            Swal.fire({
                icon: 'warning',
                title: "<?php echo $flash; ?>",
                showConfirmButton: true,
            });
        </script>
    <?php endif; ?>
</body>

</html>
<?php require_once('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ISAT U Dental Clinic </title>
    <link rel="stylesheet" href="../public/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../public/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../public/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../public/assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="../public/assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../public/assets/images/isatlogo.png" />
</head>

<body>
    <div class="row mx-auto">
        <div class="col-md-9 mx-auto mt-5 shadow border rounded g-0" style="height:600px; overflow-y:hidden">
            <div class="row mx-auto g-0 rounded">
                <div class="col-md-6">
                    <img class="img-fluid rounded-start" style="object-fit: cover; height:600px; width:100%" src="../public/assets/images/home-bg-3.jpg">
                </div>
                <div class="col-md-6 p-5">
                    <form method="post" action="../actions/login.php">
                        <div class="form-group mt-5">
                            <label>Email</label>
                            <input class="form-control" value="<?php echo getValue('email'); ?>" name="email" placeholder="Please enter your email">
                            <?php if (showError('email')) :
                                echo showError('email');
                            endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="d-flex position-relative align-items-center">
                                <input class="form-control" type="password" id="password" name="password" placeholder="Please enter your password">
                                <i class="fa fa-eye" onclick="password('password');" style="position:absolute; right:12px; cursor:pointer"></i>
                            </div>
                            <?php if (showError('password')) :
                                echo showError('password');
                            endif; ?>
                            <a href="forgotpassword.php" class="m-0 float-end" style="font-size: 12px;">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <button class="btn btn-primary" name="login">Login</button>
                                <p class="m-0 text-center mt-2">No account? <a href="register.php" style="cursor:pointer">Register Here</a></p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
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
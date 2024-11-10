<?php require_once('../config/config.php');
if (isset($_GET['user']) || isset($_GET['id'])) {
    if ($_GET['user'] == 'patient') {
        $user = first('patient', ['Patient_ID' => $_GET['id']]);
    } else if ($_GET['user'] == 'assistant') {
        $user = first('assistant', ['Assistant_ID' => $_GET['id']]);
    } else {
        redirect('index');
    }
}
?>
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
        <div class="col-md-5 shadow border mt-5 mx-auto p-5 rounded">
            <div class="col-md-4 mx-auto">
                <img class="img-fluid" src="https://media.istockphoto.com/id/1306827906/vector/man-forgot-the-password-concept-of-forgotten-password-key-account-access-blocked-access.jpg?s=612x612&w=0&k=20&c=67nYr3ztbOn5uO6-mWBNCSw9mcHD9Z5M-QER-azGQ5w=">
            </div>
            <div class="form-group">
                <h3><strong>Is this you? <?php echo $_GET['user'] == 'patient' ? $user['patientFname'] . ' ' . $user['patientLname'] : ($_GET['user'] == 'assistant' ? $user['assistantFname'] . ' ' . $user['assistantLname'] : "") ?></strong></h3>
                <h5>We`ve sent message to your phone number</h5>
                <h5><?php echo $_GET['user'] == 'patient' ? $user['patientContact'] : ($_GET['user'] == 'assistant' ? '+63' . $user['assistantContact'] : "") ?></h5>
            </div>
            <form method="post" action="../actions/forgotpassword.php">
                <div class="form-group mb-1">
                    <input type="hidden" name="code" value="<?php echo base64_decode($_GET['supmen']) ?>">
                    <input type="hidden" name="user" value="<?php echo $_GET['user'] ?>">
                    <input type="hidden" name="id" value="<?php echo $_GET['user'] == 'patient' ? $user['Patient_ID'] : ($_GET['user'] == 'assistant' ? $user['Assistant_ID'] : '') ?>">
                    <label>Verification Code</label>
                    <input class="form-control" name="verify_code" placeholder="Verification Code" required>
                    <?php if (showError('verify_code')) :
                        echo showError('verify_code');
                    endif; ?>
                </div>
                <div class="form-group">
                    <div class="row mx-auto">
                        <button class="btn btn-primary mt-1" name="verify">Verify</button>
                        <div class="text-center mt-2">
                            <a href="forgotpassword.php" class="m-0">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
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
    <script src="../public/assets/js/sweetalert2.min.js"></script>
    <script src="../public/assets/js/Chart.roundedBarCharts.js"></script>
    <script src="../public/assets/js/main.js"></script>
</body>

</html>
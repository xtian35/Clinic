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
    <link rel="stylesheet" href="../public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../public/assets/css/select.dataTables.min.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/assets/css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="../public/assets/images/isatlogo.png" />
</head>

<body>
    <div class="row mx-auto">
        <div class="col-md-9 mx-auto my-5 shadow border rounded g-0" style="height:700px; overflow-y:hidden" id="registerform">
            <div class="row mx-auto g-0 rounded">
                <div class="col-md-6">
                    <img class="img-fluid rounded-start" style="object-fit: cover; height:700px; width:100%" src="../public/assets/images/home-bg-3.jpg" id="pic">
                </div>
                <div class="col-md-6 p-5">
                    <form method="post" action="../actions/register.php">
                        <div class="row mx-auto mb-2">
                            <h3 class="m-0 mb-3">Register your Account</h3>
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>Firstname</label>
                                    <input class="form-control" name="fname" value="<?php echo getValue('fname'); ?>" placeholder="Firstname">
                                    <?php if (showError('firstname')) :
                                        echo showError('firstname');
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input class="form-control" name="lname" value="<?php echo getValue('lname'); ?>" placeholder="Lastname">
                                    <?php if (showError('lastname')) :
                                        echo showError('lastname');
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto mb-2">
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>Contact</label>
                                    <div class="d-flex align-items-center position-relative">
                                        <p class="position-absolute m-0 ms-1 pe-1 border-end">+63</p>
                                        <input class="form-control" style="text-indent: 14px;" name="contact" maxlenght="10" value="<?php echo getValue('contact'); ?>" placeholder="9354758387">
                                    </div>
                                    <?php if (showError('contact')) :
                                        echo showError('contact');
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" value="<?php echo getValue('address'); ?>" placeholder="Address">
                                    <?php if (showError('address')) :
                                        echo showError('address');
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto mb-2">
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="<?php echo getValue('email'); ?>" placeholder="Email">
                                    <?php if (showError('email')) :
                                        echo showError('email');
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>Role</label>
                                    <select class="form-select form-select-sm" name="role" id="role">
                                        <option value="outsider">Outsider</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none;" id="courseform">
                            <div class="row mx-auto mb-2">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label>College</label>
                                        <select class="form-select form-select-sm" name="college" id="college">
                                            <?php $college = findAll('college');
                                            foreach ($college as $row) :
                                            ?>
                                                <option value="<?= $row['CollegeID'] ?>"><?= $row['CollegeName'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label>Course</label>
                                        <select class="form-select form-select-sm" name="course" id="course">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mx-auto mb-2">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label>Year</label>
                                        <select class="form-select form-select-sm" name="year">
                                            <option value="1">1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                            <option value="5">5th Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label>Section</label>
                                        <select class="form-select form-select-sm" name="section">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto mb-2">
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>BIrthday</label>
                                    <input class="form-control" name="birth" value="<?php echo getValue('birth'); ?>" type="date">
                                    <?php if (showError('birth')) :
                                        echo showError('birth');
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-auto mb-2">
                            <div class="col-6">
                                <div class="form-group ">
                                    <label>Password</label>
                                    <input class="form-control" name="password" value="<?php echo getValue('password'); ?>" placeholder="Password">
                                    <?php if (showError('password')) :
                                        echo showError('password');
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" name="confirmpassword" value="<?php echo getValue('confirmpassword'); ?>" placeholder="Re-enter Password">
                                    <?php if (showError('confirmpassword')) :
                                        echo showError('confirmpassword');
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row mx-auto">
                                <button class="btn btn-primary" type="submit" name="register">Register</button>
                                <p class="m-0 text-center mt-2">Have account? <a href="index.php" style="cursor:pointer">Login Here</a></p>
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
    <script src="../public/assets/js/ajax.js"></script>

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
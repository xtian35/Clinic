<?php require_once('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ISAT U Dental Clinic</title>
    <link rel="stylesheet" href="../public/assets/vendors/feather/feather.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../public/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../public/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../public/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../public/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../public/assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="../public/assets/css/datatable.css">
    <link rel="stylesheet" href="../public/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/assets/css/aos.css">
    <link rel="stylesheet" href="../public/assets/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../public/assets/fullcalendar/fullcalendar.min.css" />
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link rel="shortcut icon" href="../public/assets/images/isatlogo.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="../public/assets/images/isatlogo.png" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="../public/assets/images/isatlogo.png" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="<?php if (isset($_SESSION['assistantProfilepicture'])) {
                                                                        echo $_SESSION['assistantProfilepicture'];
                                                                    } else {
                                                                        echo '../public/assets/images/file-icons/default_profile.png';
                                                                    } ?>" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="col-md-3 rounded-circle" src="<?php if (isset($_SESSION['assistantProfilepicture'])) {
                                                                                echo $_SESSION['assistantProfilepicture'];
                                                                            } else {
                                                                                echo '../public/assets/images/file-icons/default_profile.png';
                                                                            } ?>" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $_SESSION['assistantFname'] ?></p>
                                <p class="fw-light text-muted mb-0"><?php echo $_SESSION['assistantEmail'] ?></p>
                            </div>
                            <a href="../views/assistantUpdateprofile.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile </span></a>
                            <a href="../actions/logout.php" class="dropdown-item logout"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="container-fluid page-body-wrapper">
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="assistantDashboard.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assistantDoctors.php">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Doctor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Services.php">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Colleges.php">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Courses</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">User</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basics" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-account-circle-outline"></i>
                            <span class="menu-title">View User</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basics">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="manageAssistant.php">Assistant</a></li>
                                <li class="nav-item"> <a class="nav-link" href="ManagePatient.php">Patient</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Appointments</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-account-circle-outline mx-auto"></i>
                            <span class="menu-title">Appointments</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="assistantAppointmentDate.php?from=<?php echo date('Y-m-d'); ?>&to=<?php echo date('Y-m-d', strtotime('+7 days')); ?>">Appointments</a></li>
                                <li class="nav-item"> <a class="nav-link" href="assistantWalkin.php">Walk-In</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item nav-category">Others</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Records</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="doctorSchedule.php">Doctor Schedule</a></li>
                                <li class="nav-item"><a class="nav-link" href="assistantHistoryUsers.php">Patient History</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
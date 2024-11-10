<?php require_once "../config/config.php";

//localhost/Clinic Capstone/seeder/adminUser.php?run=go

if (isset($_GET['run']) == "go") :
    $admin = [
        "AdminFname"   => "Mark",
        "AdminLname"   => "Zuckerberg",
        "Password"   => password_hash("Admin", PASSWORD_DEFAULT),
        "Email"   => "admin@gmail.com"
    ];
    save("admin", $admin);
endif;

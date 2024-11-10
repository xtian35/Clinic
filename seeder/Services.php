<?php require_once "../config/config.php";

//localhost/Clinic Capstone/seeder/Services.php?run=go
if (isset($_GET['run']) && $_GET['run'] == "go") {
    $services = [
        [
            "Services_ID"   => "1",
            "Services_name"   => "Issuance of Dental Certificates",
        ],
        [
            "Services_ID"   => "2",
            "Services_name"   => "Tooth Extraction",
        ],
        [
            "Services_ID"   => "3",
            "Services_name"   => "Dental Fillings",
        ],
        [
            "Services_ID"   => "4",
            "Services_name"   => "Oral Examination",
        ],
        [
            "Services_ID"   => "5",
            "Services_name"   => "Oral Prophylexis",
        ],
        [
            "Services_ID"   => "6",
            "Services_name"   => "Prescription",
        ],
    ];

    foreach ($services as $service) {
        save("services", $service);
    }

    echo "Services have been added to the database.";
}

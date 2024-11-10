<?php
require_once('../config/config.php');
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $data = [
        'Assistant_ID' => $_SESSION['Assistant_ID'],
        'Doctor_schedule_avail' => $date,
        'Doctor_schedule_type' => 1
    ];
    $result = save('doctor_schedule', $data);
    if ($result) {
        http_response_code(200);
        echo json_encode(array("status" => "success", "message" => "Doctor Schedule set successfully!"));
    } else {
        http_response_code(400);
        echo json_encode(array("status" => "error", "message" => "Schedule set failed"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("status" => "error", "message" => "No date provided!"));
}

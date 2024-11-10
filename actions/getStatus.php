<?php
require_once('../config/config.php');
$result = joinTable('doctor_schedule', [['appointment', 'appointment.Doctor_schedule_ID', 'doctor_schedule.Doctor_schedule_ID']], ['Patient_ID' => $_SESSION['Patient_ID']]);

if ($result) {
    http_response_code(200);
    echo json_encode(["status" => "success", "data" => $result]);
} else {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Failed to retrieve data"]);
}

<?php
require_once('../config/config.php');

if (isset($_POST['delete_Schedule'])) {
    $Doctor_schedule_ID = $_POST['Doctor_schedule_ID'];
    $result = delete('doctor_schedule', ['Doctor_schedule_ID' => $Doctor_schedule_ID]);

    if ($result) {
        http_response_code(200);
        echo json_encode(array("status" => "success", "message" => "Deleted Successfully."));
    } else {
        http_response_code(400);
        echo json_encode(array("status" => "success", "message" => "Deleting Failed."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("status" => "success", "message" => "No date selected."));
}

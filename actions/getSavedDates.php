<?php
require_once('../config/config.php');
$result = find_where('doctor_schedule', ['Doctor_Schedule_type' => 1]);

if ($result) {
    http_response_code(200);
    echo json_encode(["status" => "success", "data" => $result]);
}

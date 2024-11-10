<?php
require_once('../config/config.php');

$tooth_id = $_POST['tooth_ids'];
$tooth_type = $_POST['tooth_types'];

if ($tooth_type == 0) {
    $recent = 0;
} else {
    $recent = 1;
}

$update = update('appointmenttoothresult', ['AppointmentToothResult_ID' => $tooth_id], ['Appointment_Tooth_Status' => $tooth_type, 'Recent_change' => $recent]);

if ($update) {
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    echo json_encode(array('success' => 'Update successful'));
} else {
    header('Content-Type: application/json');
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('failed' => 'Update failed'));
}

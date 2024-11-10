<?php
require_once('../config/config.php');

if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $query = first('doctor_schedule', ['Doctor_schedule_avail' => $date . ' ' . '00:00:00']);
    if (!empty($query)) {
        $response = 'occupied';
    } else {
        $response = 'available';
    }
    echo json_encode($response);
}

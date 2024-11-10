<?php
require_once('../config/config.php');

if (isset($_POST['DateSchedule'])) {
    $date = $_POST['DateSchedule'];
    // $check = "SELECT * FROM schedule WHERE schedule_avail = '$date 00:00:00' LIMIT 1";
    $check = first('doctor_schedule', ['Doctor_schedule_avail' => $date . ' ' . '00:00:00']);
    $sched_ID = $check['Doctor_schedule_ID'];
    $time = $_POST['schedTime'];
    $now = date('Y-m-d H:i:s');
    $consultation_Time = date('h:i:s',  strtotime($time));
    // $query = "INSERT INTO consultation(schedule_ID,consultation_Time, consultation_createdAt) VALUES('$sched_ID',' $consultation_Time','$now')";
    $data = [
        'Doctor_schedule_ID' => $sched_ID,
        'Appointment_Time' => $time,
        'Patient_ID' => $_SESSION['Patient_ID'],
        'Doctor_ID' => null,
        'Appointment_status' => 0,
        'Appointment_createdAt' => $now
    ];
    $save = save('appointment', $data);

    $services = $_POST['Services'];

    if ($save) {
        foreach ($services as $key => $value) {
            $data2 = [
                'Services_ID' => $services[$key],
                'Appointment_ID' => $save
            ];
            $save_services = save('appointment_services', $data2);
        }

        // $save = mysqli_query($conn, $query);
        if ($save_services) {
            $response = array(
                'status' => 'success',
                'message' => 'Schedule set successfully!'
            );
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Event saved failed: ' . mysqli_error($conn)
            );
        }
    }
    
} else {
    $response = array(
        'status' => 'error',
        'message' => 'No date sent'
    );
}
header('Content-Type: application/json');
echo json_encode($response);

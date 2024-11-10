<?php require_once('../config/config.php');

$patientID = $_GET['patient_ID'];
$patient = first('patient', ['Patient_ID' => $patientID]);
// var_dump($patient);
$status = $_GET['status'];

if ($status == 0) {
    $status_update = 1;
    $text_message = "Dear " . $patient['patientFname'] . " " . $patient['patientLname'] . ",\n\nYour account has been activated.\n\nDo not reply,\n This is computer generated";
} else if ($status == 1) {
    $status_update = 0;
    $message = 'Deactivated ';
    $text_message = "Dear " . $patient['patientFname'] . " " . $patient['patientLname'] . ",\n\nYour account has been deactivated\n\nDo not reply,\n This is computer generated";
}
$update = update('patient', ['Patient_ID' => $patientID], ['patientStatus' => $status_update]);
$user = first('patient', ['Patient_ID' => $patientID]);

if ($update) {
    $send = sendMessage($user['patientContact'], $text_message);
    
    if ($send) {
        setFlash('success', $message);
        redirect('ManagePatient');
    } else {
        echo 'failed';
    }
}

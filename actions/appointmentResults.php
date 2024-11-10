<?php
require_once('../config/config.php');

$patient_ID = $_POST['patient_id'];
$appointment_ID = $_POST['appointment_id'];
$treatment = $_POST['treatment'];
$date = date('Y-m-d', strtotime($_POST['date']));

if ($_POST['certificate'] == 0) {
    $certificate = 'No Certificate';
} else {
    $certificate = 'Certificate';
}
$data = [
    'Appointment_ID'            => $appointment_ID,
    'Treatment'                 => $treatment,
    'Certificate_Issued'        => $certificate,
    'Appointment_Result_Date'   => date('Y-m-d H:i:s')
];

$appointment = save('appointmentresult', $data);
update('appointment', ['Appointment_ID' => $appointment_ID], ['Doctor_ID' => $_POST['doctor'], 'Appointment_status' => 4]);

if ($_POST['checkbox'] == 1) {
    save('prescription', ['Appointment_ID' => $appointment_ID, 'Prescription_Description' => $_POST['prescription']]);
}

if ($appointment) {
    $tooth = find_where('tooth', ['Patient_ID' => $patient_ID], 'Tooth_Number', 'ASC');
    foreach ($tooth as $teeth) {
        $data2 = [
            'Appointment_ID'            => $appointment_ID,
            'Tooth_ID'                  => $teeth['Tooth_ID'],
            'Appointment_Tooth_Status'  => $teeth['Tooth_Status'],
            'Recent_change'             => $teeth['Recent_change'],
        ];
        $appoint_tooth = save('appointmenttoothresult', $data2);
    }
    if ($appoint_tooth) {
        $reset1 = update('tooth', ['Patient_ID' => $patient_ID, 'Recent_change' => 2], ['Recent_change' => 0]);
        $reset2 = update('tooth', ['Patient_ID' => $patient_ID, 'Recent_change' => 1], ['Recent_change' => 2]);
        setFlash('success', 'Appointment Saved Successfully');
        redirect('assistantAppointmentDate', ['from' => date('Y-m-d'), 'to' => date('Y-m-d', strtotime('+7 days'))]);
    } else {
        $links = [
            'patient_id' => $patient_ID,
            'appointment_id' => $appointment_ID
        ];
        returnError(['failed' => 'Saving Appointment Failed']);
        redirect('assistantAssignTeeth', $links);
    }
}

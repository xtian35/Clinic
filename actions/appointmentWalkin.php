<?php
require_once('../config/config.php');

$patient_ID = $_POST['patient_id'];
$treatment = $_POST['treatment'];

if ($_POST['certificate'] == 0) {
    $certificate = 'No Certificate';
} else {
    $certificate = 'Certificate';
}

$data2 = [
    'Assistant_ID' => $_SESSION['Assistant_ID'],
    'Doctor_schedule_avail' => date('Y-m-d'),
    'Doctor_schedule_type'  => 2,
];

$doctor_schedule = save('doctor_schedule', $data2);

$data3 = [
    'Doctor_schedule_ID' => $doctor_schedule,
    'Patient_ID' => $patient_ID,
    'Doctor_ID' => $_POST['doctor'],
    'Appointment_Time' => date('H:i:s'),
    'Appointment_status' => 4,
    'Appointment_createdAt' => date('Y-m-d h:i:s')
];

$appointment = save('appointment', $data3);

$data = [
    'Appointment_ID'            => $appointment,
    'Treatment'                 => $treatment,
    'Certificate_Issued'        => $certificate,
    'Appointment_Result_Date'   => date('Y-m-d H:i:s')
];

$appointmentresult = save('appointmentresult', $data);

if ($_POST['checkbox'] == 1) {
    save('prescription', ['Appointment_ID' => $appointment, 'Prescription_Description' => $_POST['prescription']]);
}

if ($appointment) {
    $tooth = find_where('tooth', ['Patient_ID' => $patient_ID], 'Tooth_Number', 'ASC');
    foreach ($tooth as $teeth) {
        $data5 = [
            'Appointment_ID'            => $appointment,
            'Tooth_ID'                  => $teeth['Tooth_ID'],
            'Appointment_Tooth_Status'  => $teeth['Tooth_Status'],
            'Recent_change'             => $teeth['Recent_change'],
        ];
        $appoint_tooth = save('appointmenttoothresult', $data5);
    }
    if ($appoint_tooth) {
        $reset = update('tooth', ['Patient_ID' => $patient_ID], ['Recent_change' => 0]);
        setFlash('success', 'Appointment Saved Successfully');
        redirect('assistantWalkin');
    } else {
        returnError(['failed' => 'Saving Appointment Failed']);
        redirect('assistantWalkin', $links);
    }
}

<?php
require_once('../config/config.php');

if (isset($_POST['cancelAppointment'])) :
    $appointment_ID = $_POST['Appointment_ID'];
    $appoint = first('appointment', ['Appointment_ID' => $appointment_ID]);
    $patient = first('patient', ['Patient_ID' => $appoint['Patient_ID']]);
    $contact = $_POST['contact'];
    $text_message = "Dear " . $patient['patientFname'] . " " . $patient['patientLname'] . ",\nYour appointment has been cancelled. Please set another appointment.";
    $update = update('appointment', ['Appointment_ID' => $appointment_ID], ['Appointment_status' => 2]);
    if ($update) {
        $send = sendMessage($contact, $text_message);
        setFlash('success', 'Cancelled Successfuly');
        redirect('assistantAppointment', ['date' => $_POST['date']]);
    } else {
        setFlash('failed', 'Cancelled Failed');
        redirect('assistantAppointment', ['date' => $_POST['date']]);
    }
endif;

if (isset($_POST['notArrive'])) :
    $appointment_ID = $_POST['Appointment_ID'];
    $update = update('appointment', ['Appointment_ID' => $appointment_ID], ['Appointment_status' => 3]);
    if ($update) {
        setFlash('success', 'Patient did not arrive');
        redirect('assistantAppointment', ['date' => $_POST['date']]);
    } else {
        setFlash('failed', 'Failed');
        redirect('assistantAppointment', ['date' => $_POST['date']]);
    }
endif;

if (isset($_POST['AcceptAppointment'])) :
    $appointment_ID = $_POST['appointment_id'];
    $appoint = first('appointment', ['Appointment_ID' => $appointment_ID]);
    $patient = first('patient', ['Patient_ID' => $appoint['Patient_ID']]);
    $Doctor_schedule_ID = $_POST['Doctor_schedule_ID'];
    $time = first('appointment', ['Appointment_ID' => $appointment_ID]);
    $contact = $_POST['contact'];
    $text_message = "Dear " . $patient['patientFname'] . " " . $patient['patientLname'] . ",\nYour appointment has been confirmed. Please show this message to the assistant at the ISAT U Dental Clinic as proof of your appointment. Thank you.";
    $check = joinTable('appointment', [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_Schedule_ID']], ['doctor_schedule.Doctor_schedule_ID' => $Doctor_schedule_ID, 'appointment.Appointment_Time' => $time['Appointment_Time'], 'Appointment_status' => 1]);
    if (empty($check)) {
        $update = update('appointment', ['Appointment_ID' => $appointment_ID], ['Appointment_status' => 1]);
        if ($update) {
            $send = sendMessage($contact, $text_message);
            setFlash('success', 'Accepted Successfuly');
            redirect('assistantAppointment', ['date' => $_POST['date']]);
        } else {
            setFlash('failed', 'Accepting Failed');
            redirect('assistantAppointment', ['date' => $_POST['date']]);
        }
    } else {
        setFlash('failed', 'Schedule Already Occupied');
        redirect('assistantAppointment', ['date' => $_POST['date']]);
    }
endif;

if (isset($_POST['checkTeeths'])) :

    $appointment_ID = $_POST['appointment_id'];
    $patient_ID = $_POST['patient_id'];
    $date = $_POST['date'];
    $checkExistingTeeth = first('tooth', ['Patient_ID' => $patient_ID]);
    if ($checkExistingTeeth) {
        $links = [
            'patient_id' => $patient_ID,
            'appointment_id' => $appointment_ID,
            'date' => date('Y-m-d H:i:s', strtotime($date))
        ];
        redirect('assistantAssignTeeth', $links);
    } else {
        for ($tooth_number = 1; $tooth_number <= 52; $tooth_number++) {
            // create a new record for the tooth
            $tooth_record = [
                'Patient_ID' => $patient_ID,
                'Tooth_Number' => $tooth_number,
                'Tooth_Status' => 0,
                'Recent_change' => 0
            ];
            $save = save('tooth', $tooth_record);
        }

        if ($save) {
            $links = [
                'patient_id'        => $patient_ID,
                'appointment_id'    => $appointment_ID,
                'date'              => date('Y-m-d H:i:s', strtotime($date))

            ];
            redirect('assistantAssignTeeth', $links);
        }
    }

endif;

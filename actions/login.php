<?php require_once('../config/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($patient = first('patient', ['patientEmail' => $email])) {
        if (password_verify($password, $patient['patientPassword'])) {
            if (!empty($patient['patientIDpicture'])) {
                if ($patient['patientStatus'] == 1) {
                    setSession($patient);
                    setFlash('success', 'Welcome!' . ' ' . $patient['patientFname']);
                    redirect('patientDashboard');
                } else {
                    retainValue();
                    returnError(['email' => 'Account is not activated!']);
                    redirect('index');
                }
            } else {
                redirect('uploadID', ['patient_ID' => $patient['Patient_ID']]);
            }
        } else {
            retainValue();
            returnError(['password' => 'Password incorrect!']);
            redirect('index');
        }
    } else if ($assistant = first('assistant', ['assistantEmail' => $email])) {
        if (password_verify($password, $assistant['assistantPassword'])) {
            if ($assistant['assistantStatus'] == 1) {
                setSession($assistant);
                setFlash('success', 'Welcome' . ' ' . $assistant['assistantFname']);
                redirect('assistantDashboard');
            } else {
                retainValue();
                returnError(['email' => 'Account is not activated!']);
                redirect('index');
            }
        } else {
            retainValue();
            returnError(['password' => 'Password incorrect!']);
            redirect('index');
        }
    } else {
        returnError(['email' => 'Email does not exist!']);
        redirect('index');
    }
}

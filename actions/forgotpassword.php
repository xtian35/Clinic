<?php

require_once('../config/config.php');

if (isset($_POST['forgot'])) :

    $email = $_POST['email'];

    if ($patient = first('patient', ['patientEmail' => $email])) {
        $code = generateRandomString();
        $encoded = base64_encode($code);
        $text_message = "Dear " . $patient['patientFname'] . " " . $patient['patientLname'] . ",\n\nYour account verification code is " . $code . "\n\nDo not reply,\n This is computer generated";
        $send = sendMessage($patient['patientContact'], $text_message);
        $links = [
            'user' => 'patient',
            'id' => $patient['Patient_ID'],
            'supmen' => $encoded
        ];
        redirect('verification', $links);
    } else if ($assistant = first('assistant', ['assistantEmail' => $email])) {
        $code = generateRandomString();
        $encoded = base64_encode($code);
        $text_message = "Dear " . $assistant['assistantFname'] . " " . $assistant['assistantLname'] . ",\n\nYour account verification code is " . $code . "\n\nDo not reply,\n This is computer generated";
        $send = sendMessage($assistant['assistantContact'], $text_message);
        $links = [
            'user' => 'assistant',
            'id' => $assistant['Assistant_ID'],
            'supmen' => $encoded
        ];
        redirect('verification', $links);
    } else {
        returnError(['email' => 'Email does not exist!']);
        redirect('forgotpassword');
    }
endif;

if (isset($_POST['verify'])) :
    $code = $_POST['code'];
    $verification_code = $_POST['verify_code'];
    $user = $_POST['user'];
    $id = $_POST['id'];
    if ($code == $verification_code) {

        $links = [
            'user' => $user,
            'id' => $id,
        ];

        redirect('userForgotUpdate', $links);
    } else {
        $encoded = base64_encode($code);
        $links = [
            'user' => $user,
            'id' => $id,
            'supmen' => $encoded
        ];
        returnError(['verify_code' => 'Incorrect Verification Code!']);
        redirect('verification');
    }
endif;

if (isset($_POST['update'])) :
    $newpassword = $_POST['newpassword'];
    $confirmnewpassword = $_POST['confirmnewpassword'];
    $user = $_POST['user'];
    $id = $_POST['id'];
    if ($newpassword == $confirmnewpassword) {
        if ($user == 'assistant') {
            $data = [
                'assistantPassword' => password_hash($newpassword, PASSWORD_DEFAULT),
            ];
            $update = update('assistant', ['Assistant_ID' => $id], $data);
            setFlash('success', 'Password Updated Successfully');
            redirect('index');
        } else if ($user == 'patient') {
            $data = [
                'patientPassword' => password_hash($newpassword, PASSWORD_DEFAULT),
            ];
            $update = update('patient', ['Patient_ID' => $id], $data);
            setFlash('success', 'Password Updated Successfully');
            redirect('index');
        }
    } else {
        $links = [
            'user' => $user,
            'id' => $id
        ];
        returnError(['password' => 'Password do not match']);
        redirect('userForgotUpdate', $links);
    }
endif;

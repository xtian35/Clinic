<?php require_once('../config/config.php');

if (isset($_POST['profile'])) {
    
    $file_extension = pathinfo($_FILES['patientProfilepicture']['name'], PATHINFO_EXTENSION);
    $random_name = md5(uniqid());
    $picture_name = $random_name . '.' . $file_extension;
    $patient_ID = $_SESSION['Patient_ID'];

    $update = update('patient', ['Patient_ID' => $patient_ID], ['patientProfilepicture' => '../public/Profilepictures/' . $picture_name]);
    if ($update) {
        $move = move_uploaded_file($_FILES['patientProfilepicture']['tmp_name'], '../public/Profilepictures/' . $picture_name);
        if ($move) {
            setSession(['patientProfilepicture'=>'../public/Profilepictures/' . $picture_name]);
            setFlash('success', 'Profile Picture Uploaded');
            redirect('patientUpdateprofile');
        }
    }
}
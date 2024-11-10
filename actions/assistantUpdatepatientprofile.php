<?php require_once('../config/config.php');

$patientID=$_GET['patient_ID'];

if (isset($_POST['updateProfile'])):
    $data = [
        'patientFname' => $_POST['firstname'], 'patientLname' => $_POST['lastname'], 'patientContact' => $_POST['contact'], 'patientAddress' => $_POST['address'],
        'patientEmail' => $_POST['email']
    ];
    
$update = update('patient', ['Patient_ID' => $_SESSION['Patient_ID']], $data);
if ($update) {
    setFlash('success', 'Profile Updated');
    redirect('assistantManagePatient');
};
endif;




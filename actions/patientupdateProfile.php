<?php require_once('../config/config.php');

if (isset($_POST['updatepatientProfile'])):
    $data = [
        'patientFname' => $_POST['firstname'], 'patientLname' => $_POST['lastname'], 'patientContact' => $_POST['contact'], 'patientAddress' => $_POST['address'],
        'patientEmail' => $_POST['email']
    ];
    
$update = update('patient', ['Patient_ID' => $_SESSION['Patient_ID']], $data);
if ($update) {
    setFlash('success', 'Profile Updated');
    redirect('patientUpdateprofile');
};
endif;


if (isset($_POST['updatePassword'])):
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $fields = [
        'password'          => $password,
        'confirmpassword'   => $confirmpassword,
    ];

    $validations = [
        'password'  => [
            'required' => true,
            'min_length' => 6,
        ],
        'confirmpassword'  => [
            'required' => true,
            'match' => 'password'
        ],
    ];
    $errors = validate($fields, $validations);
    if (empty($errors)) {

        $data = [
            'patientPassword'   => password_hash($password, PASSWORD_DEFAULT),
        ];

        $update = update('patient', ['Patient_ID' => $_SESSION['Patient_ID']], $data);
        if ($update) {
            setFlash('success', 'Password Updated');
            redirect('patientUpdateProfile');
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('patientUpdatePassword');
    }

endif;


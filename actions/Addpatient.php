<?php require_once('../config/config.php');

if (isset($_POST['register'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $address = $_POST['address'];

    $fields = [
        'firstname'         => $fname,
        'lastname'          => $lname,
        'password'          => $password,
        'confirmpassword'   => $confirmpassword,
        'contact'           => $contact,
        'email'             => $email,
        'role'              => $role,
        'address'           => $address,
    ];

    $validations = [
        'firstname' => [
            'required' => true,
        ],
        'lastname'  => [
            'required' => true,
        ],
        'password'  => [
            'required' => true,
            'min_length' => 6,
        ],
        'confirmpassword'  => [
            'required' => true,
            'match' => 'password'
        ],
        'contact'  => [
            'required' => true,
            'min_lenght' => 11,
            'max_lenght' => 13,
        ],
        'email'  => [
            'required' => true,
            'email' => true,
            'unique' => [
                [
                    'fieldName' => 'patientEmail',
                    'tableNAme' => 'patient'
                ],
                [
                    'fieldName' => 'assistantEmail',
                    'tableNAme' => 'assistant'
                ],
            ],
        ],
        'address'  => [
            'required' => true,
        ],
    ];  

    $errors = validate($fields, $validations);
    if (empty($errors)) {

        $data = [
            'Assistant_ID'      => $_SESSION['Assistant_ID'],
            'patientFname'      => $fname,
            'patientLname'      => $lname,
            'patientPassword'   => password_hash($password, PASSWORD_DEFAULT),
            'patientContact'    => '+63'.$contact,
            'patientEmail'      => $email,
            'patientRole'       => $role,
            'patientAddress'    => $address,
            'patientStatus'     => 0
        ];
        $save = save('patient', $data);
        if ($save) {
            removeValue();
            setFlash('success','Patient Added Successfully');
            redirect('RegisterPatient');
        }
        else{
            retainValue();
            setFlash('failed','Adding Assistant Failed');
            redirect('RegisterPatient');
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('RegisterPatient');
    }
}
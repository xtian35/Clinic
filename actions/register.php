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
    $birth = $_POST['birth'];

    $fields = [
        'firstname'         => $fname,
        'lastname'          => $lname,
        'password'          => $password,
        'confirmpassword'   => $confirmpassword,
        'contact'           => $contact,
        'email'             => $email,
        'role'              => $role,
        'address'           => $address,
        'birth'             => $birth,
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
                [
                    'fieldName' => 'Email',
                    'tableNAme' => 'admin'
                ]
            ],
        ],
        'address'  => [
            'required' => true,
        ],
        'birth'  => [
            'required' => true,
        ],
    ];

    $errors = validate($fields, $validations);
    if (empty($errors)) {

        $data = [
            'patientFname'      => $fname,
            'patientLname'      => $lname,
            'patientPassword'   => password_hash($password, PASSWORD_DEFAULT),
            'patientContact'    => '+63'.$contact,
            'patientEmail'      => $email,
            'patientRole'       => $role,
            'patientAddress'    => $address,
            'patientBirthdate'  => $birth,
            'patientStatus'     => 0
        ];

        $save = save('patient', $data);
        if ($save) {
            if ($role == "student") {
                $student = save('patient_student', ['Patient_ID' => $save, 'CollegeiD' => $_POST['college'], 'CourseID' => $_POST['course'], 'Year' => $_POST['year'], 'section' => $_POST['section']]);
                removeValue();
                redirect('uploadID', ['patient_ID' => $save]);
            } else {
                removeValue();
                redirect('uploadID', ['patient_ID' => $save]);
            }
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('register');
    }
}

//UploadID
if (isset($_POST['uploadID'])) {
    $file_extension = pathinfo($_FILES['IDPicture']['name'], PATHINFO_EXTENSION);
    $random_name = md5(uniqid());
    $picture_name = $random_name . '.' . $file_extension;
    $patient_ID = $_POST['patient_ID'];

    $update = update('patient', ['patient_ID' => $patient_ID], ['patientIDpicture' => '../public/IDs/' . $picture_name]);
    if ($update) {
        $move = move_uploaded_file($_FILES['IDPicture']['tmp_name'], '../public/IDs/' . $picture_name);
        if ($move) {
            setFlash('success', 'Register Successfuly');
            redirect('index');
        }
    }
}

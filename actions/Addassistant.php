
<?php require_once('../config/config.php');

if (isset($_POST['addassistant'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $fields = [
        'firstname'         => $fname,
        'lastname'          => $lname,
        'password'          => $password,
        'confirmpassword'   => $confirmpassword,
        'contact'           => $contact,
        'email'             => $email,
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
                [
                    'fieldName' => 'Email',
                    'tableNAme' => 'admin'
                ]
            ]
        ],
        'address'  => [
            'required' => true,
        ],
    ];

    $errors = validate($fields, $validations);
    if (empty($errors)) {

        $data = [
            'assistantFname'      => $fname,
            'assistantLname'      => $lname,
            'assistantPassword'   => password_hash($password, PASSWORD_DEFAULT),
            'assistantContact'    => '+63'.$contact,
            'assistantEmail'      => $email,
            'assistantAddress'    => $address,
            'assistantStatus'     => 1
        ];

        $save = save('assistant', $data);
        if ($save) {
            removeValue();
            setFlash('success','Assistant Added Successfully');
            redirect('RegisterAssistant');
        }
        else{
            retainValue();
            setFlash('failed','Adding Assistant Failed');
            redirect('RegisterAssistant');
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('RegisterAssistant');
    }
}


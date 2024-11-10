
<?php require_once('../config/config.php');

if (isset($_POST['addadmin'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];

    $fields = [
        'firstname'         => $fname,
        'lastname'          => $lname,
        'password'          => $password,
        'confirmpassword'   => $confirmpassword,
        'email'             => $email,
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
    ];

    $errors = validate($fields, $validations);
    if (empty($errors)) {

        $data = [
            'AdminFname'      => $fname,
            'AdminLname'      => $lname,
            'Password'   => password_hash($password, PASSWORD_DEFAULT),
            'Email'      => $email,
        ];

        $save = save('admin', $data);
        if ($save) {
            removeValue();
            setFlash('success','Admin Added Successfully');
            redirect('adminManageAdmin');
        }
        else{
            retainValue();
            setFlash('failed','Adding Admin Failed');
            redirect('adminRegisterAdmin');
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('adminRegisterAdmin');
    }
}


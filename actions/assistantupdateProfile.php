<?php require_once('../config/config.php');

if(isset($_POST['updateProfile'])):
    $data = [
        'assistantFname' => $_POST['firstname'], 'assistantLname'=> $_POST['lastname'], 'assistantContact'=> $_POST['contact'], 'assistantAddress' => $_POST['address'],
        'assistantEmail' => $_POST['email']
    ];
    
    $update = update('assistant', ['Assistant_ID' => $_SESSION['Assistant_ID']], $data);
    if ($update) {
        setFlash('success', 'Profile Updated');
        redirect('assistantUpdateprofile');
    } 
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
            'assistantPassword'   => password_hash($password, PASSWORD_DEFAULT),
        ];

        $update = update('assistant', ['Assistant_ID' => $_SESSION['Assistant_ID']], $data);
        if ($update) {
            setFlash('success', 'Password Updated');
            redirect('assistantUpdateProfile');
        }
    } else {
        retainValue();
        returnError($errors);
        redirect('assistantUpdatePassword');
    }

endif;
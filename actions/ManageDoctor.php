<?php require_once('../config/config.php');
if (isset($_POST['updatedoctor'])) {

    $name = $_POST['name'];
    $title = $_POST['title'];
    $Doctor_ID = $_POST['Doctor_ID'];

    $save = update('doctor', ['Doctor_ID' => $Doctor_ID], ['Doctor_name' => $name, 'Doctor_title' => $title]);
    if ($save) {
        setFlash('success', 'Doctor Updated Successfully');
        redirect('assistantDoctors');
    }
}

if (isset($_GET['activate'])) {
    $Doctor_ID = $_POST['Doctor_ID'];
    $Doctor_status = $_POST['Doctor_status'];
    if ($Doctor_status == 0) {
        $status = 1;
        $message = "Activated Successfully";
    } else {
        $status = 0;
        $message = "Deactivated";
    }
    $save = update('doctor', ['Doctor_ID' => $Doctor_ID], ['Doctor_status' => $status]);
    if ($save) {
        setFlash('success', $message);
        redirect('assistantDoctors');
    }
}

if (isset($_POST['adddoctor'])) {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $save = save('doctor', ['Doctor_name' => $name, 'Doctor_title' => $title, 'Doctor_status' => 1]);
    if ($save) {
        setFlash('success', 'Doctor Added Successfully');
        redirect('assistantDoctors');
    }
}

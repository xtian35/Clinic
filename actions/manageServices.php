<?php require_once('../config/config.php');

if (isset($_POST['addservices'])) {

    $services = $_POST['services'];
    $save = save('services', ['Services_name' => $services]);
    if ($save) {
        setFlash('success', 'Service Added Successfully');
        redirect('Services');
    }
}
if (isset($_POST['updateservices'])) {
    $services = $_POST['services'];
    $service_id = $_POST['service_id'];
    $update = update('services', ['Services_ID' => $service_id], ['Services_name' => $services]);
    if ($update) {
        setFlash('success', 'Service Updated Successfully');
        redirect('Services');
    }
}
if (isset($_GET['delete'])) {
    $service_id = $_GET['services_id'];

    $delete = delete('services', ['Services_ID' => $service_id]);
    if ($delete) {
        setFlash('success', 'Service Deleted Successfully');
        redirect('Services');
    }
}

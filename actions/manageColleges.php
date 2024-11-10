<?php require_once('../config/config.php');

if (isset($_POST['addcolleges'])) {

    $services = $_POST['college'];
    $save = save('college', ['CollegeName' => $services]);
    if ($save) {
        setFlash('success', 'College Added Successfully');
        redirect('Colleges');
    }
}
if (isset($_POST['updatecolleges'])) {
    $college = $_POST['college'];
    $college_id = $_POST['college_id'];
    $update = update('college', ['CollegeID' => $college_id], ['CollegeName' => $college]);
    if ($update) {
        setFlash('success', 'College Updated Successfully');
        redirect('Colleges');
    }
}
if (isset($_GET['delete'])) {
    $college_id = $_GET['college_id'];

    $delete = delete('college', ['CollegeID' => $college_id]);
    if ($delete) {
        setFlash('success', 'College Deleted Successfully');
        redirect('Colleges');
    }
}

if (isset($_POST['addcourses'])) {

    $course = $_POST['course'];
    $college_id = $_POST['college_id'];
    $save = save('course', ['CollegeID' => $college_id, 'CourseName' => $course]);
    if ($save) {
        setFlash('success', 'Course Added Successfully');
        redirect('Colleges');
    }
}
if (isset($_POST['updatecourses'])) {
    $course_id = $_POST['course_id'];
    $course = $_POST['course'];
    $college_id = $_POST['college_id'];
    $update = update('course', ['CourseID' => $course_id], ['CourseName' => $course, 'CollegeID' => $college_id]);
    if ($update) {
        setFlash('success', 'Course Updated Successfully');
        redirect('Colleges');
    }
}
if (isset($_GET['deleteCourse'])) {
    $course_id = $_GET['course_id'];

    $delete = delete('course', ['CourseID' => $course_id]);
    if ($delete) {
        setFlash('success', 'Course Deleted Successfully');
        redirect('Colleges');
    }
}


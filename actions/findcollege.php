<?php

require_once('../config/config.php');

$college_id = $_GET['college'];

$courses = find_where('course', ['CollegeID' => $college_id]);

foreach ($courses as $row) : ?>
    <option value="<?= $row['CourseID'] ?>"><?= $row['CourseName'] ?></option>
<?php endforeach; ?>
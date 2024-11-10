<?php
require_once('../config/config.php');
$starting_date = date('Y-m-d', strtotime('monday this week'));
$end_date = date('Y-m-d', strtotime('+6 days', strtotime('monday this week')));
// Get starting and ending dates for next week
$next_week_start = strtotime('next monday');
$next_week_end = strtotime('+6 days', $next_week_start);
$starting_date_nxt = date('Y-m-d', $next_week_start);
$end_date_nxt  = date('Y-m-d', $next_week_end);

$today_assistant = countResultJoin('appointment', [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']], ['Appointment_status' => 1, 'Doctor_schedule_avail' => date('Y-m-d')]);
// Format the starting date in your desired format
$this_week_assistant = countResultJoinBetween(
    'appointment',
    [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']],
    [
        'Appointment_status' => 1,
        ['doctor_schedule.Doctor_schedule_avail', '>=', $starting_date],
        ['doctor_schedule.Doctor_schedule_avail', '<=', $end_date]
    ]
);

$next_week_assistant = countResultJoinBetween(
    'appointment',
    [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']],
    [
        'Appointment_status' => 1,
        ['doctor_schedule.Doctor_schedule_avail', '>=', $starting_date_nxt],
        ['doctor_schedule.Doctor_schedule_avail', '<=', $end_date_nxt]
    ]
);



if (isset($_SESSION['Patient_ID'])) {
    $today_patient = countResultJoin('appointment', [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']], ['Appointment_status' => 1, 'Doctor_schedule_avail' => date('Y-m-d'),'Patient_ID'=>$_SESSION['Patient_ID']]);
    // Format the starting date in your desired format
    $this_week_patient = countResultJoinBetween(
        'appointment',
        [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']],
        [
            ['appointment.Patient_ID','=',$_SESSION['Patient_ID']],
            ['appointment.Appointment_status' ,'=',1 ],
            ['doctor_schedule.Doctor_schedule_avail', '>=', $starting_date],
            ['doctor_schedule.Doctor_schedule_avail', '<=', $end_date]
        ]
    );

    $next_week_patient = countResultJoinBetween(
        'appointment',
        [['doctor_schedule', 'doctor_schedule.Doctor_schedule_ID', 'appointment.Doctor_schedule_ID']],
        [
            ['appointment.Patient_ID','=',$_SESSION['Patient_ID']],
            ['appointment.Appointment_status' ,'=',1 ],
            ['doctor_schedule.Doctor_schedule_avail', '>=', $starting_date_nxt],
            ['doctor_schedule.Doctor_schedule_avail', '<=', $end_date_nxt]
        ]
    );
}

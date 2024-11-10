<?php

require_once('../config/config.php');
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $row = firstJoin('doctor_schedule', [['appointment', 'appointment.Doctor_schedule_ID', 'doctor_schedule.Doctor_schedule_ID']], ['doctor_schedule.Doctor_schedule_avail' => $date . ' ' . '00:00:00', 'appointment.Appointment_status' => 1]);

    if (!empty($row)) {
        $dateChecked = $row['Doctor_schedule_ID'];
        $seven30 = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '07:30:00', 'Appointment_status' => 1]);
        $eight30 = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '08:30:00', 'Appointment_status' => 1]);
        $nine30 = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '09:30:00', 'Appointment_status' => 1]);
        $ten30 = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '10:30:00', 'Appointment_status' => 1]);
        $one = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '01:00:00', 'Appointment_status' => 1]);
        $two = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '02:00:00', 'Appointment_status' => 1]);
        $three = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '03:00:00', 'Appointment_status' => 1]);
        $four = countResult('appointment', ['Doctor_schedule_ID' => $dateChecked, 'Appointment_Time' => '04:00:00', 'Appointment_status' => 1]);
    } else {
        $seven30 = 0;
        $eight30 = 0;
        $nine30 = 0;
        $ten30 = 0;
        $one = 0;
        $two = 0;
        $three = 0;
        $four = 0;
    }


?>
    <div class="col-6 mx-auto">
        <h6 class="text-start text-bold">Am</h6>
        <div class="d-flex AM">
            <label for="radio1" class="btn <?php echo $seven30 > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2 d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio1" name="schedTime" value="07:30" <?php echo $seven30 > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>> 7:30 - 8:30</label>
            <label for="radio2" class="btn <?php echo $eight30 > 0 ?  "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio2" name="schedTime" value="08:30" <?php echo $eight30 > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>8:30 - 9:30</label>
            <label for="radio3" class="btn <?php echo $nine30 > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio3" name="schedTime" value="09:30" <?php echo $nine30 > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>9:30 - 10:30</label>
            <label for="radio4" class="btn <?php echo $ten30 > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio4" name="schedTime" value="010:30" <?php echo $ten30 > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>10:30 - 11:30</label>
        </div>
    </div>
    <div class="col-6 mx-auto">
        <h6 class="text-start text-bold">Pm</h6>
        <div class="d-flex AM">
            <label for="radio5" class="btn <?php echo $one  > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio5" name="schedTime" value="01:00" <?php echo $one > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>1:00 - 2:00</label>
            <label for="radio6" class="btn <?php echo $two > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio6" name="schedTime" value="02:00" <?php echo $two > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>2:00 - 3:00</label>
            <label for="radio7" class="btn <?php echo $three > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio7" name="schedTime" value="03:00" <?php echo $three > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>3:00 - 4:00</label>
            <label for="radio8" class="btn <?php echo $four > 0 ? "btn-secondary" : "btn-primary" ?> btn-sm mb-2  d-flex justify-content-start align-items-center"><input type="radio" class="form-check-input m-0 me-1" id="radio8" name="schedTime" value="04:00" <?php echo $four > 0 ? "disabled" : "data-bs-target='#Services' data-bs-toggle='modal'" ?>>4:00 - 5:00</label>
        </div>
    </div>
<?php } ?>
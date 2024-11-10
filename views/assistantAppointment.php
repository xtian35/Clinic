<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Appointments</h4>
            </div>

            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $date = date('Y-m-d', strtotime($_GET['date']));
                        // echo $date;
                        $row = joinTableWherein('appointment', [
                            ['doctor_schedule', 'appointment.Doctor_schedule_ID', 'doctor_schedule.Doctor_schedule_ID'],
                            ['patient', 'appointment.Patient_ID', 'patient.Patient_ID'],
                        ], [
                            'appointment.Appointment_Status' => [1, 0],
                            'DATE(doctor_schedule.Doctor_schedule_avail)' => $date
                        ]);
                        ?>

                        <?php foreach ($row as $result) : ?>
                            <tr>
                                <td><?= $result['patientFname'] . ' ' . $result['patientLname'] ?></td>
                                <td><?php echo date('M d, Y', strtotime($result['Doctor_schedule_avail'])) ?></td>
                                <td><?= $result['Appointment_Time'] ?></td>
                                <td style="width:10% !important;word-wrap: break-word !important;">
                                    <?php $services = joinTable('appointment_services', [['services', 'services.Services_ID', 'appointment_services.Services_ID']], ['appointment_services.Appointment_ID' => $result['Appointment_ID']]);
                                    foreach ($services as $row) :
                                        echo $row['Services_name'] . ', </br>';
                                    endforeach ?>
                                </td>
                                <td><?php echo $result['Appointment_status'] == 0 ? "Pending" : ($result['Appointment_status'] == 1 ? "Accepted" : ($result['Appointment_status'] == 3 ? "Did not arrived" : "Cancelled")) ?></td>
                                <?php $cancel = first('appointmentresult', ['Appointment_ID' => $result['Appointment_ID']]);
                                if (empty($cancel)) {
                                    if ($result['Appointment_status'] == 0) { ?>
                                        <form method="post" action="../actions/manageAppointmentAssistant.php">
                                            <input type="hidden" name="Appointment_ID" value="<?= $result['Appointment_ID'] ?>">
                                            <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                                            <input type="hidden" name="contact" value="<?= $result['patientContact'] ?>">
                                            <td><button type="submit" name="cancelAppointment" class="btn btn-danger"><i class="fa fa-trash"></i>Cancel</button></td>
                                        </form>
                                    <?php  } else if ($result['Appointment_status'] == 1) { ?>
                                        <td>
                                            <form method="post" action="../actions/manageAppointmentAssistant.php">
                                                <input type="hidden" name="Appointment_ID" value="<?= $result['Appointment_ID'] ?>">
                                                <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                                                <div class="row mx-auto mb-2">
                                                    <input type="hidden" name="contact" value="<?= $result['patientContact'] ?>">
                                                    <button type="submit" name="cancelAppointment" class="btn btn-danger"><i class="fa fa-trash"></i>Cancel</button>
                                                </div>
                                            </form>
                                            <form method="post" action="../actions/manageAppointmentAssistant.php">
                                                <input type="hidden" name="Appointment_ID" value="<?= $result['Appointment_ID'] ?>">
                                                <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                                                <div class="row mx-auto">
                                                    <button type="submit" name="notArrive" class="btn btn-danger"><i class="fa fa-times"></i>Not Arrive?</button>
                                                </div>
                                            </form>
                                        </td>
                                    <?php } ?>
                                <?php } else { ?>
                                    <td></td>
                                <?php } ?>
                                <?php if ($result['Appointment_status'] == 0) { ?>
                                    <form method="post" id="accept" action="../actions/manageAppointmentAssistant.php">
                                        <input type="hidden" name="appointment_id" value="<?= $result['Appointment_ID'] ?>">
                                        <input type="hidden" name="Doctor_schedule_ID" value="<?= $result['Doctor_schedule_ID'] ?>">
                                        <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                                        <input type="hidden" name="contact" value="<?= $result['patientContact'] ?>">
                                        <td><button type="submit" name="AcceptAppointment" class="btn btn-success"><i class="fa fa-check"></i>Accept</button></td>
                                    </form>
                                    <?php } else {
                                    if (!empty($cancel)) {
                                    ?>
                                        <td><a href="assistantHistoryTooth.php?appointment_id=<?= $result['Appointment_ID'] ?>&patient_id=<?= $result['Patient_ID'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i>View History</a></td>
                                    <?php
                                    } else { ?>
                                        <form method="post" action="../actions/manageAppointmentAssistant.php">
                                            <input type="hidden" name="appointment_id" value="<?= $result['Appointment_ID'] ?>">
                                            <input type="hidden" name="patient_id" value="<?= $result['Patient_ID'] ?>">
                                            <input type="hidden" name="date" value="<?php echo $_GET['date'] ?>">
                                            <td><button type="submit" name="checkTeeths" class="btn btn-primary"><i class="fa fa-eye"></i>View</button></td>
                                        </form>
                                <?php }
                                } ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
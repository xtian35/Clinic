<?php require_once('patientHeader.php'); ?>
<div class="col-lg-12 mx-auto grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">History</h4>
                <div class="col-md-3">
                    <form method="get" action="patientAppointment.php" id="filter-form">
                        <div class="col-md-12 p-0">
                            <div class="row mx-auto g-0">
                                <div class="col-md-6 pe-1">
                                    <label class="label-custom">Date From:</label>
                                    <input class="form-control" type="date" name="from" id="filter-input" value="<?php echo isset($_GET['from']) ? htmlspecialchars($_GET['from']) : ''; ?>" onchange="document.getElementById('filter-form').submit();">
                                </div>
                                <div class="col-md-6 ps-1">
                                    <label class="label-custom">Date To: </label>
                                    <input class="form-control" type="date" name="to" id="filter-input" value="<?php echo isset($_GET['to']) ? htmlspecialchars($_GET['to']) : ''; ?>" onchange="document.getElementById('filter-form').submit();">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Appointment Date</th>
                            <th>Service Scheduled</th>
                            <th>Appointment Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $patientID = $_SESSION['Patient_ID'];
                        $from = $_GET['from'];
                        $to = $_GET['to'];

                        $sql = "SELECT * FROM appointment 
                        JOIN patient ON patient.Patient_ID = appointment.Patient_ID 
                        JOIN doctor_schedule ON doctor_schedule.Doctor_schedule_ID = appointment.Doctor_schedule_ID 
                        WHERE patient.Patient_ID = ?
                        AND doctor_schedule.Doctor_schedule_avail >= ?
                        AND doctor_schedule.Doctor_schedule_avail <= ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, 'sss', $patientID, $from, $to);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        ?>
                        <?php foreach ($row as $result) : ?>
                            <tr>
                                <td><?php echo date('M d, Y', strtotime($result['Doctor_schedule_avail'])) . ' ' . $result['Appointment_Time']; ?></td>
                                <td>
                                    <?php $services = joinTable('appointment_services', [['services', 'services.Services_ID', 'appointment_services.Services_ID']], ['appointment_services.Appointment_ID' => $result['Appointment_ID']]);
                                    foreach ($services as $row) :
                                        echo $row['Services_name'] . ', ';
                                    endforeach ?>
                                </td>
                                <td><?php echo $result['Appointment_status'] == 0 ? "Pending" : ($result['Appointment_status'] == 1 ? "Accepted" : ($result['Appointment_status'] == 2 ? "Cancelled" : ($result['Appointment_status'] == 4 ? "Done" : "Not Arrived"))) ?></td>
                                <?php if ($result['Appointment_status'] == 4) { ?>
                                    <td><a class="btn btn-primary btn-sm px-4" href="patientToothhistory.php?appointment_id=<?= $result['Appointment_ID']; ?>&patient_id=<?= $result['Patient_ID']; ?>"><i class="fa fa-eye"></i> View</a></td>
                                <?php } else { ?>
                                    <td>
                                        <button class="btn btn-primary btn-sm px-4" data-bs-toggle="modal" data-bs-target="#appointment<?= $result['Appointment_ID'] ?>"><i class="fa fa-eye"></i> View</button>
                                    </td>
                                <?php } ?>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="appointment<?= $result['Appointment_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Appointment on <?php echo date('M d, Y', strtotime($result['Doctor_schedule_avail'])) . ' ' . $result['Appointment_Time']; ?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <p class="text-dark"><strong>Patient Name:</strong><?= $result['patientFname'] . ' ' . $result['patientLname'] ?></p>
                                                <p class="text-dark"><strong>Patient Contact:</strong><?= $result['patientContact'] ?></p>
                                                <p class="text-dark"><strong>Patient Address:</strong><?= $result['patientAddress'] ?></p>
                                                <p class="text-dark"><strong>Service Schedule:</strong>
                                                    <?php $services = joinTable('appointment_services', [['services', 'services.Services_ID', 'appointment_services.Services_ID']], ['appointment_services.Appointment_ID' => $result['Appointment_ID']]);
                                                    foreach ($services as $row) :
                                                        echo $row['Services_name'] . ', ';
                                                    endforeach ?>
                                                </p>
                                                <p class="text-dark"><strong>Patient Role:</strong><?= $result['patientRole'] ?></p>
                                                <p class="text-dark"><strong>Appointment Status:</strong><?php echo $result['Appointment_status'] == 0 ? "Pending" : ($result['Appointment_status'] == 1 ? "Accepted" : ($result['Appointment_status'] == 2 ? "Cancelled" : ($result['Appointment_status'] == 4 ? "Done" : "Not Arrived"))) ?></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
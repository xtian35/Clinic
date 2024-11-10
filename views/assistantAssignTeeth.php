<?php require_once('assistantHeader.php'); ?>

<?php $user = first('patient', ['Patient_ID' => $_GET['patient_id']]); ?>
<div class="col-lg-12 grid-margin stretch-card mb-4">
    <div class="card px-2 pb-2">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title m-0"><?= $user['patientFname'] . ' ' . $user['patientLname'] ?> Appointment</h4>
                <div class="col-md-2">
                    <input class="form-control bg-transparent border-0 d-none" readonly value="<?php echo date('Y m d'); ?>">
                    <input class="form-control bg-transparent border-0" disabled value="<?php echo date('M d, Y'); ?>">
                </div>
            </div>
            <div class="row mx-auto mt-3">
                <h5 class="px-0"><strong>Service:</strong>
                    <?php $services = joinTable('appointment_services', [['services', 'services.Services_ID', 'appointment_services.Services_ID']], ['appointment_services.Appointment_ID' =>  $_GET['appointment_id']]);
                    foreach ($services as $row) :
                        echo $row['Services_name'] . ', ';
                    endforeach ?>
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow border" style="height: 100%;">
                    <div class="card-body">
                        <form method="post" action="../actions/appointmentResults.php">
                            <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>">
                            <input type="hidden" name="appointment_id" value="<?php echo $_GET['appointment_id']; ?>">
                            <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>">
                            <h6 class="m-0">Patient's Details</h6>

                            <div class="form-group mt-4">
                                <label>Patient Name:</label>
                                <input class="form-control" disabled value="<?= $user['patientFname'] . ' ' . $user['patientLname'] ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label>Patient Birthdate:</label>
                                <input class="form-control" disabled value="<?php echo date('M d, Y', strtotime($user['patientBirthdate'])) ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label>Patient Address:</label>
                                <input class="form-control" disabled value="<?= $user['patientAddress'] ?>">
                            </div>
                            <?php if ($user['patientRole'] == "student") :
                                $students = firstJoin('patient_student', [['course', 'patient_student.CourseID', 'course.CourseID']], ['patient_student.Patient_ID' => $user['Patient_ID']]);
                            ?>
                                <div class="form-group mt-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Patient Course:</label>
                                            <input class="form-control" disabled value="<?= isset($students['CourseName']) ? $students['CourseName'] : '' ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Patient Year:</label>
                                            <input class="form-control" disabled value="<?= isset($students['Year']) ? $students['Year'] : ''?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Patient Section:</label>
                                            <input class="form-control" disabled value="<?= isset($students['Section']) ? $students['Section'] : '' ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group mt-2">
                                <label>Patient Treatment:</label>
                                <textarea type="text" name="treatment" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group mt-3">
                                <label>Doctor</label>
                                <select class="form-select" name="doctor">
                                    <?php $rows = findAll('doctor');
                                    foreach ($rows as $doctor) :
                                    ?>
                                        <option value="<?= $doctor['Doctor_ID'] ?>"><?= $doctor['Doctor_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <input type="checkbox" class="form-check-input me-1" name="certificate" value="1"><span style="font-size: 12px;">Certificate Issued?</span>
                            </div>
                            <div class="form-group mt-3">
                                <input type="checkbox" class="form-check-input me-1" name="checkbox" value="1" id="prescriptcheckbox"><span style="font-size: 12px;">Have Prescription?</span>
                                <textarea class="form-control" id="prescription" name="prescription" style="display: none;"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary float-end px-4"><i class="fa fa-check"></i> Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border">

                    <div class="card-body p-4 d-flex justify-content-center position-relative mx-auto" id="teeth_box" patient-id="<?php echo $_GET['patient_id']; ?>" style="height:610px">
                        <?php
                        for ($i = 1; $i <= 52; $i++) {
                            ${"teeth{$i}"} = first('tooth', ['Patient_ID' => $_GET['patient_id'], 'Tooth_Number' => $i]);
                        }
                        ?>
                        <!-- teeth1     -->

                        <div class="popup" id="popup">
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tooties" id="normal-tooth" tooth-type="0" style="display: none;">Normal</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tooties" tooth-type="1">Filled</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tooties" tooth-type="2">Cavity</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tooties " tooth-type="3" tooth-type>Extracted</button>
                            </div>
                            <div class="row mx-auto">
                                <button class="btn btn-primary btn-sm tooths-class tooties " tooth-type="4" tooth-type>Replaced</button>
                            </div>
                        </div>

                        <?php for ($i = 1; $i <= 52; $i++) { ?>
                            <?php $tooth = ${'teeth' . $i}; ?>
                            <img class="teeths teeth<?php echo $i; ?> <?php echo $tooth['Recent_change'] == 2 ? 'border-custom' : '' ?>" tooth-status="<?php echo $tooth['Tooth_Status']; ?>" tooth-id="<?php echo $tooth['Tooth_ID']; ?>" src="<?php echo $tooth['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no' . $i . '.png' : ($tooth['Tooth_Status'] == 2 ? '../public/assets/images/teeth/cavities/tooth ' . $i . '.png' : ($tooth['Tooth_Status'] == 3 ? '../public/assets/images/teeth/extracted/tooth ' . $i . '.png' : ($tooth['Tooth_Status'] == 4 ? '../public/assets/images/teeth/replaced/tooth ' . $i . '.png' : '../public/assets/images/teeth/default.png'))); ?>">
                        <?php } ?>


                        <img class="" style="height:100%; width:100%; object-fit:contain" src="../public/assets/images/toothchart.png">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<?php require_once('footer.php'); ?>
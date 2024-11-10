<?php require_once('assistantHeader.php'); ?>
<div class="row mx-auto mb-3">
    <h4>Walk In</h4>
</div>
<div class="row mx-auto">
    <div class="col-md-4">
        <div class="form-group">
            <label>Select Patient</label>
            <form method="GET" action="assistantWalkin.php">
                <select class="dropme form-control" name="user_id" id="user_id" onchange="submit()">
                    <option value="0">Select Patient Here</option>
                    <?php $patient = findAll('patient');
                    foreach ($patient as $row) :
                    ?>
                        <option <?php echo isset($_GET['user_id']) && $_GET['user_id'] == $row['Patient_ID'] ? "selected" : ""; ?> value="<?= $row['Patient_ID'] ?>"><?= $row['patientFname'] . ' ' . $row['patientLname'] ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>
</div>
<div class="row mx-auto">
    <div class="col-lg-12 grid-margin stretch-card mb-4">
        <div class="card px-2 pb-2">
            <div class="card-body">
                <?php if (isset($_GET['user_id']) && $_GET['user_id'] != 0) :
                    $checkExistingTeeth = first('tooth', ['Patient_ID' => $_GET['user_id']]);
                    if (!$checkExistingTeeth) {
                        for ($tooth_number = 1; $tooth_number <= 52; $tooth_number++) {
                            // create a new record for the tooth
                            $tooth_record = [
                                'Patient_ID' => $_GET['user_id'],
                                'Tooth_Number' => $tooth_number,
                                'Tooth_Status' => 0,
                                'Recent_change' => 0
                            ];
                            $save = save('tooth', $tooth_record);
                        }
                        if ($save) {
                            echo '<script>setTimeout(function() { window.location.href = "assistantWalkin.php?user_id=' . $_GET['user_id'] . '"; }, 1000);</script>';
                        }
                    } else {
                        $user = first('patient', ['Patient_ID' => $_GET['user_id']]); ?>

                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title m-0"><?= $user['patientFname'] . ' ' . $user['patientLname'] ?> Appointment</h4>
                            <div class="col-md-2">
                                <input class="form-control bg-transparent border-0 d-none" readonly value="<?php echo date('Y m d'); ?>">
                                <input class="form-control bg-transparent border-0" disabled value="<?php echo date('M d, Y'); ?>">
                            </div>
                        </div>
                        <div class="row mx-auto mt-3">
                        </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border" style="height: 100%;">
                        <div class="card-body">
                            <form method="post" action="../actions/appointmentWalkin.php">
                                <input type="hidden" name="patient_id" value="<?php echo $_GET['user_id']; ?>">
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
                                                <input class="form-control" disabled value="<?= isset($students['CourseName']) ? $students['CourseName'] : ""?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Patient Year:</label>
                                                <input class="form-control" disabled value="<?= isset($students['Year']) ?  $students['Year'] : ''?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Patient Section:</label>
                                                <input class="form-control" disabled value="<?= isset($students['Section']) ? $students['Section'] : ''?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group mt-2">
                                    <label>Patient Treatment:</label>
                                    <textarea type="text" name="treatment" id="treatment" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Doctor</label>
                                    <select class="form-select" name="doctor" id="doctor">
                                        <?php $rows = findAll('doctor');
                                        foreach ($rows as $doctor) :
                                        ?>
                                            <option value="<?= $doctor['Doctor_ID'] ?>"><?= $doctor['Doctor_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="checkbox" class="form-check-input me-1" id="certificate" name="certificate" value="1"><span style="font-size: 12px;">Certificate Issued?</span>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="checkbox" class="form-check-input me-1" name="checkbox" value="1" id="prescriptcheckbox"><span style="font-size: 12px;">Have Prescription?</span>
                                    <textarea class="form-control" id="prescription" name="prescription" id="prescription" style="display: none;"></textarea>
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
                        <div class="card-body p-4 d-flex justify-content-center position-relative mx-auto" id="teeth_box" patient-id="<?php echo $_GET['user_id']; ?>" style="height:610px">
                            <div id="refresh">
                                <?php
                                for ($i = 1; $i <= 52; $i++) {
                                    ${"teeth{$i}"} = first('tooth', ['Patient_ID' => $_GET['user_id'], 'Tooth_Number' => $i]);
                                }
                                ?>
                                <!-- teeth1     -->

                                <div class="popup" id="popup">
                                    <div class="row mx-auto mb-1">
                                        <button class="btn btn-primary btn-sm tooths-class tootie" id="normal-tooth" tooth-type="0" patient-id="<?php echo $_GET['user_id'] ?>" style="display: none;">Normal</button>
                                    </div>
                                    <div class="row mx-auto mb-1">
                                        <button class="btn btn-primary btn-sm tooths-class tootie" tooth-type="1" patient-id="<?php echo $_GET['user_id'] ?>">Filled</button>
                                    </div>
                                    <div class="row mx-auto mb-1">
                                        <button class="btn btn-primary btn-sm tooths-class tootie" tooth-type="2" patient-id="<?php echo $_GET['user_id'] ?>">Cavity</button>
                                    </div>
                                    <div class="row mx-auto mb-1">
                                        <button class="btn btn-primary btn-sm tooths-class tootie " tooth-type="3" patient-id="<?php echo $_GET['user_id'] ?>">Extracted</button>
                                    </div>
                                    <div class="row mx-auto">
                                        <button class="btn btn-primary btn-sm tooths-class tootie " tooth-type="4" patient-id="<?php echo $_GET['user_id'] ?>">Replaced</button>
                                    </div>

                                </div>

                                <?php for ($i = 1; $i <= 52; $i++) { ?>
                                    <?php $tooth = ${'teeth' . $i}; ?>
                                    <img class="teth teeth<?php echo $i; ?> <?php echo $tooth['Recent_change'] == 2 ? 'border-custom' : '' ?>" tooth-status="<?php echo $tooth['Tooth_Status']; ?>" tooth-id="<?php echo $tooth['Tooth_ID']; ?>" src="<?php echo $tooth['Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no' . $i . '.png' : ($tooth['Tooth_Status'] == 2 ? '../public/assets/images/teeth/cavities/tooth ' . $i . '.png' : ($tooth['Tooth_Status'] == 3 ? '../public/assets/images/teeth/extracted/tooth ' . $i . '.png' : ($tooth['Tooth_Status'] == 4 ? '../public/assets/images/teeth/replaced/tooth ' . $i . '.png' : '../public/assets/images/teeth/default.png'))); ?>">
                                <?php } ?>


                                <img class="" style="height:100%; width:100%; object-fit:contain" src="../public/assets/images/toothchart.png">
                            </div>
                        </div>
                    </div>
                </div>


        <?php }
                endif;
        ?>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
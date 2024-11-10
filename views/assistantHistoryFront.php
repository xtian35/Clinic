<?php require_once('assistantHeader.php'); ?>

<?php $user = first('patient', ['Patient_ID' => $_GET['patient_id']]); ?>
<?php $appoint_result = firstJoin('appointmentresult', [['appointment', 'appointment.Appointment_ID', 'appointmentresult.Appointment_ID']], ['appointment.Patient_ID' => $_GET['patient_id']], ['appointment.Appointment_ID' => "DESC"]); ?>
<?php $appoint_prescript = firstJoin('appointmentresult', [['appointment', 'appointment.Appointment_ID', 'appointmentresult.Appointment_ID'], ['prescription', 'prescription.Appointment_ID', 'appointment.Appointment_ID']], ['appointment.Patient_ID' => $_GET['patient_id']], ['appointment.Appointment_ID' => "DESC"]); ?>

<div class="col-lg-12 grid-margin stretch-card mb-4">
    <div class="card px-2 pb-2">
        <div class="card-body">
            <div class="row mx-auto mt-3">
                <div class="">
                    <a href="assistantHistoryDetails.php?patient_ID=<?= $_GET['patient_id'] ?>&from=<?php echo date('Y-m-d'); ?>&to=<?php echo date('Y-m-d', strtotime('+7 days')); ?>" class=" btn float-end btn-primary mb-3"><i class="fa fa-history"></i> History</a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title m-0"><?= $user['patientFname'] . ' ' . $user['patientLname'] ?> Latest History</h4>
                    <div class="col-md-2">
                        <input class="form-control bg-transparent border-0" readonly value="<?php echo date('M d, Y', strtotime($appoint_result['Appointment_Result_Date'])) ?>">
                    </div>
                </div>
            </div>
            <div class="row mx-auto mt-1">
                <h5>Service:
                    <?php $services = joinTable('appointment_services', [['services', 'services.Services_ID', 'appointment_services.Services_ID']], ['appointment_services.Appointment_ID' => $appoint_result['Appointment_ID']]);
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
                        <input type="hidden" name="patient_id" value="<?php echo $_GET['patient_id']; ?>">
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
                                        <input class="form-control" disabled value="<?= $students['CourseName'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Patient Year:</label>
                                        <input class="form-control" disabled value="<?= $students['Year'] ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Patient Section:</label>
                                        <input class="form-control" disabled value="<?= $students['Section'] ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group mt-2">
                            <label>Patient Treatment:</label>
                            <textarea type="text" class="form-control" readonly rows="5"><?= $appoint_result['Treatment'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <h6><strong><?= $appoint_result['Certificate_Issued'] ?> Issued</strong></h6>
                        </div>
                        <?php if (!empty($appoint_prescript)) : ?>
                            <div class="form-group">
                                <label>Prescription:</label>
                                <textarea type="text" class="form-control" rows="5" readonly><?php echo $appoint_prescript['Prescription_Description'] ?></textarea>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow border">

                    <div class="card-body p-4 d-flex justify-content-center position-relative mx-auto" id="teeth_box" patient-id="<?php echo $_GET['patient_id']; ?>" style="height:610px">
                        <?php
                        for ($i = 1; $i <= 52; $i++) {
                            ${"teeth{$i}"} = firstJoin('tooth', [['appointmenttoothresult', 'tooth.Tooth_ID', 'appointmenttoothresult.Tooth_ID'], ['appointment', 'appointment.Appointment_ID', 'appointmenttoothresult.Appointment_ID']], ['tooth.Patient_ID' => $_GET['patient_id'], 'tooth.Tooth_Number' => $i], ['appointment.Patient_ID' => 'DESC']);
                        }
                        ?>

                        <div class="popup" id="popup">
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tootie" id="normal-tooth" tooth-type="0" style="display: none;" appointment-id="<?php echo $appoint_result['Appointment_ID'] ?>" patient-id="<?php echo $_GET['patient_id'] ?>">Normal</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tootie" tooth-type="1" appointment-id="<?php echo $appoint_result['Appointment_ID'] ?>" patient-id="<?php echo $_GET['patient_id'] ?>">Filled</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tootie" tooth-type="2" appointment-id="<?php echo $appoint_result['Appointment_ID'] ?>" patient-id="<?php echo $_GET['patient_id'] ?>">Cavity</button>
                            </div>
                            <div class="row mx-auto mb-1">
                                <button class="btn btn-primary btn-sm tooths-class tootie " tooth-type="3" appointment-id="<?php echo $appoint_result['Appointment_ID'] ?>" patient-id="<?php echo $_GET['patient_id'] ?>">Extracted</button>
                            </div>
                            <div class="row mx-auto">
                                <button class="btn btn-primary btn-sm tooths-class tootie " tooth-type="4" appointment-id="<?php echo $appoint_result['Appointment_ID'] ?>" patient-id="<?php echo $_GET['patient_id'] ?>">Replaced</button>
                            </div>
                        </div>

                        <?php
                        for ($i = 1; $i <= 52; $i++) {
                            $tooth = "teeth" . $i;
                            $tooth_data = ${'teeth' . $i};
                            echo '<img class="teet ' . $tooth . ($tooth_data['Recent_change'] == 1 ? ' border-custom' : '') . '" tooth-status="' . $tooth_data['Appointment_Tooth_Status'] . '" tooth-id="' . $tooth_data['AppointmentToothResult_ID'] . '" src="';
                            echo $tooth_data['Appointment_Tooth_Status'] == 1 ? '../public/assets/images/teeth/filled/tooth no' . $i . '.png' : ($tooth_data['Appointment_Tooth_Status'] == 2 ? '../public/assets/images/teeth/cavities/tooth ' . $i . '.png' : ($tooth_data['Appointment_Tooth_Status'] == 3 ? '../public/assets/images/teeth/extracted/tooth ' . $i . '.png' : ($tooth_data['Appointment_Tooth_Status'] == 4 ? '../public/assets/images/teeth/replaced/tooth ' . $i . '.png' : '../public/assets/images/teeth/default.png')));
                            echo '">';
                        }
                        ?>


                        <img style="height:100%; width:100%; object-fit:contain" src="../public/assets/images/toothchart.png">
                    </div>
                    <img style="height:40%; width:40%; object-fit:contain" src="../public/assets/images/legend.png">
                </div>
            </div>
            <!-- <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary float-end px-4"><i class="fa fa-check"></i> Update</button>
            </div> -->
        </div>
    </div>
</div>
</div>
<?php require_once('footer.php'); ?>
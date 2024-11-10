<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">History</h4>
            </div>

            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>No. Appointments</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $row = joinTableGroup('appointment', [['patient', 'patient.patient_ID', 'appointment.patient_ID']], "patient.Patient_ID") ?>
                        <?php foreach ($row as $result) : ?>
                            <tr>
                                <td><?= $result['patientFname'] . ' ' . $result['patientLname'] ?></td>
                                <?php $result1 = countResult('appointment', ['Patient_ID' => $result['Patient_ID']]); ?>
                                <td><?= $result1; ?></td>
                                <td><a class="btn btn-primary btn-sm px-4" href="assistantHistoryFront.php?patient_id=<?= $result['Patient_ID'] ?>"><i class="fa fa-eye"></i> View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
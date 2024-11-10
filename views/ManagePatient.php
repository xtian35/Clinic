<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Patient Accounts</h4>
                <a href="RegisterPatient.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Add Patient</a>
            </div>

            <p class="card-description">
                Add class <code>.table</code>
            </p>
            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th class=""></th>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Contact</th>
                            <th>Patient Address</th>
                            <th>Patient Type</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $patient = findAll('patient', ['Patient_ID' => 'DESC']);
                        $no = 1;
                        foreach ($patient as $row) :
                        ?>
                            <tr>
                                <td class=""><?php echo $no;
                                                $no++; ?></td>
                                <td class="px-0"><?= $row['patientFname'] . ' ' . $row['patientLname'] ?></td>
                                <td class="px-0"><?= $row['patientEmail'] ?></td>
                                <td class="px-0"><?= $row['patientContact'] ?></td>
                                <td class="px-0"><?= $row['patientAddress'] ?></td>
                                <td class="px-0"><?= $row['patientRole'] ?></td>
                                <td></td>
                                <?php if ($row['patientIDpicture'] == "Added") { ?>
                                    <td>Added</td>
                                <?php } else { ?>
                                    <td class="px-0"><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewID<?= $row['Patient_ID'] ?>">View ID</button></td>
                                <?php } ?>
                                <td class="px-0">
                                    <div class="row mx-auto">
                                        <a href="../actions/activatePatient.php?patient_ID=<?= $row['Patient_ID'] ?>&status=<?= $row['patientStatus'] ?>" class="btn btn-success px-1"><?php if ($row['patientStatus'] == 0) {
                                                                                                                                                                                            echo 'Activate';
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo 'Deactivate';
                                                                                                                                                                                        } ?></a>
                                    </div>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="viewID<?= $row['Patient_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Patient ID</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mx-auto">
                                                <div class="col-md-9 mx-auto border rounded mt-2" style="height:380px">
                                                    <img src="<?= $row['patientIDpicture'] ?>" alt="" class="img-fluid img-prev">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- endmodal -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
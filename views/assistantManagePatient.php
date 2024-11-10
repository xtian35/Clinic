<?php require_once('assistantheader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Patient Accounts</h4>
            </div>

            <p class="card-description">
                Add class <code>.table</code>
            </p>
            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Email</th>
                            <th>Patient Contact</th>
                            <th>Patient Address</th>
                            <th>Patient Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $patient = findAll('patient');
                        foreach ($patient as $row) :
                        ?>
                            <tr>
                                <td class="px-0"><?= $row['patientFname'] . ' ' . $row['patientLname'] ?></td>
                                <td class="px-0"><?= $row['patientEmail'] ?></td>
                                <td class="px-0"><?= $row['patientContact'] ?></td>
                                <td class="px-0"><?= $row['patientAddress'] ?></td>
                                <td class="px-0"><?= $row['patientRole'] ?></td>
                                <td class="px-0"><a class="btn btn-primary" href="assistantUpdatepatientprofile.php">Update</a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
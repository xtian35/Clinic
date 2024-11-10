<?php require_once('assistantHeader.php'); ?>
<div class="col-md-9 mx-auto mt-1 shadow border rounded g-0" style="height:400px; overflow-y:hidden">
    <div class="row md mx-auto g-0 rounded">
        <div class="col-md-3 mx-auto mt-3">
        </div>
        <div class="col-md-12 p-5 ">
            <form method="post" action="../actions/assistantUpdatepatientprofile.php">
                <?php
              if  ($patient = first('patient', ['Patient_ID']));
                ?>
                <div class="row mx-auto mb-1 p-0">
                    <div class="col-6">
                        <label>Firstname</label>
                        <div class="form-group">
                            <input type="text" name="firstname" class="form-control" value="<?= $patient['patientFname'] ?>">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Lastname</label>
                        <div class="form-group">
                            <input type="text" name="lastname" class="form-control" value="<?= $patient['patientLname'] ?>">
                        </div>
                    </div>

                    <div class="row mx-auto mb-1 p-0">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control" value="<?= $patient['patientContact'] ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?= $patient['patientAddress'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-8 mx-auto p-2 mb-2">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control text-center" value="<?= $patient['patientEmail'] ?>">
                    </div>

                    <div class="row mx-auto mt-2 p-0">
                        <div class="col-6 text-center">
                            <div class="form-group">
                                <button class="col-md-5 btn btn-primary" type="submit" name="updateProfile">Update</button>
                            </div>
                        </div>

                        <div class="col-6 text-center">
                            <div class="form-group">
                                <a class="col-md-5 btn btn-primary" href="assistantManagePatient.php" name="cancel">Cancel</a>
                            </div>
                        </div>
                    </div>


            </form>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
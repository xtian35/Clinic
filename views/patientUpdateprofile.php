<?php require_once('patientHeader.php'); ?>
<div class="col-md-9 mx-auto mt-1 shadow border rounded g-0" style="height:620px; overflow-y:hidden">
    <div class="row md mx-auto g-0 rounded">
        <div class="col-md-3 mx-auto mt-3">
            <div class="modal fade " id="profile" tabindex="-1" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog mt-4">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title modal-title-custom fs-5 d-flex ms-2 align-items-center" id="">Upload Profile Picture
                            </h1>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="" name="" id="" style="display: none;">
                            <form method="post" enctype="multipart/form-data" action="../actions/patientProfilepicture.php ">
                                <div class="form-group px-5">
                                    <div id="previewImage" class="col-md-12 mx-auto border shadow mt-2 img-preview"></div>
                                    <input type="file" class="form-control mt-3" accept=".jpg, .jpeg, .png, .gif" name="patientProfilepicture" id="imageInput" placeholder="Upload Profile Picture">
                                    <input type="hidden" name="patient_ID" value="<?php echo $_SESSION['patientProfilepicture'] ?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" name="profile" type="submit">Upload</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <img data-bs-toggle="modal" data-bs-target="#profile" class="rounded-circle img-fluid" src="<?php if (isset($_SESSION['patientProfilepicture'])) {
                                                                                                            echo $_SESSION['patientProfilepicture'];
                                                                                                        } else {
                                                                                                            echo '../public/assets/images/file-icons/default_profile.png';
                                                                                                        } ?>" alt="Profile image" />
        </div>
        <div class="col-md-12 p-2 ">
            <form method="post" action="../actions/patientupdateProfile.php">
                <?php
                if ($patient = first('patient', ['Patient_ID' => $_SESSION['Patient_ID']]));
                ?>
                <div class="row mx-auto mb-1 p-0">
                    <div class="col-6">
                        <label>Firstname</label>
                        <div class="form-group">
                            <input type="text" name="firstname" class="form-control" value="<?= $patient['patientFname'] ?>">
                        </div>
                    </div>
                    <div class="col-6 ">
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

                    <div class="row mx-auto mb-1 p-0">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?= $patient['patientEmail'] ?>">
                            </div>
                        </div>

                        <div class="col-6 text-center mt-4 p-1">
                            <div class="form-group">
                                <a href="patientUpdatePassword.php" class="col-md-6 btn btn-light ">Change Password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="col-md-5 btn btn-primary" type="submit" name="updatepatientProfile">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
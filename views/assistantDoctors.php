<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h4 class="card-title">Doctors</h4>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add_doctor"><i class="fa fa-user-plus"></i> Add Doctor</a>
            </div>
            <table class="table table_striped" id="tables">
                <thead>
                    <tr>
                        <th>Doctor`s Name</th>
                        <th>Doctor`s Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $doctor = findAll('doctor');
                    foreach ($doctor as $row) :
                    ?>
                        <tr>
                            <td><?= $row['Doctor_name'] ?></td>
                            <td><?= $row['Doctor_title'] ?></td>
                            <td><button class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#edit_doctor<?= $row['Doctor_ID'] ?>"><i class="fa fa-edit"></i> Update</button></td>
                            <form method="post" action="../actions/adminManageDoctor.php?activate">
                                <input type="hidden" value="<?= $row['Doctor_ID'] ?>" name="Doctor_ID">
                                <input type="hidden" value="<?= $row['Doctor_status'] ?>" name="Doctor_status">
                                <td><button type="submit" name="activation" class="btn <?php echo $row['Doctor_status'] == 0 ? "btn-success" : "btn-danger" ?> btn-sm"><i class="fa fa-power-off"></i><?php echo $row['Doctor_status'] == 0 ? "Activate" : "Deactivate" ?></button></td>
                            </form>
                        </tr>
                        <div class="modal fade" id="edit_doctor<?= $row['Doctor_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Doctor</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="../actions/ManageDoctor.php">
                                        <div class="modal-body">
                                            <div class="form-group mb-2">
                                                <label>Doctor`s Name</label>
                                                <input class="form-control" value="<?= $row['Doctor_name'] ?>" required name="name" placeholder="Doctor`s Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Doctor`s Title</label>
                                                <input class="form-control" value="<?= $row['Doctor_title'] ?>" required name="title" placeholder="Doctor`s Title">
                                            </div>
                                            <input type="hidden" value="<?= $row['Doctor_ID'] ?>" name="Doctor_ID">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="updatedoctor" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Modal -->
            <div class="modal fade" id="add_doctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Doctor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="../actions/ManageDoctor.php">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label>Doctor`s Name</label>
                                    <input class="form-control" name="name" placeholder="Doctor`s Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Doctor`s Title</label>
                                    <input class="form-control" name="title" placeholder="Doctor`s Title" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="adddoctor" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal end -->
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
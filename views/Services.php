<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Services</h4>
                <a data-bs-toggle="modal" data-bs-target="#services" class="btn btn-primary btn-sm"><i class="fa fa-wrench"></i> Add Services</a>
            </div>

            <p class="card-description">
                Add <code>.Services</code>
            </p>
            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Services</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $services = findAll('services');
                        foreach ($services as $row) :
                        ?>
                            <tr>
                                <td><?= $row['Services_name'] ?></td>
                                <td><a href="../actions/manageServices.php?delete&services_id=<?= $row['Services_ID'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#service<?= $row['Services_ID'] ?>"><i class="fa fa-edit"></i> Update</button></td>

                            </tr>
                            <div class="modal fade" id="service<?= $row['Services_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Services</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="../actions/manageServices.php">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Service</label>
                                                    <input type="hidden" name="service_id" value="<?= $row['Services_ID'] ?>">
                                                    <input type="text" name="services" value="<?= $row['Services_name'] ?>"class="form-control" placeholder="Add Services">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="updateservices" class="btn btn-primary">Add Services</button>
                                            </div>
                                        </form>

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

<!-- Modal -->
<div class="modal fade" id="services" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Services</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="../actions/manageServices.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Service</label>
                        <input type="text" name="services" class="form-control" placeholder="Add Services">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addservices" class="btn btn-primary">Add Services</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
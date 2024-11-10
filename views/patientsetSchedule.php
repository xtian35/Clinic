<?php require_once('patientHeader.php'); ?>

<div id='calendarsetSched'></div>
<!-- Modal for time -->
<div class="modal fade" id="timeSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title modal-title-custom fs-5 d-flex ms-2 align-items-center" id="exampleModalLabel">Available time in <p id="dAte_time" class="m-0 ms-1 date_selected"> </p>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="date" name="DateSchedule" id="DateSchedule" style="display: none;">
                <div class="row mx-auto" id="Time_disable">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <!-- <button class="btn btn-primary" id="setSched">Set Schedule</button> -->
            </div>
        </div>
    </div>
</div>
<!-- Modal time end -->

<div class="modal fade" id="Services" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title modal-title-custom fs-5 d-flex ms-2 align-items-center" id="exampleModalLabel">Services</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mx-auto">
                    <?php $services = findAll('services');
                    foreach ($services as $row) : ?>
                        <div class="col-md-6">
                            <label class="btn btn-sm btn-primary mb-3 text-start d-flex justify-content-start align-items-center">
                                <input type="checkbox" class="form-check-input m-0 mx-1" name="services[]" value="<?= $row['Services_ID'] ?>" id="checkbox<?= $row['Services_ID'] ?>">
                                <?= $row['Services_name'] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="button" id="setSched">Set Schedule</button>
            </div>
        </div>
    </div>
</div>
<?php require_once('calendarFooter.php'); ?>
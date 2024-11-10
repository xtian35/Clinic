<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title">Assitant Accounts</h4>
                <a href="RegisterAssistant.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus"></i> Add Assistant</a>
            </div>
            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Assistant Name</th>
                            <th>Assistant Email</th>
                            <th>Assistant Contact</th>
                            <th>Assistant Address</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $assistant = findAll('assistant');
                        foreach ($assistant as $row) :
                        ?>
                            <tr>
                                <td><?= $row['assistantFname'] . ' ' . $row['assistantLname'] ?></td>
                                <td><?= $row['assistantEmail'] ?></td>
                                <td><?= $row['assistantContact'] ?></td>
                                <td><?= $row['assistantAddress'] ?></td>
                                <td></td>
                                <td class="px-0">
                                    <div class="row mx-auto">
                                        <a href="../actions/activateAssistant.php?assistant_ID=<?= $row['Assistant_ID'] ?>&status=<?= $row['assistantStatus'] ?>" class="btn btn-success px-1"><?php if ($row['assistantStatus'] == 0) {
                                                                                                                                                                                            echo 'Activate';
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo 'Deactivate';
                                                                                                                                                              } ?></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
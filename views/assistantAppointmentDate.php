<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="card-title">Appointments<?php echo isset($_GET['filter']) && $_GET['filter'] == date('Y-m-d') ? " Today" : (isset($_GET['filter']) ? ' on ' . date('M d, Y', strtotime($_GET['filter'])) : ' Today'); ?></h4>
                <form method="get" action="assistantAppointmentDate.php" id="filter-form">
                    <div class="col-md-12 p-0">
                        <div class="row mx-auto g-0">
                            <div class="col-md-6 pe-1">
                                <label class="label-custom">Date From:</label>
                                <input class="form-control" type="date" name="from" id="filter-input" value="<?php echo isset($_GET['from']) ? htmlspecialchars($_GET['from']) : ''; ?>" onchange="document.getElementById('filter-form').submit();">
                            </div>
                            <div class="col-md-6 ps-1">
                                <label class="label-custom">Date To: </label>
                                <input class="form-control" type="date" name="to" id="filter-input" value="<?php echo isset($_GET['to']) ? htmlspecialchars($_GET['to']) : ''; ?>" onchange="document.getElementById('filter-form').submit();">
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="row mx-auto mt-3">
                <table class="table table-striped mx-auto" id="tables">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>No. Appointments</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $from = $_GET['from'];
                        $to = $_GET['to'];
                        $sql = "SELECT * FROM doctor_schedule WHERE Doctor_schedule_avail >= ? AND Doctor_schedule_avail <= ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, 'ss', $from, $to);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_all(MYSQLI_ASSOC);
                        ?>
                        <?php foreach ($row as $result) : ?>
                            <tr>
                                <td><i class="fa fa-calendar"></i> <?php echo date('M d, Y', strtotime($result['Doctor_schedule_avail'])) ?></td>
                                <?php $result1 = countResult('appointment', ['Doctor_schedule_ID' => $result['Doctor_schedule_ID']], ['Appointment_status' => [0, 1]]); ?>
                                <td><?php echo $result1; ?> Appointments</td>
                                <td><a class="btn btn-primary btn-sm px-4" href="assistantAppointment.php?date=<?php echo date('Y-m-d', strtotime($result['Doctor_schedule_avail'])) ?>"><i class="fa fa-eye"></i> View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
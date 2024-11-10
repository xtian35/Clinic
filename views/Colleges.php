<?php require_once('assistantHeader.php'); ?>
<div class="row mx-auto">
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Colleges</h4>
                    <a data-bs-toggle="modal" data-bs-target="#colleges" class="btn btn-primary btn-sm"><i class="fa fa-building"></i> Add Colleges</a>
                </div>

                <p class="card-description">
                    Add <code>.Colleges</code>
                </p>
                <div class="row mx-auto mt-3">
                    <table class="table table-striped mx-auto" id="tables">
                        <thead>
                            <tr>
                                <th>Colleges</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $colleges = findAll('college');
                            foreach ($colleges as $row) :
                            ?>
                                <tr>
                                    <td><?= $row['CollegeName'] ?></td>
                                    <td><a href="../actions/manageColleges.php?delete&college_id=<?= $row['CollegeID'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                    <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#service<?= $row['CollegeID'] ?>"><i class="fa fa-edit"></i> Update</button></td>

                                </tr>
                                <div class="modal fade" id="service<?= $row['CollegeID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Colleges</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="../actions/manageColleges.php">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Service</label>
                                                        <input type="hidden" name="college_id" value="<?= $row['CollegeID'] ?>">
                                                        <input type="text" name="college" value="<?= $row['CollegeName'] ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="updatecolleges" class="btn btn-primary">Add Colleges</button>
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

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Course</h4>
                    <a data-bs-toggle="modal" data-bs-target="#courses" class="btn btn-primary btn-sm"><i class="fa fa-building"></i> Add Courses</a>
                </div>

                <p class="card-description">
                    Add <code>.Course</code>
                </p>
                <div class="row mx-auto mt-3">
                    <table class="table table-striped mx-auto" id="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>College</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $colleges = joinTable('college', [['course', 'course.CollegeID', 'college.CollegeID']]);
                            foreach ($colleges as $row) :
                            ?>
                                <tr>
                                    <td><?= $row['CourseName'] ?></td>
                                    <td><?= $row['CollegeName'] ?></td>
                                    <td><a href="../actions/manageColleges.php?deleteCourse&course_id=<?= $row['CourseID'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
                                    <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#course<?= $row['CourseID'] ?>"><i class="fa fa-edit"></i> Update</button></td>

                                </tr>
                                <div class="modal fade" id="course<?= $row['CourseID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Colleges</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="../actions/manageColleges.php">
                                                <div class="modal-body">
                                                <div class="form-group">
                                                        <label for="">College</label>
                                                        <select class="form-select" name="college_id">
                                                            <?php $colleges = findAll('college');
                                                            foreach ($colleges as $rows) :
                                                            ?>
                                                                <option value="<?= $rows['CollegeID'] ?>" <?php echo $rows['CollegeID'] == $row['CollegeID'] ? "selected" : "" ?>><?= $rows['CollegeName'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Course</label>
                                                        <input type="hidden" name="course_id" value="<?= $row['CourseID'] ?>">
                                                        <input type="text" name="course" value="<?= $row['CourseName'] ?>" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="updatecourses" class="btn btn-primary">Add Colleges</button>
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
</div>
<!-- Modal -->
<div class="modal fade" id="colleges" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Colleges</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="../actions/manageColleges.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">College</label>
                        <input type="text" name="college" class="form-control" placeholder="Add College">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addcolleges" class="btn btn-primary">Add College</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="courses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Courses</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="../actions/manageColleges.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">College</label>
                        <select class="form-select" name="college_id">
                            <?php $colleges = findAll('college');
                            foreach ($colleges as $row) :
                            ?>
                                <option value="<?= $row['CollegeID'] ?>"><?= $row['CollegeName'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Course</label>
                        <input type="text" name="course" class="form-control" placeholder="Add Course">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addcourses" class="btn btn-primary">Add Courses</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
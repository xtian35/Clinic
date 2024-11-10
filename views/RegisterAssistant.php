<?php require_once('assistantHeader.php'); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <form action="../actions/Addassistant.php" method="post">
            <div class="card-body">
                <h4 class="card-title">Register Assitant </h4>
                <div class="row mx-auto">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo getValue('fname'); ?>" placeholder="Firstname">
                            <?php if (showError('firstname')) :
                                echo showError('firstname');
                            endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Lastname</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo getValue('lname'); ?>" placeholder="Lastname">
                            <?php if (showError('lastname')) :
                                echo showError('lastname');
                            endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact</label>
                            <div class="d-flex align-items-center position-relative">
                                <p class="position-absolute m-0 ms-1 pe-1 border-end">+63</p>
                                <input type="text" class="form-control" name="contact" style="text-indent: 14px;" value="<?php echo getValue('contact'); ?>" placeholder="9354758387">
                            </div>
                            <?php if (showError('contact')) :
                                echo showError('contact');
                            endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo getValue('address'); ?>" placeholder="Address">
                            <?php if (showError('address')) :
                                echo showError('address');
                            endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo getValue('email'); ?>" placeholder="Email">
                            <?php if (showError('email')) :
                                echo showError('email');
                            endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="password" value="<?php echo getValue('password'); ?>" placeholder="Password">
                            <?php if (showError('password')) :
                                echo showError('password');
                            endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="text" class="form-control" name="confirmpassword" value="<?php echo getValue('confirmpassword'); ?>" placeholder="Confirm Password">
                            <?php if (showError('confirmpassword')) :
                                echo showError('confirmpassword');
                            endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row mx-auto">
                    <div class="form-group">
                        <button type="submit" name="addassistant" class="btn btn-primary btn-sm px-4"><i class="fa fa-edit"></i> Register</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?php require_once('footer.php'); ?>
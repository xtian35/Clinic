<?php require_once('assistantHeader.php'); ?>
<div class="col-md-8 mx-auto mt-1 shadow border rounded g-0" style="height:200px; overflow-y:hidden">
    <form method="post" action="../actions/assistantupdateProfile.php">
        <?php
        if ($assistant = first('assistant', ['Assistant_ID' => $_SESSION['Assistant_ID']]));
        ?>
        <div class="row mx-2 mt-5">
            <div class="col-6">
                <div class="form-group ">
                    <label>New Password</label>
                    <input class="form-control" name="password" value="<?php echo getValue('password'); ?>" placeholder="Please enter your email">
                    <?php if (showError('password')) :
                        echo showError('password');
                    endif; ?>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input class="form-control" name="confirmpassword" value="<?php echo getValue('confirmpassword'); ?>" placeholder="Please enter your password">
                    <?php if (showError('confirmpassword')) :
                        echo showError('confirmpassword');
                    endif; ?>
                </div>
            </div>
        </div>

        <div class="row mx-2">
            <div class="col-6">
                <div class="text-center">
                    <button class=" btn btn-primary " type="submit" name="updatePassword">Update</button>
                </div>
            </div>

            <div class="col-6">
                <div class="text-center">
                    <a class=" btn btn-primary " href="assistantUpdateprofile.php" name="cancel">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once('footer.php'); ?>
<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php SessionHelper::flash('register_success'); ?>
            <h2>Login</h2>
            <p>Please fill in your credentials to log in</p>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input class="form-control form-control-lg <?php echo (!empty($data['email_err']))
                        ? 'is-invalid' : '' ?>" type="email" name="email" value="<?php echo $data['email']; ?>"
                           id="email">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input class="form-control form-control-lg <?php echo (!empty($data['password_err']))
                        ? 'is-invalid' : '' ?>" type="password" name="password" value="<?php echo $data['password']; ?>"
                           id="password">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control btn-success btn-block" type="submit" value="Log in">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block">
                            No account? Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
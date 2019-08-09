<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="login" class="col-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="row m-0">
                <div class="col-md-5 img p-0">

                </div>
                <div class="col-md-7 pt-2 pb-2 text-center">
                    <p class="m-0 mt-3">welcome to</p>
                    <h2>AZURE</h2>
                    <p>Please Login</p>
                    <form action="<?php echo URLROOT; ?>/users/login" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email"  autofocus="autofocus">
                            <small class="text-danger"><?= $data['email_err']; ?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <small class="text-danger"><?= $data['password_err']; ?></small>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary mb-2">Login</button>
                        <span class="text-dark mr-2">No Account?</span><a href="<?php echo URLROOT; ?>/users/register">Create one here</a>
                    </form>
                    <?php flash('register_success'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
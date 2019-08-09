<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="register" class="col-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="row m-0">
                <div class="col-md-5 img p-0">

                </div>
                <div class="col-md-7 pt-4 pb-4 text-center">

                    <p class="m-0">welcome to</p>
                    <h2>AZURE</h2>
                    <p>Please Register</p>
                    <form action="<?php echo URLROOT; ?>/users/register" method="post">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="<?= $data['name']; ?>" autofocus="autofocus">
                                <small class="text-danger"><?= $data['name_err']; ?></small>
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" value="<?= $data['email']; ?>">
                                <small class="text-danger"><?= $data['email_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?= $data['password']; ?>">
                                <small class="text-danger"><?= $data['password_err']; ?></small>
                            </div>
                            <div class="col">
                                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" value="<?= $data['confirm_password']; ?>">
                                <small class="text-danger"><?= $data['confirm_password_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country" value="<?= $data['country']; ?>">
                            <small class="text-danger"><?= $data['country_err']; ?></small>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary btn-custom mb-2">Register</button>
                        <a href="<?php echo URLROOT; ?>/users/login">Back to login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
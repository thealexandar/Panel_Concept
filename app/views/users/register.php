<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="register" class="col-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="row m-0">
                <div class="col-md-5 img p-0">

                </div>
                <div class="col-md-7 pt-4 pb-4">
                    <form action="<?php echo URLROOT; ?>/users/register" method="post">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                            </div>
                            <div class="col">
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="col">
                                <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="country" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country">
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
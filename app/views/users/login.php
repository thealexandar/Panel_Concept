<?php require APPROOT . '/views/inc/header.php'; ?>

<div id="login" class="col-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="row m-0">
                <div class="col-md-5 img p-0">

                </div>
                <div class="col-md-7 pt-2 pb-2">
                    <form action="<?php echo URLROOT; ?>/users/login" method="post">
                        <div class="form-group">
                            <input type="email" name="name" class="form-control" id="exampleInputPassword1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary mb-2">Submit</button>
                        <span class="text-dark mr-2">No Account?</span><a href="<?php echo URLROOT; ?>/users/register">Create one here</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
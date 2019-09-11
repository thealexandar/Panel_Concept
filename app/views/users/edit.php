<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>


<div id="main" class="col-md-10 offset-md-2">
    <div class="row bg-light d-sm-none navbar  mb-4">
        <div class="logo col-6">Dashboard</div>
        <div class="col-6 menu text-right">
            <div class="btn-menu">
                <i class="fas fa-bars"></i>
            </div>
            <?php
                // print_r($data);
                // die();
            ?>
        </div>
    </div>

    <div class="container">
        <form method="post" action="<?php echo URLROOT; ?>/users/edit/<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required="required" value="<?php echo $data['name']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email" required="required" value="<?php echo $data['email']; ?>">
                <span><?php echo $data['adduser']['email_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required="required" value="<?php echo $data['password']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Country</label>
                <input type="text" name="country" class="form-control" id="exampleInputPassword1" placeholder="Enter Country" required="required" value="<?php echo $data['country']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Role</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    <option value="user">User</option>
                    <option value="tester">Tester</option>
                    <option value="admin">Admin</option>
                    <option value="headadmin">Head Admin</option>
                </select>
            </div>
            <button type="submit" name="add" class="btn custom-btn">Add</button>
        </form>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email" required="required">
                                <span><?php echo $data['adduser']['email_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="Password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <input type="text" name="country" class="form-control" id="exampleInputPassword1" placeholder="Enter Country" required="required">
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
                </div>
            </div>
            <div class="col-12 text-right"><a href="#" class="btn custom-btn mb-3 shadow" data-toggle="modal" data-target="#exampleModalCenter">+ Add New</a></div>
            <div class="row" id="users">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data['pagination']['user_data'] as $user): ?>
                                        <tr>
                                            <td><?= $user->id; ?></td>
                                            <td><?= $user->name; ?></td>
                                            <td><?= $user->email; ?></td>
                                            <td><?= $user->country; ?></td>
                                            <td><span class="status-<?= $user->role; ?>"><?= $user->role; ?></span></td>
                                            <td><?= $user->created_at; ?></td>
                                            <td>
                                                <form action="<?php echo URLROOT; ?>/users/delete/<?php echo $user->id; ?>" method="post">
                                                    <input type="submit" value="D">
                                                </form>
                                                <a href="#"></a>
                                                <a href="<?php echo URLROOT;?>/users/show/<?php echo $user->id; ?>"><i class="fas fa-pen p-1"></i></a>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2 pl-0 pr-0 clearfix" id="pagination">
                <nav aria-label="..." class="float-left">
                    <ul class="pagination">
                        <?php if($data['pagination']['page_no'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page_no=1">First</a>
                            </li>
                        <?php endif; ?>
                            <li class="page-item <?php if($data['pagination']['page_no'] <= 1){echo 'disabled';} ?>">
                                <a class="page-link" href="?page_no=<?php if($data['pagination']['page_no'] > 1){echo $data['pagination']['previous'];}?>">Previous</a>
                            </li>
                            <li class="page-item <?php if($data['pagination']['page_no'] >= $data['pagination']['total_no_of_pages']){echo 'disabled';} ?>">
                                <a class="page-link" href="?page_no=<?php if($data['pagination']['page_no'] < $data['pagination']['total_no_of_pages']){echo $data['pagination']['next'];}?>">Next</a>
                            </li>
                        <?php if($data['pagination']['page_no'] < $data['pagination']['total_no_of_pages']): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page_no=<?= $data['pagination']['total_no_of_pages']; ?>">Last</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="current-page float-right">
                    <p>Page <?= $data['pagination']['page_no']; ?> of <?= $data['pagination']['total_no_of_pages']; ?></p>
                </div>
            </div>
        </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>
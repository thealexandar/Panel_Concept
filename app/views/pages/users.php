<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>

        <div id="main" class="col-md-10 offset-md-2">
            <?php
                //print_r($data['pagination']);

                //die();
            ?>
            <div class="row" id="users">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
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
                                            <a href=""><i class="material-icons bg-danger text-white p-1">close</i></a>
                                            <a href=""><i class="material-icons bg-success text-white p-1">build</i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2 pl-0 pr-0 clearfix">
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
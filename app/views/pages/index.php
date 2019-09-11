<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>


        <div id="main" class="col-md-10 offset-md-2">
            <div class="row bg-light d-sm-none navbar pr-0 pl-0 mb-4">
            <div class="logo col-6">Dashboard</div>
            <div class="col-6 menu text-right">
                <div class="btn-menu">
                    <i class="fas fa-bars"></i>
                </div>

            </div>
        </div>
            <div class="row" id="top-cards">
                <div class="col-md-4 pl-3 pl-sm-0">
                    <div class="card" style="background: #654ea3; background: -webkit-linear-gradient(to bottom, #eaafc8, #654ea3); background: linear-gradient(to bottom, #eaafc8, #654ea3);">
                        <div class="card-body">
                            <div class="card-content row">
                                <div class="col-4 text-center icon">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="col-8 info text-center">
                                    <p class="mb-0">Registered Users</p>
                                    <h3><?php echo $data['userCount'][0]->registered_users; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="background: #00B4DB; background: -webkit-linear-gradient(to bottom, #0083B0, #00B4DB); background: linear-gradient(to bottom, #0083B0, #00B4DB);">
                        <div class="card-body">
                            <div class="card-content row">
                                <div class="col-4 text-center icon">
                                    <i class="material-icons">near_me</i>
                                </div>
                                <div class="col-8 text-center info">
                                    <p class="mb-0">Lorem ipsum</p>
                                    <h3>100.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-3 pr-sm-0">
                    <div class="card" style="background: #355C7D; background: -webkit-linear-gradient(to bottom, #C06C84, #6C5B7B, #355C7D); background: linear-gradient(to bottom, #C06C84, #6C5B7B, #355C7D);">
                        <div class="card-body">
                            <div class="card-content row">
                                <div class="col-4 text-center icon">
                                    <i class="material-icons">public</i>
                                </div>
                                <div class="col-8 text-center info">
                                    <p class="mb-0">Lorem ipsum</p>
                                    <h3>100.00</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="mid-charts">
                <div class="col-md-8 pl-3 pl-sm-0 users">
                    <div class="card">
                        <div class="card-body">
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pr-3 pr-sm-0 chart">
                    <div class="card">
                        <div class="card-body">
                            <div id="chartdivRoles"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="bot-users">
                <div class="col-md-6 pl-3 pl-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="d-none d-sm-block">Country</th>
                                        <th scope="col">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data['users'] as $user): ?>
                                        <tr>
                                        <th scope="row"><?= $user->id; ?></th>
                                        <td><?= $user->name; ?></td>
                                        <td class="d-none d-sm-block"><?= $user->country; ?></td>
                                        <td><span class="status-<?= $user->role;?>"><?= $user->role; ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 text-center">
                                <a href="<?= URLROOT; ?>/users/users" class="btn btn-outline-primary custom-btn-outline">View All</a>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 pr-3 pr-sm-0">
                <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>

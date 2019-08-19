<div id="sidebar" class="col-md-2 pl-0 pr-0 fixed-top sidebar sidebar-closed">
    <div class="welcome">
        <h3>Welcome</h3>
        <?php if(isset($_SESSION['user_id'])): ?>
            <h4><?php echo $_SESSION['user_name']; ?></h4>
        <?php endif; ?>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'index') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/pages/index">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'users') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/users/users">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'statistics') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/pages/statistics">Statistics</a>
        </li>
    </ul>
    <div class="logout">
        <div class="btn-logout">
            <a href="<?php echo URLROOT; ?>/users/logout" class="href"><img src="<?php echo URLROOT; ?>/public/img/icons8-logout-rounded-left-50.png" alt=""><span>Logout</span></a>

        </div>

    </div>
</div>
<div id="sidebar" class="col-md-2 bg-dark pl-0 pr-0">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'index') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/pages/index">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'users') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/pages/users">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo ($data['link'] == 'statistics') ? 'active-link' : 'asd'; ?>" href="<?php echo URLROOT;?>/pages/statistics">Statistics</a>
        </li>
    </ul>
</div>
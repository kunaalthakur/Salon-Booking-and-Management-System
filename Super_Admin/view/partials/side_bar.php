<?php require_once __DIR__.'/../../application/utils/app_config.php'; ?>

<div class="dlabnav">
    <div class="dlabnav-scroll">

        <ul class="metismenu" id="menu">
            
            <li><a class="has-arrow" href="<?php echo $app_name; ?>/view/home.php" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Overview</span>
                </a>
            </li>
            <li><a class="has-arrow" href="<?php echo $app_name; ?>/view/master/saloon_master.php" aria-expanded="false">
                    <i class="fas fa-building"></i>
                    <span class="nav-text">Saloons</span>
                </a>
            </li>
            <li><a class="has-arrow" href="<?php echo $app_name; ?>/view/master/user_master.php" aria-expanded="false">
                    <i class="flaticon-381-user-8"></i>
                    <span class="nav-text">Users</span>
                </a>
            </li>

            
    </div>
</div>
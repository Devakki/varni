<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="<?php echo base_url('home');?>" class="logo">
            <span class="text-left">
                <img src="<?php echo base_url('public/admin/images/').LOGO_WHITE;?>" alt="" height="40">
            </span>
            <i>
                <img src="<?php echo base_url('public/admin/images/').LOGO_SIDEBAR;?>" alt="" height="41">
            </i>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                   <img src="<?php echo ((isset($_SESSION['auth_image']) && !empty($_SESSION['auth_image']))?(base_url('public/uploads/profiles/').$_SESSION['auth_image']):base_url('public/uploads/').USER_LOGO) ;?>" alt="user" class="rounded-circle"> 
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                       <h5 class="text-overflow"><small>Welcome ! 
                        <?php 
                            if(isset($_SESSION['auth_fullname']) && !empty($_SESSION['auth_fullname'])){
                                echo ucwords($_SESSION['auth_fullname']);
                            };
                        ?>
                       </small> </h5>
                    </div>
                    <a href="<?php echo base_url('userprofile/')?>" class="dropdown-item notify-item">
                        <i class=" mdi mdi-account-settings-variant"></i> <span>Profile</span>
                    </a>
                    <a href="<?php echo base_url('masteradmin/')?>" class="dropdown-item notify-item">
                        <i class="fa fa-users"></i> <span>Users</span>
                    </a>
                    <a href="<?php echo base_url('admin/logout')?>" class="dropdown-item notify-item">
                        <i class="mdi mdi-power"></i> <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
            <!-- Top Bar End -->
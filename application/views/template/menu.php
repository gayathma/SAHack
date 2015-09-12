
<ul class="sidebar-menu" id="nav-accordion">
    <li>
        <a  href="<?php echo site_url(); ?>/dashboard" id="dashboard_menu">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="sub-menu">
        <a href="javascript:;" id="user_menu">
            <i class="fa fa-users"></i>
            <span>Users</span>
        </a> 
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/users/manage_admins" onclick="">Manage Administrators</a></li>
            <li><a  href="<?php echo site_url(); ?>/reg_users/manage_registered_users">Manage Registered Users</a></li>
        </ul>
    </li>


    <li class="sub-menu">
        <a href="javascript:;" id="advertisements_menu">
            <i class="fa fa-film"></i>
            <span>Animals</span>
        </a>
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/animal/view_animal_map">Animal Location Map</a></li>
            <li><a  href="<?php echo site_url(); ?>/animal_category/manage_animal_category">Animal Categories</a></li>
             <li><a  href="<?php echo site_url(); ?>/animal/manage_animal">Animals</a></li>
        </ul>
    </li>




</ul>



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
            <li><a  href="<?php echo site_url(); ?>/register_users/load_registration" onclick="">Manage Employees</a></li>

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


    <li class="sub-menu">
        <a href="javascript:;" id="advertisements_menu">
            <i class="fa fa-film"></i>
            <span>Treatments</span>
        </a>
        <ul class="sub">
            <li><a  href="<?php echo site_url(); ?>/treatment/index">Treatment Categories</a></li>
            <li><a  href="<?php echo site_url(); ?>/animal_treatment/index">Animal Treatment Details</a></li>
        </ul>
    </li>

</ul>


<?php

use Cake\Routing\Router;
?>
<aside id="sidebar" class="custom-sidebar">
    <div class="sidebar-search">
        <input id="live-search-box" type="search" class="form-control input-sm" placeholder="Artist search">
        <a href="javascript:void(0)"><i class="search-close icon_search"></i></a>

    </div>
    <div class="sidebar-menu custom-sidebar-menu">
        <ul class="nav site-menu live-search-list" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">
<!--            <li class="menu-title"><i class="icon_compass_alt"></i><span>Main Menu</span>
                <ul class="main-menu">-->
            <li class="sub-item">
                <!--<a href="javascript:void(0)"><span>Dashboard</span></a>-->
                <a href="<?= Router::url(['controller' => 'Users', 'action' => 'dashboard']); ?>"><span>Dashboard</span></a>
            </li>
            <!--                </ul>
                        </li>-->
            <li class="menu-title"><i class="icon_profile"></i><span>Service</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Services', 'action' => 'add']); ?>"><span>Create New Service</span></a>
                    </li>
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Services', 'action' => 'index']); ?>"><span>View Service</span></a>
                    </li>
                </ul>
            </li>
            <li class="menu-title"><i class="icon_profile"></i><span>portfolio</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'add']); ?>"><span>Add Images</span></a>
                    </li>                    
                </ul>
            </li>
            <li class="menu-title"><i class="icon_bag"></i><span>Categories</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Categories', 'action' => 'add']); ?>"><span>Add Category</span></a>
                    </li>
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Categories', 'action' => 'index']); ?>"><span>View Category</span></a>
                    </li>
                </ul>
            </li>
            <li class="menu-title"><i class="icon_profile"></i><span>Options</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Users', 'action' => 'changePassword']); ?>"><span>Change Password</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="sidebar-extra">
        <a href="#"><i class="icon_lock-open_alt"></i></a>
        <a href="#"><i class="icon_key_alt"></i></a>
        <a href="#"><i class="icon_lock_alt"></i></a>
    </div>
</aside>

<?php

use Cake\Routing\Router;
?>
<aside id="sidebar" class="custom-sidebar">

    <div class="sidebar-menu custom-sidebar-menu">
        <ul class="nav site-menu live-search-list ps-container ps-theme-default ps-active-y" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">

            <!--            <li class="menu-title">
                            <i class="icon_genius"></i>
                            <span>Employees Action</span>
                            <ul class="main-menu">
                                <li class="sub-item">
                                    <a href="javascript:void(0)">
                                        Employees<span class="float-xs-right"><i class="icon_plus"></i></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="<?php // echo Router::url(['controller' => 'Employees', 'action' => 'index']);       ?>"><span>All Employees</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php // echo Router::url(['controller' => 'Employees', 'action' => 'add']);       ?>"><span>Add Employee</span></a>
                                        </li>                          
                                    </ul>
                                </li>                   
                            </ul>
                        </li>-->

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Managers Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            Managers<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Admins', 'action' => 'allManagers']); ?>"><span>All Managers</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Admins', 'action' => 'addManager']); ?>"><span>Add Manager</span></a>
                            </li>                          
                        </ul>
                    </li>                   
                </ul>
            </li>

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Requests Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            Requests<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allRequest']); ?>"><span>All Requests</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'addRequest']); ?>"><span>Add Request</span></a>
                            </li>                          
                        </ul>
                    </li>                   
                </ul>
            </li>           

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Customers Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Admins', 'action' => 'viewAllCustomers']); ?>"><span>All Customers</span></a>
                    </li>                   
                </ul>
            </li>

    </div>
    <!--<div class="sidebar-extra">
        <a href="#"><i class="icon_lock-open_alt"></i></a>
        <a href="#"><i class="icon_key_alt"></i></a>
        <a href="#"><i class="icon_lock_alt"></i></a>
    </div>-->
</aside>
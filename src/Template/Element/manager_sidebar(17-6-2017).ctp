<?php

use Cake\Routing\Router;
?>
<aside id="sidebar" class="custom-sidebar">

    <div class="sidebar-menu custom-sidebar-menu">
        <ul class="nav site-menu live-search-list ps-container ps-theme-default ps-active-y" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Employees Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            Employees<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'allEmployees']); ?>"><span>All Employees</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'addEmployee']); ?>"><span>Add Employee</span></a>
                            </li>                          
                        </ul>
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
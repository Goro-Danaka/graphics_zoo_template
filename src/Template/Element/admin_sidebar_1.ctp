<?php

use Cake\Routing\Router;
?>
<aside id="sidebar" class="custom-sidebar">  
    <div class="sidebar-menu custom-sidebar-menu" style="margin-top: 25px;">
        <ul class="nav site-menu live-search-list" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">
            <li class="menu-title"><i class="icon_profile"></i><span>Customers</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'index']); ?>"><span>All Customers</span></a>
                    </li>
                </ul>
            </li>

            <li class="menu-title"><i class="icon_profile"></i><span>Employees</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'index']); ?>"><span>All Employees</span></a>
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'add']); ?>"><span>Add Employee</span></a>
                    </li>
                </ul>
            </li>

            <li class="menu-title"><i class="icon_profile"></i><span>Managers</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'index']); ?>"><span>All Managers</span></a>
                        <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'add']); ?>"><span>Add Manager</span></a>
                    </li>
                </ul>
            </li>

            <li class="menu-title"><i class="icon_bag"></i><span>Requests</span>
                <ul class="main-menu">                    
                    <li class="sub-item">
                        <!--<a href="<?php // echo Router::url(['controller' => 'Categories', 'action' => 'index']);                      ?>"><span>All Requests</span></a>-->
                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allRequest']); ?>"><span>All Requests</span></a>
                    </li>
                </ul>
            </li>            
        </ul>
    </div>
</aside>

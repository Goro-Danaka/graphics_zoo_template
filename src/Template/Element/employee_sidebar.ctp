<?php

use Cake\Routing\Router;
?>
<aside id="sidebar" class="custom-sidebar">  
    <div class="sidebar-menu custom-sidebar-menu" style="margin-top: 25px;">
        <ul class="nav site-menu live-search-list" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">
            <li class="menu-title"><i class="icon_profile"></i><span>Requests</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'allNewRequest']); ?>"><span>All New Requests</span></a>
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'allPendingRequest']); ?>"><span>All Pending Requests</span></a>
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'allCompletedRequest']); ?>"><span>All Completed Requests</span></a>
                    </li>
                </ul>
            </li> 
            <li class="menu-title"><i class="icon_genius"></i><span>Actions</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="<?= Router::url(['controller' => 'Employees', 'action' => 'changePassword']); ?>"><span>Change Password</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

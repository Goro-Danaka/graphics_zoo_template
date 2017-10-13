<?php

use Cake\Routing\Router;
?>

<aside id="sidebar" class="custom-sidebar">

    <div class="sidebar-menu custom-sidebar-menu">
        <ul class="nav site-menu live-search-list ps-container ps-theme-default ps-active-y" id="site-menu" data-plugin="custom-scroll" data-suppress-scroll-x="true" data-height="100%">

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Account Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            My Account<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'view', $current_user->id]); ?>"><span>View My Account</span></a>
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
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'addRequest']); ?>"><span>Add Request</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'allPendingRequest']); ?>"><span>All Pending Requests</span></a>
                            </li>                          
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'allRunningRequest']); ?>"><span>All Running Requests</span></a>
                            </li>                          
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'allCompletedRequest']); ?>"><span>All Completed Requests</span></a>
                            </li>                          
                        </ul>
                    </li>                   
                </ul>
            </li>

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Billing Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            Payment<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'getBillingInfo']); ?>"><span>Billing Information</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'addPaymentDetails']); ?>"><span>Add Payment details</span></a>
                            </li>                          
                        </ul>
                    </li>                   
                </ul>
            </li>   

            <li class="menu-title">
                <i class="icon_genius"></i>
                <span>Account Setting Action</span>
                <ul class="main-menu">
                    <li class="sub-item">
                        <a href="javascript:void(0)">
                            Settings<span class="float-xs-right"><i class="icon_plus"></i></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'changePassword']); ?>"><span>Change Password</span></a>
                            </li>
                            <li>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'contactAdmin']); ?>"><span>Contact Admin</span></a>
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

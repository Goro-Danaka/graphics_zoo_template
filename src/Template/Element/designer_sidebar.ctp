<?php

use Cake\Routing\Router;
?>
<div class="side-nav">
    <div class="side-nav-inner">
        <div class="side-nav-logo">
            <a href="index.html">
                <div class="logo logo-dark" style="<?= SITE_IMAGES_URL . 'img/logo.png' ?>"></div>
                <div class="logo logo-white" style="<?= SITE_IMAGES_URL . 'img/logo.png' ?>"></div>
            </a>
            <div class="mobile-toggle side-nav-toggle">
                <a href="">
                    <i class="ti-arrow-circle-left"></i>
                </a>
            </div>
        </div>
        <ul class="side-nav-menu scrollable">
            <li class="nav-item active">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer']) ?>">
                    <span class="icon-holder">
                            <i class="ti-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ti-package"></i>
                        </span>
                    <span class="title">REQUESTS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allPendingRequest', 'prefix' => 'designer']); ?>">ALL PENDING REQUESTS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allApprovedRequest', 'prefix' => 'designer']); ?>">ALL APPROVED REQUEST</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ti-package"></i>
                        </span>
                    <span class="title">SETTINGS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'designer']); ?>">CHANGE PASSWORD</a>
                    </li>
                </ul>
            </li>                   
        </ul>


    </div>
</div>

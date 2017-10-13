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
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer']) ?>">
                    <span class="icon-holder">
                            <i class="ti-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Requests', 'action' => 'allRequests', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder">
                            <i class="ti-package"></i>
                        </span>
                    <span class="title">Design Requests</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder">
                            <i class="ti-settings"></i>
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>                        
        </ul>


        <a href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']);?>"><span style="color:#fff"><button class="btn btn-default" style="background:#ec1c41;border-radius: 16px;width: 158px;margin-top: 80px;margin-left: 40px;">Upgrade</button></span></a>
    </div>
</div>
<!-- Side Nav END -->


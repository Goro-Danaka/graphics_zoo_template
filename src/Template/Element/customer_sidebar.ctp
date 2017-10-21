<?php

use Cake\Routing\Router;
?>

<style type="text/css">
    
</style>

<div class="side-nav">
    <div class="side-nav-inner">
        <div class="side-nav-logo">
            <a href="index.html">
                <div class="logo logo-dark" style="background-image: url('/img/img/logo-white.png')"></div>
                <div class="logo logo-white" style="background-image: url('/img/img/logo-white.png')"></div>
                <!-- <img class="logo logo-dark" src="<?= SITE_IMAGES_URL . 'img/logo-white.png' ?>"> -->
            </a>
            <div class="mobile-toggle side-nav-toggle">
                <a href="">
                    <i class="ti-arrow-circle-left"></i>
                </a>
            </div>
        </div>
        <div class="widget-profile-1 card">
            <div class="profile border bottom">
                <img src="<?= SITE_IMAGES_URL . 'designer4.png' ?>" alt="">
                <h4 class="mrg-top-5 no-mrg-btm text-semibold">Victoria Clayton</h4>
                <p>UI/UX Designer</p>
                <span class="profile-arrow">
                    <i class="ti-angle-right"></i>
                </span>
            </div>
        </div>
        <ul class="side-nav-menu scrollable">
            <li class="nav-item active dropdown">
                <a href="<?= Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer']) ?>">
                    <span class="icon-holder icon-dashboard">
                        </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allRequests', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder icon-request">
                        </span>
                    <span class="title">Design Requests</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder icon-settings">
                        </span>
                    <span class="title">Settings</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>                        
        </ul>
        <div class="col-md-12 mrg-top-15" style="padding: 0 55px;"><button class="btn btn-primary" onclick="window.location.href='/customer/settings/change-password'" style="float:right;margin:1% 2% 0% 0%;color: #fff !important;font-weight: 500;background: #ec1c41;border: 0px;margin-top: 15px;width: 120px;">Upgrade</button></div>
    </div>
</div>
<!-- Side Nav END -->


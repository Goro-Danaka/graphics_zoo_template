<?php

use Cake\Routing\Router;
?>
<style type="text/css">
    .side-nav-logo {
        background: RGB(53,63,83);
        
    }

    .side-nav-logo .logo {
        padding: 0px 30px;
    }

    .side-nav-menu {
        height: auto!important;
    }

    .side-nav-menu li {
        border-bottom: 1px solid RGB(230,236,245);
    }
    .side-nav-inner .nav-item:hover {
        background-color: RGB(230,236,245);
    }
    .side-nav-inner .nav-item span {
        background-color: white;
        font-size: 20px;
        color: black;
    }
    .side-nav .side-nav-inner .side-nav-menu > li > a {
        padding: 0px;
        margin-top: 20px!important;
    }

    .side-nav .side-nav-inner ul {
        padding: 15px 0px!important;
    }

    .side-nav .side-nav-inner ul > li {
        padding-left: 20px !important;
    }

    .side-nav-inner .nav-item span {
        background-color: transparent;
    }

    .side-nav-inner .card {
        border-radius: 0px;
        border: none;
        border-right: 1px solid RGB(230,236,245); 
        margin: 0px;          
    }

    .widget-profile-1 img {
        width: 80px;
        height: 80px;
        margin-top: 10px!important;
    }

    .widget-profile-1 h4 {
        margin-top: 10px!important;
    }

    .widget-profile-1 p {
        padding-bottom: 0px;
    }

    .widget-profile-1 .profile {
        padding: 0px;
    }

    textarea.form-control {
        min-height: 80px!important;
    }

    .icon-dashboard {
        background: url(/img/dashboard.png);
    }

    .icon-request {
        background: url(/img/request.png);
    }

    .icon-settings {
        background: url(/img/setting.png);        
    }

    .icon-narrow-right {
        background: url(/img/narrow_right.png);        
        float: right;
    }

    .icon-holder {
        vertical-align:middle;
        background-size: 100%;
        background-repeat: no-repeat;        
    }

    .side-nav-menu .title {
        color: RGB(20,54,73)!important;
        font-weight: 400;
    }

    .page-title h4 {
        font-size: 28px;
    }

    .nav-item span {
        vertical-align: middle;
    }

    .nav-item .arrow {
        right: 23px!important;
    }

    .profile-arrow {
        position: absolute; 
        right: 23px!important; 
        top: 65px;
        line-height: 40px; 
        font-size: 10px; 
        transition: all 0.05s ease-in; 
        -webkit-transition: all 0.05s ease-in; 
        -moz-transition: all 0.05s ease-in; 
        -o-transition: all 0.05s ease-in; 
        -ms-transition: all 0.05s ease-in;
    }
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
                <img class="mrg-top-30" src="<?= SITE_IMAGES_URL . 'designer4.png' ?>" alt="">
                <h4 class="mrg-top-20 no-mrg-btm text-semibold">Victoria Clayton</h4>
                <p>UI/UX Designer</p>
                <span class="profile-arrow">
                    <i class="ti-angle-right"></i>
                </span>
            </div>
        </div>
        <ul class="side-nav-menu scrollable">
            <li class="nav-item active dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'designer']) ?>">
                    <span class="icon-holder icon-dashboard">
                        </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Requests', 'action' => 'allPendingRequest', 'prefix' => 'designer']); ?>">
                    <span class="icon-holder icon-request">
                        </span>
                    <span class="title">Design Requests</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'designer']); ?>">
                    <span class="icon-holder icon-settings">
                        </span>
                    <span class="title">Settings</span>
                    <span class="arrow">
                        <i class="ti-angle-right"></i>
                    </span>
                </a>
            </li>                        
        </ul>


        <!-- <a href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']);?>"><span style="color:#fff"><button class="btn" style="background:#ec1c41;border-radius: 16px;width: 191px;height:50px;margin-top: 80px;margin-left: 40px;font-size: 20px;color: white;">Upgrade</button></span></a> -->
    </div>
</div>


<!-- <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'allApprovedRequest', 'prefix' => 'designer']); ?>">ALL APPROVED REQUEST</a> -->

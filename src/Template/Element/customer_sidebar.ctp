<?php

use Cake\Routing\Router;
?>

<style type="text/css">
    .side-nav-logo {
        background: RGB(229, 31, 68);
        
    }

    .side-nav-logo .logo {
        padding: 0px 30px;
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
        background: url(/img/img/receive.png);
    }

    .icon-request {
        background: url(/img/img/receive.png);
    }

    .icon-settings {
        background: url(/img/img/receive.png);        
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
            </div>
        </div>
        <ul class="side-nav-menu scrollable">
            <li class="nav-item active">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Profiles', 'action' => 'dashboard', 'prefix' => 'customer']) ?>">
                    <span class="icon-holder icon-dashboard">
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Requests', 'action' => 'allRequests', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder icon-request">
                        </span>
                    <span class="title">Design Requests</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']); ?>">
                    <span class="icon-holder icon-settings">
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>                        
        </ul>


        <a href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'customer']);?>"><span style="color:#fff"><button class="btn btn-default" style="background:#ec1c41;border-radius: 16px;width: 158px;margin-top: 80px;margin-left: 40px;">Upgrade</button></span></a>
    </div>
</div>
<!-- Side Nav END -->


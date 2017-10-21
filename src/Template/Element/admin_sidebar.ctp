<?php

use Cake\Routing\Router;
?>

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
        <div class = "side-nav-item">
            <ul class="side-nav-menu scrollable">
                <li class="nav-item active dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Managers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-dashboard">
                            </span>
                        <span class="title">MANAGERS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Designers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-request">
                            </span>
                        <span class="title">DESINGERS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Requests', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">REQUESTS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Customers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">CUSTOMERS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Posts', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">POSTS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">PORTFOLIOS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'allCategories', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">PORTFOLIO CATEGORIES</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Subscriptions', 'action' => 'allCategories', 'prefix' => 'admin'], TRUE); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">SUBSCRIPTION PLANS</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>  
                <li class="nav-item dropdown">
                    <a class="mrg-top-30" href="<?= Router::url(['controller' => 'Settings', 'action' => 'changePassword', 'prefix' => 'admin']); ?>">
                        <span class="icon-holder icon-settings">
                            </span>
                        <span class="title">Settings</span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                </li>                        
            </ul>
        </div>
    </div>
</div>


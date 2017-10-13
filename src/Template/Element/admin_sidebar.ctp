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
             <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ti-package"></i>
                        </span>
                    <span class="title">MANAGERS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL MANAGERS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Managers', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD MANAGER</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-desk-lamp"></i>
                        </span>
                    <span class="title">DESINGERS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Designers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL DESIGNERS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Designers', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD DESIGNERS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-growth"></i>
                        </span>
                    <span class="title">REQUESTS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL REQUESTS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD REQUESTS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-office-chair"></i>
                        </span>
                    <span class="title">CUSTOMERS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL CUSTOMERS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD CUSTOMERS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-money"></i>
                        </span>
                    <span class="title">POSTS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Posts', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL POSTS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Posts', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD POSTS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-rocket"></i>
                        </span>
                    <span class="title">PORTFOLIOS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'index', 'prefix' => 'admin'], TRUE); ?>">ALL PORTFOLIOS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'add', 'prefix' => 'admin'], TRUE); ?>">ADD PORTFOLIOS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-closed"></i>
                        </span>
                    <span class="title">PORTFOLIO CATEGORIES</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'allCategories', 'prefix' => 'admin'], TRUE); ?>">ALL PORTFOLIO CATEGORIES</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'addCategories', 'prefix' => 'admin'], TRUE); ?>">ADD PORTFOLIO CATEGORIES</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-diners-club"></i>
                        </span>
                    <span class="title">SUBSCRIPTION PLANS</span>
                    <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= Router::url(['controller' => 'Subscriptions', 'action' => 'allCategories', 'prefix' => 'admin'], TRUE); ?>">ALL SUBSCRIPTION PLANS</a>
                    </li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Subscriptions', 'action' => 'addCategories', 'prefix' => 'admin'], TRUE); ?>">ADD SUBSCRIPTION PLANS</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                            <i class="ei-hamburger"></i>
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


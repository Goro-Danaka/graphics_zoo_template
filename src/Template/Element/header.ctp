<?php

use Cake\Routing\Router;
?>
<style>
.openfile img{
	height: 150px;
    width: 150px;
}
</style>

<div class="header navbar" style = "top: 0px;">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a class="side-nav-toggle" href="javascript:void(0);">
                    <i class="ti-view-grid"></i>
                </a>
            </li>                            
        </ul>
        <ul class="nav-right">
            <li>
                <button class="btn btn-primary" onclick="window.location.href='<?= Router::url(['controller' => 'Requests', 'action' => 'addRequest', 'prefix' => 'customer']); ?>'" style="float:right;margin:1% 2% 0% 0%;color: #fff !important;font-weight: 500;background: #ec1c41;border: 0px;margin-top: 15px;">+ Add New Request</button>
            </li>
            <li class="user-profile dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img class="profile-img img-fluid" src="assets/images/user.jpg" alt="">
                    <div class="user-info">
                        <span class="name pdd-right-5">Nate Leong</span>
                        <i class="ti-angle-down font-size-10"></i>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="">
                            <i class="ti-settings pdd-right-10"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ti-user pdd-right-10"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ti-email pdd-right-10"></i>
                            <span>Inbox</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="<?= Router::url(['controller' => 'Users', 'action' => 'logout', 'prefix' => FALSE], TRUE); ?>">
                            <i class="ti-power-off pdd-right-10"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="notifications dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-bell"></i>
                </a>

                <ul class="dropdown-menu ">
                    <li class="notice-header">
                        <i class="ti-bell pdd-right-10"></i>
                        <span>Notifications</span>
                    </li>
                    <li>
                        <ul class="list-info overflow-y-auto relative scrollable">
                            <li>
                                <a href="">
                                    <img class="thumb-img" src="assets/images/avatars/thumb-5.jpg" alt="">
                                    <div class="info">
                                        <span class="title">
                                            <span class="font-size-14 text-semibold">Jennifer Watkins</span>
                                        <span class="text-gray">commented on your <span class="text-dark">post</span></span>
                                        </span>
                                        <span class="sub-title">5 mins ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img class="thumb-img" src="assets/images/avatars/thumb-4.jpg" alt="">
                                    <div class="info">
                                        <span class="title">
                                            <span class="font-size-14 text-semibold">Samuel Field</span>
                                        <span class="text-gray">likes your <span class="text-dark">photo</span></span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb-img bg-primary">
                                            <span class="text-white">M</span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
                                            <span class="font-size-14 text-semibold">Michael Birch</span>
                                        <span class="text-gray">likes your <span class="text-dark">photo</span></span>
                                        </span>
                                        <span class="sub-title">5 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb-img bg-success">
                                        <span class="text-white"><i class="fa fa-paper-plane-o"></i></span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
                                            <span class="font-size-14 text-semibold">Message sent</span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb-img bg-info">
                                        <span class="text-white"><i class="ti-user"></i></span>
                                    </span>
                                    <div class="info">
                                        <span class="title">
                                            <span class="font-size-14 text-semibold">Admin</span>
                                        <span class="text-gray">Welcome on board</span>
                                        </span>
                                        <span class="sub-title">8 hours ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="notice-footer">
                        <span>
                            <a href="" class="text-gray">Check all notifications <i class="ei-right-chevron pdd-left-5 font-size-10"></i></a>
                        </span>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
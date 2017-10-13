<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Dashboard</h2>
		<!--<a href="<?= Router::url(['controller' => 'Users', 'action' => 'logout', 'prefix' => FALSE], TRUE); ?>">
		<button class="btn btn-default" style="background: #3e3c3c;float: right;border-radius: 7px;margin: 15px;padding-left: 25px;padding-right: 25px;margin-right: 65px;">Log Out</button>
		</a>-->
        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">
        <div class="col-md-12 profile-contain">

            <div class="dashboard-header">
                <h4 class="page-content-title float-xs-left">Information</h4>
                <div class="dashboard-action">
                    <!--                        <ul class="right-action float-xs-right">
                                                <li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
                                                <li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a>
                                                </li>
                                            </ul>-->
                </div>
            </div>
            <div class="dashboard-box">

                <div class="row">
                    
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                               No. of New Customer
                            </div>
                            <h3 class="name-profile"><?= sizeof($today_customer) ?></h3>
                            
                        </div>
					</div>
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                                No. of Total Customer
                            </div>
                            <h3 class="name-profile"><?= sizeof($all_customer) ?></h3>
                            
                        </div>
					</div>
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                               No. of Cancel Request
                            </div>
                            <h3 class="name-profile"><? //= sizeof($today_requests) ?>0</h3>
                            
                        </div>
					</div>
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                               No. of New Request Today
                            </div>
                            <h3 class="name-profile"><?= sizeof($today_requests) ?></h3>
                            
                        </div>
					</div>
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                               No. of Total Request
                            </div>
                            <h3 class="name-profile"><?= sizeof($total_requests) ?></h3>
                            
                        </div>
					</div>
					<div class="col-xl-4">
						<div class="content text-xs-center">
                            <div class="image-profile" style="color: #039be5;font-size: 15px;">
                               No. of Design Request Due Today
                            </div>
                            <h3 class="name-profile"><? //= sizeof($waitingtoapproverequest) ?>0</h3>
                            
                        </div>
					</div>
					

					
                </div>       
            </div>       
        </div>
    </div>
</section>

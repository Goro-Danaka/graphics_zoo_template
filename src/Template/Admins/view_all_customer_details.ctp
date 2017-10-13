<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">View Customer</h2>

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
                <h4 class="page-content-title float-xs-left">Personal Information</h4>
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
                    <div class="col-xl-3 col-md-5 col-xs-12 contacts">
                        <div class="content text-xs-center">
                            <div class="image-profile">
                                <?php
                                $img_path = '';
                                $img_path = @$user->profile_picture_url;
                                if ($img_path):
                                    echo $this->Html->image($img_path, ['class' => 'img img-responsive img-profile']);
                                endif;
                                ?>
                            </div>
                            <h3 class="name-profile"><?= $user->first_name . ' ' . $user->last_name ?></h3>
                            <h6 class="email-profile"><?= $user->email ?></h6>                       
                        </div>                   
                    </div>
                    <div class="col-xl-9 col-md-7 col-xs-12">                    
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">

                                    <!--<h4 class="page-content-title">Personal Information</h4>-->
                                    <div class="divider15"></div>
                                    <div class="personal-info-box">
                                        <div class="row">
                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">First Name :</div>
                                                <div class="detail-profile float-xs-right"><?= $user->first_name ?></div>
                                            </div>

                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">Last Name :</div>
                                                <div class="detail-profile float-xs-right"><?= $user->last_name ?></div>
                                            </div>

                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">Email :</div>
                                                <div class="detail-profile float-xs-right"><?= $user->email ?></div>
                                            </div> 

                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">Phone :</div>
                                                <div class="detail-profile float-xs-right"><?= $user->phone ?></div>
                                            </div>  

                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">Subscription :</div>
                                                <div class="detail-profile float-xs-right">
                                                    <?= $app_controller->getSubscriptionPlanLabel($user->subscription) ?>
                                                </div>
                                                <div class="detail-profile float-xs-right">
                                                    <span class="btn btn-info">Change Subscription</span>
                                                </div>

                                            </div>  

                                            <!--<div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                <div class="left-name-profile float-xs-left">Designer Assigned :</div>
                                                <div class="detail-profile float-xs-right">
                                            <?= ($requests->employee) ? $requests->employee->first_name . ' ' . $requests->employee->last_name : '' ?>
                                                </div>
                                                <div class="detail-profile float-xs-right">
                                                    <span class="btn btn-info">Change Designer</span>
                                                </div>

                                            </div>-->

                                        </div>
                                    </div>                            
                                </div>
                            </div>                 
                        </div>
                    </div>          
                </div>       
            </div>       
        </div>
    </div>



    <div class="content content-datatable datatable-width">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-header">
                    <h4 class="page-content-title float-xs-left">Design Requests</h4>
                    <div class="dashboard-action">
                        <!--                        <ul class="right-action float-xs-right">
                                                    <li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
                                                    <li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a>
                                                    </li>
                                                </ul>-->
                    </div>
                </div>
                <div class="dashboard-box">
                    <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>                           
                                <th>Design Preview</th>
                                <th>Date Requested</th>
                                <th>Action</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($requests as $request): ?>
                                <tr>
                                    <td><?= $i++; ?></td>

                                    <td><?= $request->title ?></td>
                                    <td><?= $request->description ?></td>  
                                    <td>
                                        <?php
                                        if ($request->attachment):
                                            $img_path = REQUEST_IMG_PATH . DS . $request->id . DS . $request->profile_picture;
//                                        echo $this->Html->image($img_path, ['class' => 'img img-responsive img-small']);
                                        endif;
                                        ?>
                                    </td>
                                    <td><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?></td>  
                                    <td>
                                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'viewRunningRequest', $request->id]); ?>">
                                            <span class="fa fa-eye fa-2x text-primary"></span>
                                        </a>

                                        <?php
                                        echo $this->Form->postLink('<span class="fa fa-trash-o fa-2x text-danger"></span>', '#', ['escape' => FALSE, 'confirm' => 'Are you sure want to delete?']);
                                        ?>


                                    </td>

                                </tr>        
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="content content-datatable datatable-width">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-header">
                    <h4 class="page-content-title float-xs-left">Billing Information</h4>
                    <div class="dashboard-action">
                        <!--                        <ul class="right-action float-xs-right">
                                                    <li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
                                                    <li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a>
                                                    </li>
                                                </ul>-->
                    </div>
                </div>
                <div class="dashboard-box">
                    <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'getBillingInfo']); ?>"><span class="btn btn-info">Billing Information</span></a>
                    <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'addPaymentDetails']); ?>"><span class="btn btn-warning">Add Payment details</span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="content content-datatable datatable-width">
        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-header">
                    <h4 class="page-content-title float-xs-left">Settings</h4>
                    <div class="dashboard-action">
                        <!--                        <ul class="right-action float-xs-right">
                                                    <li data-widget="collapse"><a href="javascript:void(0)" aria-hidden="true"><span class="icon_minus-06" aria-hidden="true"></span></a></li>
                                                    <li data-widget="close"><a href="javascript:void(0)"><span class="icon_close" aria-hidden="true"></span></a>
                                                    </li>
                                                </ul>-->
                    </div>
                </div>
                <div class="dashboard-box">
                    <span class="btn btn-primary">Change Settings <i class="fa fa-gears"></i></span>
                    <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'changePassword', $user->id]); ?>">
                        <span class="btn btn-success">Change Password <i class="fa fa-lock"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
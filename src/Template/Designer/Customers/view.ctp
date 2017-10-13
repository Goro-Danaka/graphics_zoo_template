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
    <div class="content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">               
                <div class="nav-tab-pills-image">
                    <ul class="nav nav-tabs" role="tablist">            

                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#info_tab" role="tab">
                                <i class="icon icon_cog"></i>Info
                            </a>
                        </li>

                        <!--                        <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#design_requests_tab" role="tab">
                                                        <i class="icon icon_cog"></i>Design Requests
                                                    </a>
                                                </li>
                        
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#approved_designs_tab" role="tab">
                                                        <i class="icon icon_cog"></i>Approved Designs
                                                    </a>
                                                </li>
                        
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#billing_tab" role="tab">
                                                        <i class="icon icon_cog"></i>Billing
                                                    </a>
                                                </li>-->

                    </ul>
                    <div class="divider15"></div>
                    <div class="tab-content">
                        <div class="tab-pane active content-datatable datatable-width" id="info_tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-md-5 col-xs-12 contacts">
                                    <div class="content text-xs-center">
                                        <div class="image-profile">
                                            <?php
                                            $img_path = '';
                                            $img_path = @$customer->profile_picture_url;
                                            if ($img_path):
                                                echo $this->Html->image($img_path, ['class' => 'img img-responsive img-profile']);
                                            endif;
                                            ?>
                                        </div>
                                        <h3 class="name-profile"><?= $customer->first_name . ' ' . $customer->last_name ?></h3>
                                        <h6 class="email-profile"><?= $customer->email ?></h6>                       
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
                                                            <div class="detail-profile float-xs-right"><?= $customer->first_name ?></div>
                                                        </div>

                                                        <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                            <div class="left-name-profile float-xs-left">Last Name :</div>
                                                            <div class="detail-profile float-xs-right"><?= $customer->last_name ?></div>
                                                        </div>

                                                        <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                            <div class="left-name-profile float-xs-left">Email :</div>
                                                            <div class="detail-profile float-xs-right"><?= $customer->email ?></div>
                                                        </div> 

                                                        <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                            <div class="left-name-profile float-xs-left">Phone :</div>
                                                            <div class="detail-profile float-xs-right"><?= $customer->phone ?></div>
                                                        </div>  

                                                        <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                            <div class="left-name-profile float-xs-left">Subscription :</div>
                                                            <div class="detail-profile float-xs-right">
                                                                <?= $app_controller->getSubscriptionPlanLabel($customer->subscription) ?>
                                                            </div>
                                                            <!--                                                            <div class="detail-profile float-xs-right">
                                                            <?= $this->Html->link('Change Subscription', ['action' => 'changeSubscription', $customer->id], ['class' => 'btn btn-info']) ?>
                                                                                                                        </div>-->
                                                        </div> 

                                                        <!--                                                        <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                                                                                    <div class="left-name-profile float-xs-left">Designer Assigned :</div>
                                                                                                                    <div class="detail-profile float-xs-right">
                                                        <?= ($customer->designer) ? $customer->designer->full_name : ''; ?>
                                                                                                                    </div>
                                                                                                                    <div class="detail-profile float-xs-right">
                                                        <?= $this->Html->link('Change Designer', ['action' => 'changeDesigner', $customer->id], ['class' => 'btn btn-info']) ?>
                                                                                                                    </div>
                                                                                                                </div>  -->

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

                        <div class="tab-pane content-datatable datatable-width" id="design_requests_tab" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
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
                                            <?php foreach ($designs_requested as $request): ?>
                                                <tr>
                                                    <td><?= $request->id ?></td>
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
                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id], TRUE); ?>">
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

                        <div class="tab-pane content-datatable datatable-width" id="approved_designs_tab" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
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
                                            <?php foreach ($designs_approved as $request): ?>
                                                <tr>
                                                    <td><?= $request->id ?></td>
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
                                                        <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id], TRUE); ?>">
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

                        <div class="tab-pane content-datatable datatable-width" id="billing_tab" role="tabpanel">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<?= $this->start('css'); ?>

<?= $this->Html->css('/theme/assets/global/plugins/datatables/media/css/dataTables.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-scroller/css/scroller.bootstrap4.min.css'); ?>

<?= $this->end('css'); ?>

<?= $this->start('script'); ?>

<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/numeric-input-example.js'); ?>

<?= $this->Html->script('/theme/assets/global/js/global/datatable.js'); ?>

<?= $this->end('script'); ?>
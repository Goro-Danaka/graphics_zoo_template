<?php

use Cake\Routing\Router;
?>
<div class="main-content">
    <div class="container-fluid">

        <div class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h4 class="page-content-title">Manager</h4>
                    <div class="divider15"></div>
                    <div class="nav-tab-pills-image">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal_info_tab" role="tab">
                                    <i class="icon icon_house_alt"></i>Info
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#designers_tab" role="tab">
                                    <i class="icon icon_profile"></i>Designers
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#designs_queue_tab" role="tab">
                                    <i class="icon icon_cog"></i>Designs Queue
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#approved_designs_tab" role="tab">
                                    <i class="icon icon_cog"></i>Approved Designs
                                </a>
                            </li>
                        </ul>
                        <div class="divider15"></div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal_info_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-3 col-md-5 col-xs-12 contacts">
                                        <div class="content text-xs-center">
                                            <div class="image-profile">
                                                <?php
                                                $img_path = '';
                                                $img_path = @$manager->profile_picture_url;
                                                if ($img_path):
                                                    echo $this->Html->image($img_path, ['class' => 'img img-responsive img-profile']);
                                                endif;
                                                ?>
                                            </div>
                                            <h3 class="name-profile"><?= $manager->first_name . ' ' . $manager->last_name ?></h3>
                                            <h6 class="email-profile"><?= $manager->email ?></h6>                       
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
                                                                <div class="detail-profile float-xs-right"><?= $manager->first_name ?></div>
                                                            </div>

                                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                                <div class="left-name-profile float-xs-left">Last Name :</div>
                                                                <div class="detail-profile float-xs-right"><?= $manager->last_name ?></div>
                                                            </div>

                                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                                <div class="left-name-profile float-xs-left">Email :</div>
                                                                <div class="detail-profile float-xs-right"><?= $manager->email ?></div>
                                                            </div>

                                                            <div class="user-name-profile col-xl-6 col-md-12 col-xs-12">
                                                                <div class="left-name-profile float-xs-left">Phone :</div>
                                                                <div class="detail-profile float-xs-right"><?= $manager->phone ?></div>
                                                            </div>

                                                        </div>
                                                    </div>                            
                                                </div>
                                            </div>                 
                                        </div>
                                    </div>          
                                </div>
                            </div>
                            <div class="tab-pane content-datatable datatable-width" id="designers_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Profile</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <!--<th>Current Status</th>-->
                                                    <th>Action</th>                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($designers as $designer): ?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td>
                                                            <?php
                                                            $img_path = '';
                                                            $img_path = @$designer->profile_picture_url;
                                                            if ($img_path):
                                                                echo $this->Html->image($img_path, ['class' => 'img img-responsive img-small']);
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td><?= $designer->first_name ?></td>
                                                        <td><?= $designer->last_name ?></td>
                                                        <td><?= $designer->email ?></td>
                                                        <td><?= $designer->phone ?></td>
                                                        <?php
                                                        $designer_status = '';
                                                        $designer_text = '';
                                                        $designer_message = '';
                                                        if ($designer->status == STATUS_DEACTIVE):
                                                            $designer_status = 'text-danger';
                                                            $designer_text = 'Block';
                                                            $designer_icons = 'fa fa-times fa-2x text-danger';
                                                            $designer_message = 'UnBlock';
                                                        elseif ($designer->status == STATUS_ACTIVE):
                                                            $designer_status = 'text-success';
                                                            $designer_text = 'UnBlock';
                                                            $designer_icons = 'fa fa-check fa-2x text-success';
                                                            $designer_message = 'Block';
                                                        endif;
                                                        ?>
                                                        <td>
                                                            <a href="<?= Router::url(['controller' => 'Designers', 'action' => 'view', $designer->id]); ?>"><span class="fa fa-eye fa-2x text-primary"></span></a>
                                                            <a href="<?= Router::url(['controller' => 'Designers', 'action' => 'delete', $designer->id]); ?>"><span class="fa fa-trash fa-2x text-danger"></span></a>
                                                            <?php echo $this->Html->link(__('<i style="font-style: normal;" class="' . $designer_icons . '"></i>'), ['controller' => 'Managers', 'action' => 'statusChange', $designer->id, $designer->status], ['confirm' => __('Are you sure you want to ' . $designer_message . ' this employee ?', $designer->id), 'escape' => FALSE]) ?>&nbsp;&nbsp;                                            
                                                        </td>
                                                    </tr>        
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane content-datatable datatable-width" id="designs_queue_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Description</th>                           
                                                    <th>Customer Id</th>                           
                                                    <th>Customer Name</th>                           
                                                    <th>Designer Assigned</th>                           
                                                    <th>Design Preview</th>
                                                    <th>Design Status</th>
                                                    <th>Date Requested</th>
                                                    <th>Action</th>                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($designs_queue as $request): ?>
                                                    <tr>
                                                        <td><?= $request->id ?></td>
                                                        <td><?= $request->title ?></td>
                                                        <td><?= $request->description ?></td>  
                                                        <td><?= ($request->customer) ? $request->customer->id : '' ?></td>  
                                                        <td><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
                                                        <td><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  
                                                        <td>
                                                            <?php
                                                            if ($request->attachment):
                                                                $img_path = REQUEST_IMG_PATH . DS . $request->id . DS . $request->profile_picture;
    //                                        echo $this->Html->image($img_path, ['class' => 'img img-responsive img-small']);
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <td><?= ($request->status) ? $request->status : '' ?></td>
                                                        <td><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?></td>  
                                                        <td>
                                                            <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">
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
                                        <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Title</th>
                                                    <th>Description</th>                           
                                                    <th>Customer Id</th>                           
                                                    <th>Customer Name</th>                           
                                                    <th>Designer Assigned</th>                           
                                                    <th>Design Preview</th>
                                                    <th>Date Requested</th>
                                                    <th>Action</th>                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($designs_approved as $request): ?>
                                                    <tr>
                                                        <td><?= $request->id ?></td>
                                                        <td><?= $request->title ?></td>
                                                        <td><?= $request->description ?></td>  
                                                        <td><?= ($request->customer) ? $request->customer->id : '' ?></td>  
                                                        <td><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
                                                        <td><?= ($request->designer) ? $request->designer->first_name . ' ' . $request->designer->last_name : '' ?></td>  
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
                                                            <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'view', $request->id]); ?>">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
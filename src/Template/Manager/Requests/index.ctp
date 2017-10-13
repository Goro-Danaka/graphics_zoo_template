<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">View Manager</h2>

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
                <h4 class="page-content-title">Designs</h4>
                <div class="divider15"></div>
                <div class="nav-tab-pills-image">
                    <ul class="nav nav-tabs" role="tablist">                      
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#designs_request_tab" role="tab">
                                <i class="icon icon_cog"></i>Design Requests
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
                        <div class="tab-pane active content-datatable datatable-width" id="designs_request_tab" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
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
                                            <?php foreach ($requested_designs as $request): ?>
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
                                    <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
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
                                            <?php foreach ($approved_designs as $request): ?>
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
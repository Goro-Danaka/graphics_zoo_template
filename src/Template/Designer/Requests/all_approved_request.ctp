<?php

use Cake\Routing\Router;
?>

<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Designer Dashboard</h4>
        </div>
        <div class="card">
            <div class="padding-20">
            </div>
            <div class="tab-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Approved Requests</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="table-overflow">
                                                <table  class="table table-lg table-hover dt-opt">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Title</th>
                                                            <th>Description</th>  
                                                            <th>No. of New Messages(<?= $total_unread_message ?>)</th>                          
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
                                                                <td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
                                                                 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
                                                                        <?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
                                                                <?php } ?></td>
                                                               
                                                                <td>
                                                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">
                                                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
                                                                    </a>
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

<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">
    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">All Billing Information</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon="î�´"></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">

        <div class="row">
            <div class="col-md-12">
                <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Card Type</th>
                            <th>Card No</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                VISA
                            </td>
                            <td>xxxx-xxxx-xxxx-4652</td>
<!--                                <td>
                                <a href="<?php // echo Router::url(['controller' => 'Customers', 'action' => 'viewPendingRequest', $request->id]);             ?>">
                                    <span class="fa fa-eye fa-2x text-primary"></span>
                                </a>
                            </td>-->
                            <td>
                                <a href="#">
                                    <span class="fa fa-trash fa-2x text-danger"></span>&nbsp;&nbsp;
                                </a>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'editPaymentOptions']); ?>">
                                    <span class="fa fa-edit fa-2x text-primary"></span>
                                </a>
                            </td>
                        </tr>        
                        <tr>
                            <td>2</td>
                            <td>
                                MasterCard
                            </td>
                            <td>xxxx-xxxx-xxxx-4686</td>
<!--                                <td>
                                <a href="<?php // echo Router::url(['controller' => 'Customers', 'action' => 'viewPendingRequest', $request->id]);             ?>">
                                    <span class="fa fa-eye fa-2x text-primary"></span>
                                </a>
                            </td>-->
                            <td>
                                <a href="#">
                                    <span class="fa fa-trash fa-2x text-danger"></span>&nbsp;&nbsp;
                                </a>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'editPaymentOptions']); ?>">
                                    <span class="fa fa-edit fa-2x text-primary"></span>
                                </a>
                            </td>
                        </tr>        
                        <tr>
                            <td>3</td>
                            <td>
                                VISA
                            </td>
                            <td>xxxx-xxxx-xxxx-4886</td>
<!--                                <td>
                                <a href="<?php // echo Router::url(['controller' => 'Customers', 'action' => 'viewPendingRequest', $request->id]);             ?>">
                                    <span class="fa fa-eye fa-2x text-primary"></span>
                                </a>
                            </td>-->
                            <td>
                                <a href="#">
                                    <span class="fa fa-trash fa-2x text-danger"></span>&nbsp;&nbsp;
                                </a>
                                <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'editPaymentOptions']); ?>">
                                    <span class="fa fa-edit fa-2x text-primary"></span>
                                </a>
                            </td>
                        </tr>        
                    </tbody>
                </table>
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
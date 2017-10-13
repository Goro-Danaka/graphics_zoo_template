<?php

use Cake\Routing\Router;
?>

<div class="main-content">
    <div class="container-fluid">

        <div class="content content-datatable datatable-width">       
            <div class="row">
                <div class="col-md-12">
                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <!--<th>Profile</th>-->
                                <th>Company Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Plan</th>
                                <!--<th>Designer Assigned</th>-->
                                <th>Action</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($customers as $k => $customer): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <!--<td>
                                        <?php
                                        $img_path = '';
                                        $img_path = @$customer->profile_picture_url;
                                        if ($img_path):
                                            echo $this->Html->image($img_path, ['class' => 'img img-responsive img-small']);
                                        endif;
                                        ?>
                                    </td>-->
                                    <td><?= $customer->company_name ?></td>
                                    <td><?= $customer->first_name ?></td>
                                    <td><?= $customer->last_name ?></td>
                                    <td><?= $customer->email ?></td>
                                    <td><?= $customer->phone ?></td>
                                    <td><?= $customer->current_plan_name ?></td>
                                    <?php
                                    $user_status = '';
                                    $user_text = '';
                                    $user_message = '';
                                    if ($customer->status == STATUS_DEACTIVE):
                                        $user_status = 'text-danger';
                                        $user_text = 'Block';
                                        $user_icons = 'fa fa-times fa-2x text-danger';
                                        $user_message = 'UnBlock';
                                    elseif ($customer->status == STATUS_ACTIVE):
                                        $user_status = 'text-success';
                                        $user_text = 'UnBlock';
                                        $user_icons = 'fa fa-check fa-2x text-success';
                                        $user_message = 'Block';
                                    endif;
                                    ?>   
                                    <!--<td><?= ($customer->designer) ? $customer->designer->full_name : ''; ?></td>-->
                                    <td>
                                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'view', $customer->id]); ?>"><span class="fa fa-eye fa-2x text-primary"></span></a>
                                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'delete', $customer->id]); ?>"><span class="fa fa-trash fa-2x text-danger"></span></a>
                                        <a href="<?= Router::url(['controller' => 'Customers', 'action' => 'edit', 'prefix' => 'admin', $customer->id]); ?>"><span class="fa fa-pencil fa-2x text-info"></span></a>
                                            <?php echo $this->Html->link(__('<i style="font-style: normal;" class="' . $user_icons . '"></i>'), ['controller' => 'Customers', 'action' => 'statusChange', $customer->id, $customer->status], ['confirm' => __('Are you sure you want to ' . $user_message . ' this customer ?', $customer->id), 'escape' => FALSE]) ?>                                     
                                    </td>
                                </tr>        
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
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
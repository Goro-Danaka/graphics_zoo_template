<?php

use Cake\Routing\Router;
?>
<div class="main-content">
    <div class="container-fluid">

        <div class="content content-datatable datatable-width">
            <?= $this->Flash->render(); ?>
            <div class="row">
                <div class="col-md-12">
                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Profile</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Manager Assigner</th>
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
                                    <td><?= ($designer->manager) ? $designer->manager->first_name . ' ' . $designer->manager->last_name : '' ?></td>
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
                                        <a href="<?= Router::url(['controller' => 'Designers', 'action' => 'edit', 'prefix' => 'admin', $designer->id]); ?>"><span class="fa fa-pencil fa-2x text-info"></span></a>
                                        <?php echo $this->Html->link(__('<i style="font-style: normal;" class="' . $designer_icons . '"></i>'), ['controller' => 'Designers', 'action' => 'statusChange', $designer->id, $designer->status], ['confirm' => __('Are you sure you want to ' . $designer_message . ' this employee ?', $designer->id), 'escape' => FALSE]) ?>&nbsp;&nbsp;                                            
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
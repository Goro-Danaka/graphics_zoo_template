<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">
    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Managers</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">
        <div class="row">
            <?= $this->Flash->render(); ?>
            <div class="col-md-12">
                <table data-plugin="datatable" data-responsive="true" class="custom-table table table-striped table-hover dt-responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Profile</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($managers as $manager): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td>
                                    <?php
                                    $img_path = '';
                                    $img_path = @$manager->profile_picture_url;
                                    if ($img_path):
                                        echo $this->Html->image($img_path, ['class' => 'img img-responsive img-small']);
                                    endif;
                                    ?>
                                </td>
                                <td><?= $manager->first_name ?></td>
                                <td><?= $manager->last_name ?></td>
                                <td><?= $manager->email ?></td>
                                <td><?= $manager->phone ?></td>
                                <?php
                                $manager_status = '';
                                $manager_text = '';
                                $manager_message = '';
                                if ($manager->status == STATUS_DEACTIVE):
                                    $manager_status = 'text-danger';
                                    $manager_text = 'Block';
                                    $manager_icons = 'fa fa-times fa-2x text-danger';
                                    $manager_message = 'UnBlock';
                                elseif ($manager->status == STATUS_ACTIVE):
                                    $manager_status = 'text-success';
                                    $manager_text = 'UnBlock';
                                    $manager_icons = 'fa fa-check fa-2x text-success';
                                    $manager_message = 'Block';
                                endif;
                                ?>                                                                                                       
                                <td>
                                    <a href="<?= Router::url(['controller' => 'Admins', 'action' => 'viewManager', $manager->id]); ?>"><span class="fa fa-eye fa-2x text-primary"></span></a>
                                    <a href="<?= Router::url(['controller' => 'Admins', 'action' => 'deleteManager', $manager->id]); ?>"><span class="fa fa-trash fa-2x text-danger"></span></a>
                                    <?php echo $this->Html->link(__('<i style="font-style: normal;" class="' . $manager_icons . '"></i>'), ['controller' => 'Admins', 'action' => 'statusChange', $manager->id, $manager->status], ['confirm' => __('Are you sure you want to ' . $manager_message . ' this manager ?', $manager->id), 'escape' => FALSE]) ?>&nbsp;&nbsp;                                            
                                </td>
                            </tr>        
                        <?php endforeach; ?>
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
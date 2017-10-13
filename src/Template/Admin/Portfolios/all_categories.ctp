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
                                <th>name</th>                                                    
                                <!--<th>Current Status</th>-->
                                <th>Action</th>                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($portfolioCategories as $portfolioCategory): ?>
                                <tr>
                                    <td><?= $portfolioCategory->id ?></td>                               
                                    <td><?= $portfolioCategory->name ?></td>
                                    <td>
        <!--                                    <a href="<?php // echo Router::url(['controller' => 'Portfolios', 'action' => 'view', $designer->id]);      ?>"><span class="fa fa-eye fa-2x text-primary"></span></a>
                                        <?php // echo $this->Html->link(__('<i style="font-style: normal;" class="' . $designer_icons . '"></i>'), ['controller' => 'Designers', 'action' => 'statusChange', $designer->id, $designer->status], ['confirm' => __('Are you sure you want to ' . $designer_message . ' this employee ?', $designer->id), 'escape' => FALSE]) ?>&nbsp;&nbsp;                                            -->
                                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'editCategory', 'prefix' => 'admin', $portfolioCategory->id]); ?>"><span class="fa fa-pencil fa-2x text-info"></span></a>
                                            <?php echo $this->Form->postLink(__('<span class="fa fa-trash-o fa-2x text-danger"></span>'), ['controller' => 'Portfolios', 'action' => 'deletePortfolioCategory', $portfolioCategory->id], ['escape' => FALSE, 'confirm' => 'Are you sure to delete?']) ?>

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
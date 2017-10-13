<?php

use Cake\Routing\Router;
?>
<div class="main-content">
    <div class="container-fluid">
        <div class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                                   
                    <div class="divider15"></div>
                    <div class="tab-content">
                        <div class="tab-pane active content-datatable datatable-width" id="designs_request_tab" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <table data-responsive="true" class="custom-table table table-striped table-hover dt-responsive dt-opt">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Body</th>                           
                                                <th>Portfolio Category</th>                           
                                                <th>Featured Image</th>                           
                                                <th>Action</th>                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($portfolios as $key => $portfolio): ?>                                         
                                                <tr>
                                                    <td><?= $portfolio->id ?></td>
                                                    <td><?= $portfolio->title ?></td>
                                                    <td><?= $portfolio->body ?></td>  
                                                    <td><?= $portfolio->portfolio_category->name ?></td>  
                                                    <td>
                                                        <?php
                                                        $featured_image_url = '';
                                                        $featured_image_url = $this->Custom->getPortfolioFeaturedImageUrlUsingObj($portfolio);
                                                        if ($featured_image_url):
                                                            echo $this->Html->image($featured_image_url, ['class' => 'img img-responsive img-small']);
                                                        endif;
                                                        ?>                                                    
                                                    </td>
                                                    <td>
        <!--                                                    <a href="<?php // echo Router::url(['controller' => 'Portfolios', 'action' => 'viewPortfolioImage', $portfolio->id]);                                      ?>">
                                                            <span class="fa fa-eye fa-2x text-primary"></span>
                                                        </a> &nbsp;-->
                                                        <a href="<?= Router::url(['controller' => 'Portfolios', 'action' => 'editPortfolio', 'prefix' => 'admin', $portfolio->id]); ?>"><span class="fa fa-pencil fa-2x text-info"></span></a>
                                                            <?php echo $this->Form->postLink(__('<span class="fa fa-trash-o fa-2x text-danger"></span>'), ['controller' => 'Portfolios', 'action' => 'deletePortfolioImages', $portfolio->id], ['escape' => FALSE, 'confirm' => 'Are you sure to delete?']) ?>
                                                    </td>   

                                                </tr>        
                                                <?php
                                            endforeach;
                                            ?>
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
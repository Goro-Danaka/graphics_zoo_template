<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">View Request</h2>

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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#designs_tab" role="tab">
                                <i class="icon icon_cog"></i>Designs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#communication_tab" role="tab">
                                <i class="icon icon_cog"></i>Communication
                            </a>
                        </li>
                    </ul>
                    <div class="divider15"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="info_tab" role="tabpanel">
                            <div class="content-datatable datatable-width">
                                <div class="all-form-section">
                                    <div class="row">               
                                        <div class="element-form col-md-12">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                <label>Title</label>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <?= $request->title ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="element-form col-md-12">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <?= $request->description ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="element-form">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                <label>Use Type</label>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <?= $request->work_type ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="element-form col-md-12">
                                            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                <label>Attachment</label>
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php
                                                            if ($request_customer_files):
                                                                if ($request_customer_files[0]['file_name']):
                                                                    $attachment_path = REQUEST_IMG_URL . $request->id . DS . $request_customer_files[0]['file_name'];
                                                                endif;
                                                            endif;
                                                            ?>
                                                            <input type="file" class="dropify" data-plugin="dropify" data-height="350" disabled="disabled" data-default-file="<?= $attachment_path ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>               

                                        <div class="element-form col-md-12">
                                            <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                            <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                <!--                                                <a class="btn btn-success flat-buttons waves-effect waves-button">Accept As Complete</a>
                                                                                                <a class="btn btn-info flat-buttons waves-effect waves-button">Request A Revision</a>
                                                                                                <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel Request</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="designs_tab" role="tabpanel">
                            <div class="row">

                            </div>
                        </div>

                        <div class="tab-pane" id="communication_tab" role="tabpanel">
                            <div class="message-page vertion-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12">
                                        <div class="row message-rightbar">
                                            <div class="row">                                                
                                                <div class="discussion_container">

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


<script>
    jQuery(document).ready(function ($) {
        refresh_chat_container_for_admin('<?= $request->id ?>');
    });
</script>


<?= $this->end('script'); ?>
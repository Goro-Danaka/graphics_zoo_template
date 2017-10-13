<?php

use Cake\Routing\Router;
?>
<style type="text/css">
    .element-form {
        width: 100%;
    }
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="content content-datatable datatable-width">
            <?= $this->Flash->render(); ?>
            <?= $this->Form->create($post, ['type' => 'file']); ?>
            <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
            <div class="all-form-section">
                <div class="row">                

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Title</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('title', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Description</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                               
                      <?= $this->Form->control('body', ['type' => 'textarea', 'class' => 'form-control', 'id'=>'editors', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>              
                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Attachment</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">

                                        <?php $attachment_path = $this->Custom->getPostFeaturedImageUrlUsingObj($post) ?>
                                        <?= $this->Form->control('post_image', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200', 'data-default-file' => $attachment_path]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                            <?= $this->Form->button('Edit Posts', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<?= $this->start('script'); ?>
<?= $this->Html->script('https://cdn.ckeditor.com/4.7.2/full/ckeditor.js'); ?>
<script>
    jQuery(document).ready(function () {
    CKEDITOR.replace('editors');
        // $('.customer_list').on('change', function () {
            // var customer_id = $(this).val();
            // if (customer_id !== "0") {
                // $.ajax({
                    // url: "<?= Router::url(['controller' => 'App', 'action' => 'getDesignerOfCustomer', 'prefix' => FALSE], TRUE) ?>",
                    // type: 'POST',
                    // data: {
                        // customer_id: customer_id
                    // },
                    // dataType: 'json',
                    // success: function (data, textStatus, jqXHR) {
                        // if (data.designer_id != '') {
                            // $('.designer_list').val(data.designer_id);
                        // } else {
                            // $('.designer_list').val("0");
                        // }
                    // }

                // });
            // } else {
                // $('.designer_list').val("0");
            // }
        // });
    });
</script>
<?= $this->end('script'); ?>


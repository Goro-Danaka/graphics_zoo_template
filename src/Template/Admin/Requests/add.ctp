<?php

use Cake\Routing\Router;
?>
<style>
    .element-form {
        width: 100%;
    }
</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="content content-datatable datatable-width">
            <?= $this->Flash->render(); ?>
            <?= $this->Form->create($request, ['type' => 'file', 'style' => 'width:100%;']); ?>
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
                            <label>Customer</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('customer_id', ['options' => $customer_list, 'empty' => ['0' => 'Please Select Customer'], 'class' => 'form-control select2 customer_list', 'label' => FALSE, 'required']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Designer</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('designer_id', ['options' => $designer_list, 'empty' => ['0' => 'Please Select Designer'], 'class' => 'form-control select2 designer_list', 'label' => FALSE, 'disabled']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Description</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Use Type</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('work_type', ['options' => ['print' => 'Print', 'web' => 'Web'], 'class' => 'form-control select2', 'label' => FALSE]) ?>
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
                                        <?= $this->Form->control('file', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                            <?= $this->Form->button('Add Request', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                        </div>
                    </div>
                </div>
            </div>

            <?= $this->Form->end(); ?>
        </div>
    </div>
</div>

<?= $this->start('script'); ?>
<script>
    jQuery(document).ready(function () {
        $('.customer_list').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id !== "0") {
                $.ajax({
                    url: "<?= Router::url(['controller' => 'App', 'action' => 'getDesignerOfCustomer', 'prefix' => FALSE], TRUE) ?>",
                    type: 'POST',
                    data: {
                        customer_id: customer_id
                    },
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.designer_id != '') {
                            $('.designer_list').val(data.designer_id);
                        } else {
                            $('.designer_list').val("0");
                        }
                    }

                });
            } else {
                $('.designer_list').val("0");
            }
        });
    });
</script>
<?= $this->end('script'); ?>
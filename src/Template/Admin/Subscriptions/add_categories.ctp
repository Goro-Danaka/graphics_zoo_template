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
            <?= $this->Form->create(' ', ['type' => 'file']); ?>
            <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
            <div class="all-form-section">
                <div class="row">                

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>ID</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('id', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Price</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
    						
                                <?= $this->Form->control('currency', ['type'=>'hidden','value'=>'usd','class' => 'form-control', 'label' => FALSE]) ?>
                            
                        </div>
                    </div>
    <?php $groups = array(""=>"Select","month"=>"Per Month","year"=>"Per Year"); ?>				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Per Month/Per Year</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
    							<?= $this->Form->control('interval', ['options' => $groups, 'class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Days</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('trial_period_days', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Turn Around Days</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('turn_around_days', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    	<!---			<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Description</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('description', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div> --->

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                            <?= $this->Form->button('Add Category', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
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
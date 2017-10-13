<?php

use Cake\Routing\Router;
?>
<?= $this->start('css'); ?>
<?= $this->Html->css('/assets/global/plugins/bootstrap-select/dist/css/bootstrap-select.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/select2/dist/css/select2.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/jt.timepicker/jquery.timepicker.css'); ?>
<?= $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'); ?>
<?= $this->Html->css('/assets/global/plugins/flatpickr/dist/flatpickr.min.css'); ?> 
<?= $this->end('css'); ?>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Change Password</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Home</a>
            </li>
            <!--<li class="breadcrumb-item"><a href="#">Options</a></li>-->
            <li class="breadcrumb-item active">Change Password</li>
        </ol>

    </div>
    <div class="content col-md-6">
        <div class="general-elements-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="nav-tab-horizontal">
                        <div class="divider15"></div>
                        <!--<h4 class="page-content-title">Default validators</h4>-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="default-validators" role="tabpanel">
                                <div class="element-margin-bottom">
                                    <?= $this->Flash->render(); ?>
                                    <!--<p>The default features of this plugin doesn't require you to load any module. Here you can try out a complete form with all default validators present.</p>-->
                                    <!--<form action="#" method="POST">-->
                                    <?= $this->Form->create(); ?>                                   
                                    <label>New Password</label>
                                    <div class="form-group">
                                        <?= $this->Form->input('new_password', ['type' => 'password', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter New Password", 'label' => FALSE]); ?>
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="form-group">
                                        <?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Confirm New Password", 'label' => FALSE]); ?>
                                    </div>
                                    <div class="form-group">
                                        <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                        <?= $this->Form->submit('Change', ['class' => 'btn btn-primary site-btn']) ?>
                                    </div>
                                    <!--</form>-->
                                    <?= $this->Form->end(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?= $this->start('script'); ?>

<?= $this->Html->script('/assets/global/plugins/bootstrap-select/dist/js/bootstrap-select.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/select2/dist/js/select2.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/typeahead.js/dist/typeahead.jquery.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/typeahead.js/dist/bloodhound.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') ?>
<?= $this->Html->script('/assets/global/plugins/moment/min/moment.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/jt.timepicker/jquery.timepicker.min.js'); ?>
<?= $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>
<?= $this->Html->script('/assets/global/plugins/flatpickr/dist/flatpickr.min.js'); ?>
<?= $this->Html->script('/assets/global/js/global/advanced_elements.js'); ?>

<?= $this->end('script'); ?>

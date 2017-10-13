<?php

use Cake\Routing\Router;
?>
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

                                    <?= $this->Form->create($admin, ['class' => 'change_password_form']); ?>
                                    <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                    <label>Old Password</label>
                                    <div class="form-group">
                                        <?= $this->Form->input('old_password', ['type' => 'password', 'id' => 'old_password', 'class' => 'form-control', 'placeholder' => "Enter old Password", 'label' => FALSE]); ?>
                                    </div>
                                    <label>New Password</label>
                                    <div class="form-group">
                                        <?= $this->Form->input('new_password', ['type' => 'password', 'id' => 'new_password', 'class' => 'form-control', 'placeholder' => "Enter New Password", 'label' => FALSE]); ?>
                                    </div>
                                    <label>Confirm Password</label>
                                    <div class="form-group">
                                        <?= $this->Form->input('confirm_password', ['type' => 'password', 'id' => 'confirm_password', 'class' => 'form-control', 'placeholder' => "Enter Confirm New Password", 'label' => FALSE]); ?>
                                    </div>
                                    <div class="form-group">
                                        <?= $this->Form->submit('Change', ['class' => 'btn btn-primary site-btn']) ?>
                                    </div>

                                    <?= $this->Form->end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
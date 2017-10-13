<?php

use Cake\Routing\Router;
?>

<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Customer Dashboard</h4>
        </div>
        <div class="card">
            <div class="padding-20">
                <h4 class="card-title no-mrg-btm">Settings</h4>
            </div>
            <div class="tab-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">Edit Profile</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="element-margin-bottom">
                                    <?= $this->Flash->render(); ?>

                                            <?= $this->Form->create($designer, ['class' => 'change_password_form']); ?>
                                            <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Old Password</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('old_password', ['type' => 'password', 'id' => 'old_password', 'class' => 'form-control', 'placeholder' => "Enter old Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                             <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">New Password</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('new_password', ['type' => 'password', 'id' => 'new_password', 'class' => 'form-control', 'placeholder' => "Enter New Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Confirm Password</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('confirm_password', ['type' => 'password', 'id' => 'confirm_password', 'class' => 'form-control', 'placeholder' => "Enter Confirm New Password", 'label' => FALSE, 'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                                <div class="form-group" style="text-align: center;">
                                                    <?= $this->Form->submit('Change Password', ['class' => 'btn btn-primary site-btn','style'=>'border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
                                                </div>
                                            </div>
                                    
                                            <?= $this->Form->end(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-2">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="element-margin-bottom">
                                        <?php
                                        $firstname = $designer->first_name;
                                        $lastname = $designer->last_name;
                                        $phone = $designer->phone;
                                        ?>
                                            <?= $this->Flash->render(); ?>
                                            <!--<p>The default features of this plugin doesn't require you to load any module. Here you can try out a complete form with all default validators present.</p>-->
                                            <!--<form action="#" method="POST">-->
                                            <?= $this->Form->create(); ?>
                                           <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">First Name</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                <!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
                                                <?= $this->Form->input('firstname', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter old Password", 'value' => $firstname, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Last Name</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                <?= $this->Form->input('lastname', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter New Password", 'value' => $lastname, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                             <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Phone</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                <?= $this->Form->input('phone', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Confirm New Password", 'value' => $phone, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-7">
                                                <div class="form-group" style="text-align: center;">
                                                <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                                <?= $this->Form->submit('Edit Profile', ['class' => 'btn btn-primary site-btn', 'name' => 'update_profile','style'=>'border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
                                                </div>
                                            </div>
                                            <!--</form>-->
                                            <?= $this->Form->end(); ?>
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

<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">
	<div class="site-content-title" style="background:white;">
        <h2 class="float-xs-left content-title-main">Change Password</h2>
	<!--	<a href="<?= Router::url(['controller' => 'Users', 'action' => 'logout', 'prefix' => FALSE], TRUE); ?>">
		<button class="btn btn-default" style="background: #3e3c3c;float: right;border-radius: 7px;margin: 15px;padding-left: 25px;padding-right: 25px;margin-right: 65px;">Log Out</button>
		</a> -->
        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
  <div class="content"  style="background:aliceblue;border-top: none;">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                
                <div class="nav-tab-pills-image" style="background: white;">
                    <ul class="nav nav-tabs" role="tablist" style="background: aliceblue;">
                        <li class="nav-item">
                            <a class="nav-link myactiveclass active" data-toggle="tab" href="#change_password" role="tab" style="border-radius: 21px 21px 0px 0px;">
                                 <img style="width:20px;margin-right: 10px;" src="<?= REQUEST_IMG_URL ?>image/lock.png"></img>Change Password
                            </a>
                        </li>
                        <li class="nav-item" style="margin-left:0px;">
                            <a class="nav-link myactiveclass" data-toggle="tab" href="#edit_profile" role="tab" style="border-radius: 21px 21px 0px 0px;background: #cbced3;color:#fff">
								<img style="width:20px;margin-right: 10px;" src="<?= REQUEST_IMG_URL ?>image/user.png"></img>Edit Profile
                            </a>
                        </li>
                    </ul>
                    <div class="divider15"></div>
                    <div class="tab-content">
	
	
	<div class="tab-pane active" id="change_password" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
    <div class="content col-md-8" style="box-shadow: none;">
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
											<?= $this->Form->input('confirm_password', ['type' => 'password', 'id' => 'confirm_password', 'class' => 'form-control', 'placeholder' => "Enter Confirm New Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
										<div>
										<div class="form-group">
											<?= $this->Form->submit('Change Password', ['class' => 'btn btn-primary site-btn','style'=>'width: 100%;border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
										</div>
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
	
	</div>
	</div>
	</div>
	</div>
	</div>
 <div class="tab-pane" id="edit_profile" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
    <div class="content col-md-8" style="box-shadow: none;">
        <div class="general-elements-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="nav-tab-horizontal">
                        <div class="divider15"></div>
                        <!--<h4 class="page-content-title">Default validators</h4>-->
                        <div class="tab-content">
                            <div class="tab-pane active" id="default-validators" role="tabpanel">
                                <div class="element-margin-bottom">
								<?php
								$firstname = $admin->first_name;
								$lastname = $admin->last_name;
								$phone = $admin->phone;
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
										<div class="form-group">
                                        <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                        <?= $this->Form->submit('Edit Profile', ['class' => 'btn btn-primary site-btn', 'name' => 'update_profile','style'=>'width: 100%;border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
										</div>
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
                                </div>
                            </div>
                        </div>
						 </div>
                            </div>
                        </div>
						 </div>
                            </div>
</section>
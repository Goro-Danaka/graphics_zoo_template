<?php

?>
<div class="main-content">
    <div class="container-fluid">
    	
    	<div class="content" style="background:aliceblue;border-top: none;">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                
                    <div class="nav-tab-pills-image" style="background: white;">
                        <ul class="nav nav-tabs" role="tablist" style="background: aliceblue;">                      
                            
                            <li class="nav-item active" style="margin-left:0px;">
                                <a class="nav-link myactiveclass" data-toggle="tab" data-id="edit_profile" href="#edit_profile" role="tab" style="border-radius: 21px 21px 0px 0px;background: #cbced3;color:#fff">
                                   <img style="width:20px;margin-right: 10px;" src="<?= REQUEST_IMG_URL ?>image/user.png"></img>Edit Profile
                                </a>
                            </li>
    						<li class="nav-item" style="margin-left:0px;">
                                <a class="nav-link myactiveclass" data-toggle="tab" href="#billing" role="tab" data-id="billing" style="border-radius: 21px 21px 0px 0px;    background: #cbced3;color:#fff">
                                    <img style="width:20px;margin-right: 10px;" src="<?= REQUEST_IMG_URL ?>image/setting.png"></img>Billing
                                </a>
                            </li>
                        </ul>
                        <div class="divider15"></div>
                        <div class="tab-content">
                            

                            <div class="tab-pane active" id="edit_profile" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
        <div class="content col-md-8" style="box-shadow: none;">
            <div class="general-elements-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="nav-tab-horizontal">
                            <div class="divider15"></div>
                            <!--<h4 class="page-content-title">Default validators</h4>-->
                            <?= $this->Flash->render(); ?>
            <div class="all-form-section">
                <div class="row">                
                    <?= $this->Form->create($customer, ['type' => 'file', 'style' => 'width:100%;']); ?>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Company Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('company_name', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>First Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('first_name', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Last Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('last_name', ['class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Current Plan</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('user_current_plan', ['options' => $subscription, 'class' => 'form-control', 'label' => FALSE, 'value'=>$planid]) ?>
                            </div>
                        </div>
                    </div>
    				
    				<div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Designer</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('designer_id', ['options' => $designer_list , 'empty' => ['0' => 'Please Select Designer'], 'class' => 'form-control', 'label' => FALSE, 'value'=>$customer->designer_id]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Email</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('email', ['type' => 'email', 'class' => 'form-control', 'label' => FALSE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Profile Picture</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                        if ($customer->profile_picture_url):
                                            echo $this->Html->image($customer->profile_picture_url, ['class' => 'img img-responsive img-medium']);
                                            echo '<div class="divider15"></div>';
                                        endif;
                                        ?>
                                        <?= $this->Form->control('profile_picture1', ['type' => 'file', 'data-height' => '200', 'data-plugin' => 'dropify', 'class' => 'dropify', 'label' => FALSE]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                            <?= $this->Form->submit('Edit Customer', ['class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
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
    						
    						<div class="tab-pane" id="billing" role="tabpanel" style="background: white;padding: 16px;">
                                <div class="row">
                                    <div class="col-md-12">
    								 <?= $this->Flash->render(); ?>
    									<h2>Change Your Billing Detail</h2>
    									
    									<label>Change Billing Detail</label>
    									
    									<div class="container">
    									<div class="row" style="margin: 0 20% 10px 20%;border: 1px solid;padding: 23px;    color: #000;">
    										<div class="form-group">
    											<!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
    											 <label>XXXX XXXX XXXX <?= $carddetails['last4'] ?></label>
    										</div>
    										
    										<div class="form-group">
    											<!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
    											<div style="float:left;">
    											 <label><?= $carddetails['exp_month'] ?>/<?= $carddetails['exp_year'] ?></label>
    											 </div>
    										
    											<!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
    											<div style="float:right;">
    												 <label style="font-size: 25px;font-weight: 600;"><?= $carddetails['brand'] ?></label>
    											</div>	 
    										</div>
    									</div>
    									</div>
    									<?= $this->Form->create(); ?>
    									
    									<div class="payment-method">
    										<h2 class="sign-up-form-heading">Payment Method</h2>
    										<div class="payment-method-inputs-wrapper">
    											<div class="payment-method-input" style="width: 50%;float: left;margin-bottom: 15px;padding: 0px 15px;">
    												<label style="display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;padding: 0px 5px;">Card Number</label>
    												<?= $this->Form->control('last4', ['type' => 'tel', 'id' => 'cc', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'XXXX XXXX XXXX XXXX', 'pattern' => '\d{4} \d{4} \d{4} \d{4}', 'required', 'maxlength'=>'16','style'=>'width: 100%;border-radius: 25px;color: #1A3147;border: 1px solid #1A3147;padding: 5px 15px;']) ?>
    												
    											</div>
    											<div class="payment-method-input exp_date" style="width: 28%;float: left;margin-bottom: 15px;padding: 0px 10px;">
    												<label style="padding: 0px 5px;display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">Exp Date</label>
    												<?= $this->Form->control('exp_month', ['type' => 'tel', 'id' => 'expiration1', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'MM/YYYY', 'pattern' => '(1[0-2]|0[1-9])\/\d\d\d\d', 'data-valid-example' => '11/2010', 'required','style'=>'width: 100%;border-radius: 25px;color: #1A3147;border: 1px solid #1A3147;padding: 5px 15px;']) ?>
    											</div>
    											<div class="payment-method-input" style="width: 22%;float: left;margin-bottom: 10px;padding: 0px 10px;">
    												<label style="padding: 0px 5px;display: inline-block;max-width: 100%;margin-bottom: 5px;font-weight: 700;">Card CVC</label>
    												<?= $this->Form->control('cvc', ['type' => 'tel', 'id' => 'tel', 'class' => 'textInput box_round4 transition masked', 'label' => FALSE, 'placeholder' => 'XXX', 'pattern' => '\\d{3}\\', 'required','style'=>'width: 100%;border-radius: 25px;color: #1A3147;border: 1px solid #1A3147;padding: 5px 15px;']) ?>
    											</div>
    											<label>Change Plan</label>
    										<div class="form-group">
    											<!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
    											<?= $this->Form->control('myplan', ['options' => $subscription, 'class' => 'form-control', 'label' => FALSE, 'value'=>$planid]) ?>
    										</div>
    										</div>
    										
    									</div>
    	 
    																		
    									 <div class="form-group">
                                            <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                            <?= $this->Form->submit('Change User Plan Details', ['class' => 'btn btn-primary site-btn', 'name' => 'change_plan']) ?>
    										<label><?= $carddetails['change_plan'] ?></label>
                                        </div>
    									<?= $this->Form->end(); ?>
                                    </div>
                                </div>
                            </div>
    						
    						
    						<div class="tab-pane" id="upgrade" role="tabpanel" style="background: white;padding: 16px;">
                                <div class="row">
                                    <div class="col-md-12">
    								 <?= $this->Flash->render(); ?>
    									<h2>Change Plan</h2>
    									<?= $this->Form->create(); ?>
    									<label>Change Plan</label>
                                        <div class="form-group">
                                            <!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
    										<?= $this->Form->control('myplan', ['options' => $subscription, 'class' => 'form-control', 'label' => FALSE, 'value'=>$planid]) ?>
                                        </div>
    									 <div class="form-group">
                                            <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                            <?= $this->Form->submit('Change My Plan', ['class' => 'btn btn-primary site-btn', 'name' => 'change_plan']) ?>
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

<?= $this->start('script') ?>
<?= $this->Html->script('../assets/input-masking/js/masking-input.js', ['data-autoinit' => 'true']); ?>
<?= $this->end('script') ?>
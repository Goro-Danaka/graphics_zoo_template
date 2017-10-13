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
                    <li class="nav-item">
                        <a href="#tab-primary-3" class="nav-link" role="tab" data-toggle="tab">Subscription</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-4" class="nav-link" role="tab" data-toggle="tab">Billing</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="element-margin-bottom">
                                        <?= $this->Flash->render(); ?>
                                        <!--<p>The default features of this plugin doesn't require you to load any module. Here you can try out a complete form with all default validators present.</p>-->
                                        <!--<form action="#" method="POST">-->
                                        <?= $this->Form->create(); ?>
                                        <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Old Password</label></div>
                                        <div class="col-xl-7">
                                            <div class="form-group">
                                                <!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
                                                <?= $this->Form->input('old_password', ['type' => 'password', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter old Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">New Password</label></div>
                                        <div class="col-xl-7">
                                            <div class="form-group">
                                                <?= $this->Form->input('new_password', ['type' => 'password', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter New Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Confirm Password</label></div>
                                        <div class="col-xl-7">
                                            <div class="form-group">
                                                <?= $this->Form->input('confirm_password', ['type' => 'password', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Confirm New Password", 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                            </div>
                                            <div class="form-group" style="text-align: center;">

                                                <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                                <?= $this->Form->submit('Change Password', ['class' => 'btn btn-primary site-btn' ,'name' => 'change_password','style'=>'border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
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
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-2">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="element-margin-bottom">
                                        <?php
                                        $firstname = $customer->first_name;
                                        $lastname = $customer->last_name;
                                        $phone = $customer->phone;
                                        $current_plan = $customer->current_plan;
                                        ?>
                                            <?= $this->Flash->render(); ?>
                                            <!--<p>The default features of this plugin doesn't require you to load any module. Here you can try out a complete form with all default validators present.</p>-->
                                            <!--<form action="#" method="POST">-->
                                            <?= $this->Form->create(); ?>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">First Name</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
                                                    <?= $this->Form->input('firstname', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter First Name", 'value' => $firstname, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Last Name</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('lastname', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Last Name", 'value' => $lastname, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Phone</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('phone', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Phone Number", 'value' => $phone, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>                                    
                                            <div class="col-xl-3"><label style="color: #000;float: right;margin-top: 5px;">Current Plan</label></div>
                                            <div class="col-xl-7">
                                                <div class="form-group">
                                                    <?= $this->Form->input('current_plan', ['type' => 'text', 'class' => 'form-control', 'data-validation' => 'required', 'placeholder' => "Enter Stripe ID", 'value' => $current_plan, 'label' => FALSE,'style'=>'border-radius: 20px;']); ?>
                                                </div>
                                            </div>
                                            <div class="col-xl-3"></div>
                                            <div class="col-xl-7">
                                                <div class="form-group" style="text-align: center;">
                                                    <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                                    <?= $this->Form->submit('Save Changes', ['class' => 'btn btn-primary site-btn', 'name' => 'update_profile','style'=>'border-radius: 20px;height: 40px;font-weight: 500;font-size: 17px;background: #ec1c41;border: none;']) ?>
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
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-3">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                   
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
                                                    </div>
                                                </div>
                 
                                                                                    
                                                 <div class="form-group">
                                                    <!--<button type="submit" class="btn btn-primary site-btn">Submit</button>-->
                                                    <?= $this->Form->submit('Change My Card Details', ['class' => 'btn btn-primary site-btn', 'name' => 'change_my_card_deatils']) ?>
                                                    <label><?= $carddetails['change_plan'] ?></label>
                                                </div>
                                                <?= $this->Form->end(); ?>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>       
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-4">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                             <?= $this->Flash->render(); ?>
                                                <h2>Change Plan</h2>
                                                <?= $this->Form->create(); ?>
                                                <label>Change Plan</label>
                                                <div class="form-group">
                                                    <!--<input type="text" class="form-control" data-validation="required" placeholder="Enter Category Name">-->
                                                    <?= $this->Form->control('myplan', ['options' => $subscription, 'class' => 'form-control', 'label' => FALSE, 'value'=>$plan['planid']]) ?>
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
</div>

<?= $this->start('script') ?>
<?= $this->Html->script('../assets/input-masking/js/masking-input.js', ['data-autoinit' => 'true']); ?>
<script>
// var url = document.location.toString();
// if (url.match('#')) {
    // jQuery('.nav-item a[href="#' + url.split('#')[1] + '"]').tab('show');
// }

// Change hash for page-reload
// $('.nav-item a').on('shown.bs.tab', function (e) {
    // window.location.hash = e.target.hash;
// })
$(document).ready(function() {
    $('.nav-tabs .nav-item a[href="#upgrade"]').tab('show')
});
</script> 
<?= $this->end('script') ?>

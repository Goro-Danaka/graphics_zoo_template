<section id="loginScreen" class="transition">	
    <div class="loginBox">
        <img src="<?= SITE_IMAGES_URL . 'streamaLogin.png' ?>">
        <p class="loginWith">Sign Up</p>
        <div id="userLogin">

            <?= $this->Form->create('', ['id' => '', 'class' => '']); ?>
            <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
            <div class="login-input-wrap">
                <?= $this->Form->control('first_name', ['type' => 'text', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'First Name']) ?>
                <?= $this->Form->control('last_name', ['type' => 'text', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'Last Name']) ?>
                <?= $this->Form->control('email', ['type' => 'email', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'Email']) ?>
                <?php // echo $this->Form->control('subscription_plans_id', ['type' => 'select', 'options' => $subscription_plan_list, 'empty' => ['' => 'Please select a subscription plan.'], 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'Email', 'value' => $selected_plan]) ?>
                <?= $this->Form->control('password', ['type' => 'password', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'Password']) ?>
                <?= $this->Form->control('confirm_password', ['type' => 'password', 'class' => 'textInput box_round4 transition', 'label' => FALSE, 'placeholder' => 'Confirm Password']) ?>
            </div>
            <div class="login-input-wrap">
                <input type="submit" value="SignUp" class="submit box_round4 transition">
            </div>
            <?= $this->Form->end(); ?>            
        </div>
    </div> 
</section>
<div class="login_v2_form text-xs-center">
    <i class="login_v2_profile_icon icon icon_lock"></i>
    <h5>Reset your account Password</h5>
    <?= $this->Flash->render() ?>
    <?= $this->Form->create('', ['id' => 'form-validation']); ?>
    <div class="login_v2_text_field">
        <?=
        $this->Form->input('password', [
            "class" => "form-control",
            "typt" => "password",
            "placeholder" => "Enter New Password",
            "autocomplete" => "on",
            "label" => false,
            "required" => "Required",
            "id" => "email"
        ]);
        ?>  
        <i class="icon icon_lock"></i>
    </div>
    <div class="login_v2_text_field">
        <?=
        $this->Form->input('confirm_password', [
            "class" => "form-control",
            "type" => "password",
            "placeholder" => "Enter Confirm New Password",
            "autocomplete" => "on",
            "label" => false,
            "required" => "Required",
            "id" => "email"
        ]);
        ?>  
        <i class="icon icon_lock"></i>
    </div>
    <div class="login_v2_forget_text">
        <!--<a href="forgot_password_v2.php">Forgot password?</a>-->
        <?php //  $this->Html->link(__('Cancle'), ['controller' => 'Users', 'action' => 'login',], ['escape' => false]) ?>
    </div>
    <!--<button type="submit" class="btn btn-primary btn-block">Sign in</button>-->
    <?= $this->Form->submit('Chanege', ['value' => 'Submit', 'class' => 'btn btn-primary btn-block', 'type' => 'submit']); ?>

    <?= $this->Form->end(); ?>
</div>
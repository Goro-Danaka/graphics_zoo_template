<div class="login_v2_form text-xs-center">
    <i class="login_v2_profile_icon icon icon_lock"></i>
    <h5>Sign into your account</h5>
    <?= $this->Flash->render() ?>
    <?= $this->Form->create('', ['id' => 'form-validation']); ?>
    <div class="login_v2_text_field">
        <?=
        $this->Form->input('email', [
            "class" => "form-control",
            "placeholder" => "Enter Email",
            "autocomplete" => "on",
            "label" => false,
            "required" => "Required",
            "id" => "email"
        ]);
        ?>  
        <i class="icon icon_mail"></i>
    </div>
    <div class="login_v2_forget_text">
        <!--<a href="forgot_password_v2.php">Forgot password?</a>-->
        <?= $this->Html->link(__('Go Back'), ['controller' => 'Users', 'action' => 'login',], ['escape' => false]) ?>
    </div>
    <!--<button type="submit" class="btn btn-primary btn-block">Sign in</button>-->
    <?= $this->Form->submit('Submit', ['value' => 'Submit', 'class' => 'btn btn-primary btn-block', 'type' => 'submit']); ?>

    <?= $this->Form->end(); ?>
</div>
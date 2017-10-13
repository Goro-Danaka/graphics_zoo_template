<div class="login_v2">
    <div class="login_v2_main">
        <div class="login_v2_contain">
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
                <div class="login_v2_text_field">
                    <?=
                    $this->Form->input('password', [
                        "class" => "form-control",
                        "placeholder" => "Enter Password",
                        "autocomplete" => "on",
                        "label" => false,
                        "required" => "Required",
                        "id" => "password",
                    ]);
                    ?>   
                    <i class="icon icon_key"></i>
                </div>
                <div class="checkbox-login login_v2_check">
                    <div class="checkbox-squared">
                        <input value="None" id="checkbox-squared1" name="check" type="checkbox">
                        <label for="checkbox-squared1"></label>
                        <span>Remember me</span>
                    </div>
                </div>
                <div class="login_v2_forget_text">
                    <!--<a href="forgot_password_v2.php">Forgot password?</a>-->
                    <?= $this->Html->link(__('Forgot password?'), ['controller' => 'Users', 'action' => 'reset_pass',], ['escape' => false]) ?>
                </div>
                <!--<button type="submit" class="btn btn-primary btn-block">Sign in</button>-->
                <?= $this->Form->submit('login', ['value' => 'Submit', 'class' => 'btn btn-primary btn-block', 'type' => 'submit']); ?>
                <div class="login_v2_sign_link">
                    <i class="arrow_back"></i>
                    Create A New Account? Go to <?= $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'signup',], ['escape' => false]) ?>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
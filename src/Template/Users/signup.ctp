<div class="register_v2">
    <div class="register_v2_main">
        <div class="register_v2_contain">
            <?= $this->Flash->render(); ?>
            <div class="register_v2_form text-xs-center">
                <i class="register_v2_profile_icon icon icon_documents_alt"></i>
                <h5>Create your account</h5>
                <?= $this->Form->create('', ['type' => 'file']); ?>
                <div class="register_v2_text_field">
                    <?= $this->Form->control('first_name', ['placeholder' => 'Enter First Name', 'label' => FALSE]); ?>
                    <i class="icon icon_profile"></i>
                </div>

                <div class="register_v2_text_field">
                    <?= $this->Form->control('last_name', ['placeholder' => 'Enter Last Name', 'label' => FALSE]); ?>
                    <i class="icon icon_profile"></i>
                </div>

                <div class="register_v2_text_field">
                    <?= $this->Form->control('email', ['placeholder' => 'Enter Email', 'label' => FALSE]); ?>
                    <i class="icon icon_mail"></i>
                </div>

                <!--                <div class="register_v2_text_field">
                <?php // echo $this->Form->control('city', ['placeholder' => 'Enter City', 'label' => FALSE]); ?>
                                    <i class="icon icon_pin"></i>
                                </div>-->

                <!--                <div class="register_v2_text_field">
                <?php // echo $this->Form->control('country', ['placeholder' => 'Enter Country', 'label' => FALSE]); ?>
                                    <i class="icon icon_map_alt"></i>
                                </div>-->

                <div class="register_v2_text_field">
                    <?= $this->Form->password('password', ['placeholder' => 'Enter Password', 'label' => FALSE]); ?>
                    <i class="icon icon_key"></i>
                </div>

                <div class="register_v2_text_field">
                    <?= $this->Form->password('confirm_password', ['placeholder' => 'Enter Confirm Password', 'label' => FALSE]); ?>
                    <i class="icon icon_key"></i>
                </div>

                <div class="register_v2_text_field">
                    <?= $this->Form->control('profile_picture', ['type' => 'file', 'data-height' => '200', 'data-plugin' => 'dropify', 'class' => 'dropify', 'label' => FALSE]) ?>
                    <i class="icon icon_profile"></i>
                </div>


                <div class="checkbox register_v2_check float-xs-left text-xs-left">
                    <div class="checkbox-squared">
                        <input value="None" id="checkbox-squared1" name="check" type="checkbox">
                        <label for="checkbox-squared1"></label>
                        <span>I agree to the Terms &amp; Conditions.</span>
                    </div>
                </div>
                <!--<button type="submit" class="btn btn-primary btn-block flat-buttons waves-effect waves-button">Create Your Account</button>-->
                <?= $this->Form->submit('Create Your Account', ['class' => 'btn btn-primary btn-block flat-buttons waves-effect waves-button']) ?>
                <div class="register_v2_sign_link">
                    Have An Account? click to <a href="<?= \Cake\Routing\Router::url(['controller' => 'Users', 'action' => 'login'], TRUE); ?>">Login.</a>
                </div>
                <?= $this->Form->end(); ?>
            </div>
            <div class="register_v2_reserved_text text-xs-center bold-fonts">
                <p>© 2017. all right reserved.</p>
            </div>
        </div>
    </div>
</div>

<?= $this->start('css'); ?>
<?= $this->Html->css('/theme/assets/pages/register/register-v2/css/register_v2.min.css'); ?>
<?= $this->end('css'); ?>

<?= $this->start('script'); ?>

<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/numeric-input-example.js'); ?>

<?= $this->Html->script('/theme/assets/global/js/global/datatable.js'); ?>

<?= $this->end('script'); ?>
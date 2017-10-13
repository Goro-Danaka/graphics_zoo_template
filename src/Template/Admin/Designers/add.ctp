<div class="main-content">
    <div class="container-fluid">

        <div class="content content-datatable datatable-width">
            <?= $this->Flash->render(); ?>
            <div class="all-form-section">
                <div class="row">                
                    <?= $this->Form->create($designer, ['type' => 'file', 'style' => 'width:100%;']); ?>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>First Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('first_name', ['class' => 'form-control', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Last Name</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('last_name', ['class' => 'form-control', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Phone</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('phone', ['class' => 'form-control numericOnly', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Email</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('email', ['type' => 'email', 'class' => 'form-control', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
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
                                    <div class="col-md-6">
                                        <?= $this->Form->control('profile_picture', ['type' => 'file', 'data-height' => '200', 'data-plugin' => 'dropify', 'class' => 'dropify', 'label' => FALSE]) ?>
                                        <!--<input type="file" class="dropify" data-plugin="dropify" data-height="200">-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Password</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->password('password', ['class' => 'form-control', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                            <label>Confirm Password</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->password('confirm_password', ['class' => 'form-control', 'label' => FALSE, 'style'=>'border-radius:20px;']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="element-form">
                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                            <!--<a class="btn btn-success flat-buttons waves-effect waves-button">Add Manager</a>-->
                            <?= $this->Form->submit('Add Designer', ['class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'background: #ec1c41;border-radius:20px;']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
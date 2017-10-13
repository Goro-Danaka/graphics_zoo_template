<div class="main-content">
    <div class="container-fluid">

        <div class="site-content-title">
            <h2 class="float-xs-left content-title-main">Edit Designer</h2>

            <ol class="breadcrumb float-xs-right">
                <li class="breadcrumb-item">
                    <span class="fs1" aria-hidden="true" data-icon=""></span>
                    <a href="#">Main Menu</a>
                </li>
                <li class="breadcrumb-item active">View Users</li>
            </ol>
        </div>
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
                            <label>Phone</label>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <?= $this->Form->control('phone', ['class' => 'form-control numericOnly', 'label' => FALSE]) ?>
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
                                    <div class="col-md-4">
                                        <?php
                                        if ($designer->profile_picture_url):
                                            echo $this->Html->image($designer->profile_picture_url, ['class' => 'img img-responsive img-medium']);
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
                            <?= $this->Form->submit('Edit Designer', ['class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
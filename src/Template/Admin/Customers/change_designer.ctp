<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Change Designer</h2>

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
                <?= $this->Form->create($customer); ?>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Designer</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('designer_id', ['options' => $designer_list, 'class' => 'form-control select2', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>               

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <?= $this->Form->submit('Change Designer', ['class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</section>
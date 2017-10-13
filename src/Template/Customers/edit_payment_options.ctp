<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Edit Payment Details</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">View Users</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">
        <div class="all-form-section">
            <div class="row">                

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Card No</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('card_no', ['type' => 'text', 'value' => 'xxxx-xxxx-xxxx-4652', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Card Type</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('card_type', ['type' => 'text', 'value' => 'VISA', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>
                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Card CVV</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('card_cvv', ['type' => 'text', 'value' => '252', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>
                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Expiration Month</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('card_expire_month', ['type' => 'text', 'value' => '02', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>
                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Expiration Year</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('card_expire_year', ['type' => 'text', 'value' => '2020', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>                    

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <a class="btn btn-success flat-buttons waves-effect waves-button">Submit Details</a>
                        <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Add Requests</h2>

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
                        <label>Title</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('title', ['class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Description</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Use Type</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('role', ['options' => ['print' => 'Print', 'web' => 'Web'], 'class' => 'form-control select2', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>



                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Attachment</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="file" class="dropify" data-plugin="dropify" data-height="200">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <a class="btn btn-success flat-buttons waves-effect waves-button">Add Request</a>
                        <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
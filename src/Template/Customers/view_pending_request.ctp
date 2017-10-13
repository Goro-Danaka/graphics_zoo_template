<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">View Requests</h2>

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
                            <?= $request->title ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Description</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $request->description ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Use Type</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $request->work_type ?>
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
                                    <?php
                                    if ($request->request_customer_files):
                                        $attachment_path = REQUEST_IMG_URL . $request->id . DS . $request->request_customer_files{0}->file_name;
                                    endif;
                                    ?>
                                    <?php if ($attachment_path): ?>
                                        <input type="file" class="dropify" data-plugin="dropify" data-height="350" data-default-file="<?= $attachment_path ?>">
                                    <?php endif; ?>
        <!--<i class="fa fa-2x fa-download"></i>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               

                <!--<div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                <?= $this->Form->postLink('Cancel Request', ['controller' => 'Customers', 'action' => 'cancelRequest', $request->id, ['class' => 'btn btn-danger flat-buttons waves-effect waves-button']]) ?>
                        <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel Request</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
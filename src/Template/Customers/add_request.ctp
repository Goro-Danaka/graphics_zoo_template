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
        <?= $this->Flash->render(); ?>
        <?= $this->Form->create($request, ['type' => 'file']); ?>
        <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
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
                            <?= $this->Form->control('work_type', ['options' => ['print' => 'Print', 'web' => 'Web'], 'class' => 'form-control select2', 'label' => FALSE]) ?>
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
                                    <?= $this->Form->control('file', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <?= $this->Form->button('Add Request', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                        <?= $this->Html->link('Cancle', \Cake\Routing\Router::url(['controller' => 'Customers', 'action' => 'dashboard'], TRUE), ['class' => 'btn btn-danger flat-buttons waves-effect waves-button']); ?>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->Form->end(); ?>
    </div>
</section>
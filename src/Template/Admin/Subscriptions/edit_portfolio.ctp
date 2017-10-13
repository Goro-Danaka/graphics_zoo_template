<?php

use Cake\Routing\Router;
?>
<section id="content-wrapper">
    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Edit Portfolio</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Main Menu</a>
            </li>
            <li class="breadcrumb-item active">Edit Portfolio</li>
        </ol>
    </div>
    <div class="content content-datatable datatable-width">
        <?= $this->Flash->render(); ?>
        <?= $this->Form->create($portfolio, ['type' => 'file']); ?>
        <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
        <div class="all-form-section">
            <div class="row">  

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Portfolio Category</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('potfolio_category_id', ['options' => $portfoliosCategories, 'class' => 'form-control select2 designer_list', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Title</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('title', ['class' => 'form-control', 'label' => FALSE, 'required']) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Body</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <?= $this->Form->control('body', ['type' => 'textarea', 'class' => 'form-control', 'label' => FALSE]) ?>
                        </div>
                    </div>
                </div>

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                        <label>Featured Image</label>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    $attachment_path = $this->Custom->getPortfolioFeaturedImageUrlUsingObj($portfolio);
                                    ?>
                                    <?= $this->Form->control('featured_image', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200', 'data-default-file' => $attachment_path]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               
                <!--                <div class="element-form">
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                        <label>Portfolio Images</label>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                <?php // echo $this->Form->control('gallery_images[]', ['type' => 'file', 'label' => FALSE, 'multiple' => 'true'])   ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>               -->

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <?= $this->Form->button('Edit Portfolio', ['type' => 'submit', 'class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->Form->end(); ?>
    </div>
</section>

<?= $this->start('script'); ?>
<script>
    jQuery(document).ready(function () {
        $('.customer_list').on('change', function () {
            var customer_id = $(this).val();
            if (customer_id !== "0") {
                $.ajax({
                    url: "<?= Router::url(['controller' => 'App', 'action' => 'getDesignerOfCustomer', 'prefix' => FALSE], TRUE) ?>",
                    type: 'POST',
                    data: {
                        customer_id: customer_id
                    },
                    dataType: 'json',
                    success: function (data, textStatus, jqXHR) {
                        if (data.designer_id != '') {
                            $('.designer_list').val(data.designer_id);
                        } else {
                            $('.designer_list').val("0");
                        }
                    }

                });
            } else {
                $('.designer_list').val("0");
            }
        });
    });
</script>
<?= $this->end('script'); ?>
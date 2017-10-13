<section id="content-wrapper">

    <div class="site-content-title">
        <h2 class="float-xs-left content-title-main">Gallery</h2>

        <ol class="breadcrumb float-xs-right">
            <li class="breadcrumb-item">
                <span class="fs1" aria-hidden="true" data-icon=""></span>
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Gallery</li>
        </ol>

    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-content-title">Image gallery</h4>
            </div>
            <div class="divider15"></div>
        </div>      
        <div class="divider5"></div>
        <div class="none-padding">
            <div id="grid" data-plugin="lightbox" class="row my-shuffle-container">
                <?php foreach ($portfolioImages as $portfolioImage): ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 picture-item filtr-item" data-groups='["flower"]'>
                        <div class="gallery-img" >
                            <?php
                            $img_path = PORTFOLIO_IMAGE_URL . $portfolioImage->image;
                            ?>
                            <img class = "view-img" src = "<?= $img_path; ?>" alt = "Flower"/>                            
                            <div class="gallery-overlay">
                                <div class="gallery-wrapper">
                                    <div class="gallery-description">
                                        <!--                                        <h5>Good Beast</h5>
                                                                                    <p>Greater heaven. Creeping us moving day upon that. Was isn't.</p>-->
                                        <div class="gallery-icon">
                                            <?php echo $this->Form->postLink(__('<span class="fa fa-trash-o fa-2x text-danger"></span>'), ['controller' => 'Portfolios', 'action' => 'deletePortfolioImages', $portfolioImage->id], ['escape' => FALSE, 'confirm' => 'Are you sure to delete?']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
                <?php endforeach; ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 my-sizer-element"></div>
            </div>
        </div>
    </div>
</section>
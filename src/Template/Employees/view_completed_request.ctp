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
                                    $attachment_path = REQUEST_IMG_PATH . '1' . DS . '1.zip';
                                    ?>
                                    <input type="file" class="dropify" data-show-remove="false" disabled="disabled"  data-plugin="dropify" data-height="350" data-default-file="<?= $attachment_path ?>">
                                    <i class="fa fa-2x fa-download"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               


            </div>
        </div>
    </div>

    <div class="content message-page vertion-2">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="row message-rightbar">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-content-title">Discussions</h4>
                            <div class="divider15"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="chat-sender">
                                <div class="row">
                                    <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                                        <div class="chat-image">
                                            <?php
                                            $img_path = USER_IMG_URL . '1' . DS . '1.jpg';
                                            ?>
                                            <img class="active-user" src="<?= $img_path ?>" alt="Friend image">
                                        </div>
                                    </div>
                                    <div class="col-xl-10 col-md-10 col-xs-9 col-sm-10 right-side">
                                        <div class="chat-detail chat-arrow float-xs-left">
                                            <h6 class="active-user-title">Neil Gill</h6>
                                            <p>Need to change header.
                                                Change header color.</p>
                                            <span class="chat-time">5.24pm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="chat-receiver">
                                <div class="row">
                                    <div class="col-xl-11 col-md-10 col-xs-9 col-sm-10 right-side">
                                        <div class="chat-detail chat-arrow float-xs-right">
                                            <h6>Lisa</h6>
                                            <p> I have changed the header.</p>
                                            <span class="chat-time">5.30pm</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-md-2 col-xs-3 col-sm-2 left-side">
                                        <div class="chat-image float-xs-right">
                                            <?php
                                            $img_path = USER_IMG_URL . '2' . DS . '2.jpg';
                                            ?>
                                            <img src="<?= $img_path ?>" alt="Friend image">
                                        </div>
                                    </div>                                   
                                    <div class="col-xl-11 col-md-10 col-xs-9 col-sm-10 right-side">
                                        <div class="chat-detail float-xs-right">
                                            <p>Please check it.
                                            </p>
                                            <span class="chat-time">5.32pm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <div class="col-md-12">
                            <div class="type-message">
                                <input class="chat-input float-xs-left" placeholder="Type a Messages">
                                <span class="chat-type float-xs-right"><a href="javascript:void(0);"><i class="fa fa-paper-plane-o"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php

use Cake\Routing\Router;
?>
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

                <div class="element-form">
                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                        <?= $this->Form->postLink('Submit Request', ['controller' => 'Employees', 'action' => 'finishRequest', $request->id], ['class' => 'btn btn-success flat-buttons waves-effect waves-button']) ?>

                        <!--                        <a class="btn btn-info flat-buttons waves-effect waves-button">Request Revision</a>
                                                <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel Request</a>-->
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
                        <div class="discussion_container">

                        </div>                       
                        <div class="col-md-12">
                            <div class="type-message">
                                <input class="chat-input float-xs-left" placeholder="Type a Messages">
                                <span class="chat-type float-xs-right">
                                    <a href="javascript:void(0);" class="send_chat_data">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->start('script'); ?>
<script>
    jQuery(document).ready(function ($) {
        refresh_chat_container('<?= $request->id ?>');
        $('.send_chat_data').on('click', function () {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';

            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveDiscussionData'], TRUE) ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    chat_message: chat_message,
                    request_id: request_id
                },
                success: function (data, textStatus, jqXHR) {
                    if (data.status == "1") {
                        $('.chat-input').val('');
                        socket.emit('<?= NODE_NEW_MESSAGE_BROADCAST ?>', data.data);
                        refresh_chat_container(request_id);
                    }
                }
            });
        });

        $('.chat-input').keypress(function (e) {
            if (e.which == 13) {
                $('.send_chat_data').trigger('click');
            }
        });

        socket.on('<?= NODE_NEW_MESSAGE_RECIEVED ?>', function refresh_data(data) {

            if (
                    data.data.request_id == '<?= $request->id ?>'

//                    (data.reciever_id == '<?= $current_user->id ?>' && data.reciever_type == '<?= $current_user->role ?>') ||
//                    (data.sender_id == '<?= $current_user->id ?>' && data.sender_type == '<?= $current_user->role ?>') ||
                    )
            {
                refresh_chat_container('<?= $request->id ?>')
            }
        });
    });

//    function refresh_data(data) {
//        console.log(data);
//        refresh_chat_container('<?= $request->id ?>')
//    }
</script>
<?= $this->end('script'); ?>


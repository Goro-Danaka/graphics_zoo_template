<?php

use Cake\Routing\Router;
?>
<div class="main-content">
    <div class="container-fluid">

        <div class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">               
                    <div class="divider15"></div>
                    <div class="tab-pane active" id="info_tab" role="tabpanel">
                        <div class="content-datatable datatable-width">
                            <div class="all-form-section">
                                <div class="row">               
                                    <div class="element-form col-md-12">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?= $post->title ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="element-form col-md-12">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                            <label>Body</label>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <?= $post->body ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="element-form col-md-12">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                            <label>Post Image</label>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?php $attachment_path = $this->Custom->getPostFeaturedImageUrlUsingObj($post) ?>
                                                        <input type="file" class="dropify" data-plugin="dropify" data-height="250" disabled="disabled" data-default-file="<?= $attachment_path ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      

                                    <div class="element-form col-md-12">
                                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                            <!--                                                <a class="btn btn-success flat-buttons waves-effect waves-button">Accept As Complete</a>
                                                                                            <a class="btn btn-info flat-buttons waves-effect waves-button">Request A Revision</a>
                                                                                            <a class="btn btn-danger flat-buttons waves-effect waves-button">Cancel Request</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->start('css'); ?>

<?= $this->Html->css('/theme/assets/global/plugins/datatables/media/css/dataTables.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>
<?= $this->Html->css('/theme/assets/global/plugins/datatables-scroller/css/scroller.bootstrap4.min.css'); ?>

<?= $this->end('css'); ?>

<?= $this->start('script'); ?>

<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables/media/js/dataTables.bootstrap4.min.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-responsive/js/responsive.bootstrap4.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/datatables-scroller/js/dataTables.scroller.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/mindmup-editabletable.js'); ?>
<?= $this->Html->script('/theme/assets/global/plugins/editable-table/numeric-input-example.js'); ?>

<?= $this->Html->script('/theme/assets/global/js/global/datatable.js'); ?>


<script>
    jQuery(document).ready(function ($) {
        //refresh_chat_container_for_admin('<?= $request->id ?>');
    });
</script>

<script>
    jQuery(document).ready(function ($) {
       // refresh_chat_container_for_admin('<?= $request->id ?>');
        // $('.send_chat_data').on('click', function () {
            // var chat_message = $('.chat-input').val();
            // var request_id = '<?= $request->id ?>';

            // $.ajax({
                // url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminDiscussionData', 'prefix' => FALSE], TRUE) ?>",
                // type: 'POST',
                // dataType: 'JSON',
                // data: {
                    // chat_message: chat_message,
                    // request_id: request_id
                // },
                // success: function (data, textStatus, jqXHR) {
                    // if (data.status == "1") {
                        // $('.chat-input').val('');
                        // socket.emit('<?= NODE_NEW_MESSAGE_BROADCAST ?>', data.data);
                        // refresh_chat_container_for_admin(request_id);
                    // }
                // }
            // });
        // });

        // $('.chat-input').keypress(function (e) {
            // if (e.which == 13) {
                // $('.send_chat_data').trigger('click');
            // }
        // });

        // socket.on('<?= NODE_NEW_MESSAGE_RECIEVED ?>', function refresh_data(data) {
            // if (
                    // data.data.request_id == '<?= $request->id ?>'
// //                    (data.reciever_id == '<?= $current_user->id ?>' && data.reciever_type == '<?= $current_user->role ?>') ||
// //                    (data.sender_id == '<?= $current_user->id ?>' && data.sender_type == '<?= $current_user->role ?>') ||
                    // )
            // {
                // refresh_chat_container_for_admin('<?= $request->id ?>')
            // }
        // });
    });

//    function refresh_data(data) {
//        console.log(data);
//        refresh_chat_container_for_admin('<?= $request->id ?>')
//    }
</script>


<?= $this->end('script'); ?>
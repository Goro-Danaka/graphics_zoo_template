<?php

use Cake\Routing\Router;
// echo '<pre>';
// print_r($designer_list); 
// echo '</pre>'; exit;
?>


<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Customer Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Info</h4>
                    </div>
                    <div class="card-block">
                        <div class="mrg-top-40">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Title</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?= $request->title ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Description</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?= $request->description ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Use Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label><?= $request->work_type ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Attachment</label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>
                                                    <?php
                                                            $attachment_path = '';
                                                            if ($request_files):
                                                                for($i=0;$i<sizeof($request_files);$i++){
                                                                    if ($request_files[$i]['file_name']): 
                                                                    $attachment_path = REQUEST_IMG_URL . $request->id . DS . $request_files[$i]['file_name'];
                                                                    endif;
                                                    ?>
                                                   
                                                       <div class="col-md-12">
                                                           <?=ATTACHMENT_ICON?> &nbsp;
                                                            <?php 
                                                               $attachment_explode = explode(".",$attachment_path); 
                                                               $extension = end($attachment_explode);
                                                            ?>
               
                                                            <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>>
                                                                  <?php 
                                                                   if($extension == "pdf"){
                                                                        $attachment_path2 = REQUEST_IMG_URL . "pdf.jpg";
                                                                        $im     = new Imagick($attachment_path); // 0-first page, 1-second page
                                                                        $im->setImageType (imagick::IMGTYPE_TRUECOLOR);
                                                                        $im->setImageColorspace(255); // prevent image colors from inverting
                                                                        $im->setimageformat("jpeg");
                                                                        $im->thumbnailimage(160, 120); // width and height
                                                                        $thumbnail = $im->getImageBlob();
                                                                        //echo '<img src="data:image/jpg;base64,' .  base64_encode($thumbnail)  . '"  style="width:150px;"/>';
                                                                       $request_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                                }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                                        <?=$request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?>
                                                                <?php }else{ 
                                                                    $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                    ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                                    <?=$request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?>
                                                                <?php } ?>
                                                            </a>
                                                        </div>
                                                  
                                                <?php
                                                    }
                                                    endif;
                                                    ?>
                                                </label>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Design</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-9 ml-auto mr-auto">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Attachment</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>
                                            <?php
                                                $attachment_path = '';
                                                if ($admin_request_files){
                                                for($i=0;$i<sizeof($admin_request_files);$i++){ 
                                                 if ($admin_request_files[$i]->file_name): 
                                                 $attachment_path = REQUEST_IMG_URL . $request->id . DS . $admin_request_files[$i]->file_name;
                                                 $attachment_explode = explode(".",$attachment_path); 
                                                $extension = end($attachment_explode);
                                                endif;
                                            ?>
                                           
                                               <div class="col-md-12">
                                                   <?=ATTACHMENT_ICON?> &nbsp;
                                                    <?php 
                                                       $attachment_explode = explode(".",$attachment_path); 
                                                       $extension = end($attachment_explode);
                                                    ?>
       
                                                    <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>>
                                                          <?php 
                                                           if($extension == "pdf"){
                                                                $attachment_path2 = REQUEST_IMG_URL . "pdf.jpg";
                                                                $im     = new Imagick($attachment_path); // 0-first page, 1-second page
                                                                $im->setImageType (imagick::IMGTYPE_TRUECOLOR);
                                                                $im->setImageColorspace(255); // prevent image colors from inverting
                                                                $im->setimageformat("jpeg");
                                                                $im->thumbnailimage(160, 120); // width and height
                                                                $thumbnail = $im->getImageBlob();
                                                                //echo '<img src="data:image/jpg;base64,' .  base64_encode($thumbnail)  . '"  style="width:150px;"/>';
                                                               $admin_request_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                        }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                                <?=$admin_request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?>
                                                        <?php }else{ 
                                                            $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                            ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                            <?=$admin_request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?>
                                                        <?php } ?>
                                                    </a>
                                                </div>
                                          
                                        <?php
                                                }
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading border bottom">
                        <h4 class="card-title">Communication</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="myModalforall" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"></h4>
                                          </div>
                                          <div class="modal-body myModalforallbody">
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                    <?= $this->Form->hidden('request_status', ['value' => $request->status]) ?>
                                    <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
                                    <?= $this->Form->end(); ?>
                                    </div>
                                </div>      

                                <div class="tab-pane" id="communication_tab" role="tabpanel">
                                    <div class="message-page vertion-2">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="row message-rightbar">
                                                    <div class="row">                                                
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
        refresh_chat_container_for_admin('<?= $request->id ?>');
    });
</script>

<script>
    var socket = io('<?= NODE_URL ?>');
    jQuery(document).ready(function ($) {
        refresh_chat_container_for_admin('<?= $request->id ?>');
        $('.send_chat_data').on('click', function () {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';

            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminDiscussionData', 'prefix' => FALSE], TRUE) ?>",
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
                        refresh_chat_container_for_admin(request_id);
                    }
                }
            });
        });

        $('.chat-input').keypress(function (e) {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';

            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminDiscussionData', 'prefix' => FALSE], TRUE) ?>",
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
                        refresh_chat_container_for_admin(request_id);
                    }
                }
            });
        });

        socket.on('<?= NODE_NEW_MESSAGE_RECIEVED ?>', function refresh_data(data) {
            if (
                    data.data.request_id == '<?= $request->id ?>'
//                    (data.reciever_id == '<?= $current_user->id ?>' && data.reciever_type == '<?= $current_user->role ?>') ||
//                    (data.sender_id == '<?= $current_user->id ?>' && data.sender_type == '<?= $current_user->role ?>') ||
                    )
            {
                refresh_chat_container_for_admin('<?= $request->id ?>')
            }
        });
    });

//    function refresh_data(data) {
//        console.log(data);
//        refresh_chat_container_for_admin('<?= $request->id ?>')
//    }
</script>


<?= $this->end('script'); ?>
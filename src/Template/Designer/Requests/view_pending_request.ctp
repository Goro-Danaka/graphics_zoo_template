<?php

use Cake\Routing\Router;
// echo '<pre>';
// print_r($designer_list); 
// echo '</pre>'; exit;
?>

<style type="text/css">
    .card label {
        font-size: 22px;
    }
    .card .space-left label {
        font-size: 22px;
        color: black;
    }
    .card .space-left {
        padding-left: 120px; 
    }
    .card .fa {
        padding-left: 50px;
    }
    .card table a {
        color: #888da8;
    }
    .fixed-image {
        width: 300px; 
        height: 300px;
    }
    .card-title img {
        width: 20px;
        height: 20px;
    }
    .card-title span {
        color: red;
        font-size: 30px;
        vertical-align: middle;
        margin-left: 10px;
    }
    table th:last-of-type{
        text-align: right;
    }

    .image-upload input{
        display: none;
    }

    .image-upload img {
        width: 40px;
    }

    .file-input {
        border-radius: 7px;
        border: solid red 2px;
        padding: 7px 19px;
        cursor: pointer;
    }

    .image-upload span {
        color: red;
        font-size: 15px;
        margin-left: 20px;
    }

    .conversation-footer {
        height: auto!important;
    }

    .chat.open .chat-user-list {
        left: 0px;
    }

    #communication_tab {
        padding: 0px 100px;
    }
    #decisionModal .modal-content {
        padding: 0px 150px;
    }
    th.action a{
        margin-left: 20px; 
    }
    .openApprovedDialog {
        background-color: RGB(105,209,84);
        color: white;
    }
    .openRevisionDialog {
        background-color: RGB(229,31,68);
        color: white;
    }

    .chat-detail {
        width: 50%!important;
        border-radius: 35px 0px 35px 35px!important;        
        background-color: RGB(135,139,167)!important;
        padding: 15px!important;
    }

    .chat-detail::before {
        border-color:  transparent transparent transparent RGB(135,139,167)!important;
    }

    .chat-detail p {
        color: white;
    }

    .message-page.vertion-2 .message-rightbar {
        border-left: none;
        border-right: none;
    }
</style>

<?= $this->Flash->render(); ?>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Customer Dashboard</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-heading">
                        <h4 class="card-title"><img src = "<?= SITE_IMAGES_URL . 'info.png' ?>" width = "50px"><span>Info</span></h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12 ml-auto mr-auto">
                                <form class="form-horizontal mrg-top-40 pdd-right-30 ng-pristine ng-valid">
                                    <?php $nameColor = "color: RGB(255,0,0);font-weight:bold;"; $stateColor = "color:RGB(210,210,0);font-weight:bold;";?>
                                    <div class="form-group row">
                                        <label for="form-1-1" class="col-md-3 control-label text-right"><label>Designer:</label></label>
                                        <div class="col-md-9 space-left">
                                            <label style="<?=$nameColor?>">Rey</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Change State:</label></label>
                                        <div class="col-md-9 space-left">
                                            <label style="<?=$stateColor?>">In Progress</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-1" class="col-md-3 control-label text-right"><label>Title:</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->title ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Description:</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->description ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Design Dimension:</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>What business industry in this design for?</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>What colors do you want for this design?</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Do you have some style suggestions?</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Do you have a logotype of brand identity?<br>(Please attach also)</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 control-label text-right"><label>Is there any other info you would like to provide the designer?</label></label>
                                        <div class="col-md-9 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-3 col-sm-6 control-label text-right"><label>Attachments</label></label>
                                        <div class="col-md-9 col-sm-6 space-left table-overflow">  
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="50%">Document Name</th>
                                                        <th width="10%">Size</th>
                                                        <th width="40%" class="text-right">Action</th>                                                        
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <?php
                                                            $attachment_path = '';
                                                            if ($request_files):
                                                                for($i=0;$i<sizeof($request_files);$i++){
                                                                    if ($request_files[$i]['file_name']): 
                                                                    $attachment_path = REQUEST_IMG_URL . $request->id . DS . $request_files[$i]['file_name'];
                                                                    endif;
                                                        ?>
                                                       
                                                                <?php 
                                                                   $attachment_explode = explode(".",$attachment_path); 
                                                                   $extension = end($attachment_explode);
                                                                ?>
                                                                    <tr>
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
                                                                            <!-- <?=$request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?> -->
                                                                            <td><?=$request_files[$i]['file_name']."&nbsp;"?></td>                                                                            
                                                                            <td><?=filesize($attachment_path)?></td>
                                                                            
                                                                    <?php }else{ 
                                                                        $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                        ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                                        <!-- <?=$request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?> -->
                                                                            <td><?=$request_files[$i]['file_name']."&nbsp;"?></td>
                                                                            <td><?php echo filesize($attachment_path);?></td>
                                                                            
                                                                    <?php } ?>
                                                                    
                                                                            <th class="action">
                                                                                <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>><?=VIEW_ICON?>&nbsp;&nbsp;&nbsp;View</a>
                                                                                <a href="<?= $attachment_path ?>" download = ""><?=DOWNLOAD_ICON?>&nbsp;&nbsp;&nbsp;Download</a>
                                                                                <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>><?=CLOSE_ICON?></a>
                                                                            </th>
                                                                    </tr>
                                                                </a>
                                                            </div>                                  
                                                    <?php
                                                        }
                                                        endif;
                                                        ?>                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        
                    <div class="card-heading">
                        <h4 class="card-title"><img src = "<?= SITE_IMAGES_URL . 'img/receive.png' ?>" width = "50px"><span>Designer Uploaded Files</span></h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="">
                                    <div class="table-overflow">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="50%">Document Name</th>
                                                    <th width="10%">Size</th>
                                                    <th width="40%" class="text-right">Action</th>                                                        
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php
                                                        $attachment_path = '';
                                                        if ($designer_request_files):
                                                            for($i=0;$i<sizeof($designer_request_files);$i++){
                                                                if ($designer_request_files[$i]['file_name']): 
                                                                $attachment_path = REQUEST_IMG_URL . $request->id . DS . $designer_request_files[$i]['file_name'];
                                                                endif;
                                                    ?>
                                                   
                                                            <?php 
                                                               $attachment_explode = explode(".",$attachment_path); 
                                                               $extension = end($attachment_explode);
                                                            ?>
                                                                <tr>
                                                                  <?php 
                                                                   if($extension == "pdf"){
                                                                        $attachment_path2 = REQUEST_IMG_URL . "pdf.jpg";
                                                                        // $im     = new Imagick($attachment_path); // 0-first page, 1-second page
                                                                        // $im->setImageType (imagick::IMGTYPE_TRUECOLOR);
                                                                        // $im->setImageColorspace(255); // prevent image colors from inverting
                                                                        // $im->setimageformat("jpeg");
                                                                        // $im->thumbnailimage(160, 120); // width and height
                                                                        // $thumbnail = $im->getImageBlob();
                                                                        //echo '<img src="data:image/jpg;base64,' .  base64_encode($thumbnail)  . '"  style="width:150px;"/>';
                                                                       $designer_request_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                                }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                                        <!-- <?=$designer_request_files[$i]['file_name']."&nbsp;".VIEW_ICON;?> -->
                                                                        <td><?=$designer_request_files[$i]['file_name']."&nbsp;"?></td>                                                                            
                                                                        <td><?=filesize($attachment_path)?></td>
                                                                        
                                                                <?php }else{ 
                                                                    $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                    ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                                    <!-- <?=$designer_request_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?> -->
                                                                        <td><?=$designer_request_files[$i]['file_name']."&nbsp;"?></td>
                                                                        <td><?php echo filesize($attachment_path);?></td>
                                                                        
                                                                <?php } ?>
                                                                
                                                                        <th class="action">
                                                                            <a href="#" class="openDecisionDialog" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>><?=RED_VIEW_ICON?>&nbsp;&nbsp;&nbsp;<span style="color:RGB(226,33,68);">View</span></a>
                                                                            <a href="<?= $attachment_path ?>" download = ""><?=DOWNLOAD_ICON?>&nbsp;&nbsp;&nbsp;Download</a>
                                                                            <a href="#" class="openDecisionDialog" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>><?=CLOSE_ICON?></a>
                                                                        </th>
                                                                </tr>
                                                            </a>
                                                        </div>                                  
                                                <?php
                                                    }
                                                    endif;
                                                    ?>                                                
                                            </tbody>
                                        </table>
                                       <!--  <div class="row masonry-grid" data-pswp-uid="1" style="position: relative; height: 835px;">
                                            
                                        </div> -->                                               
                                        <div class="image-upload">
                                            <label class="file-input">
                                                <image src="<?= REQUEST_IMG_URL ?>image/cloud.png" />
                                                <span>Drag and drop a file here or click  </span>
                                            </label>
                                            <?= $this->Form->control('file[]', ['type' => 'file', 'id' => 'upload_file', 'label' => FALSE]) ?>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                     
                                   <!--      <?php if($request->status == "checkforapprove"){ ?>
                                                <div class="element-form">
                                                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                                        <div class="col-xl-3 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                            <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'approve', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                                                             <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                                            <?= $this->Form->control('Approve', ['type' => 'submit', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>
                                                            <?= $this->Form->hidden('request_status', ['value' => $request->status]) ?>
                                                            <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
                                                            <?= $this->Form->hidden('designer_id', ['value' => $request->designer_id]) ?>
                                                            <?= $this->Form->end(); ?>
                                                        </div>
                                                        <div class="col-xl-3 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                            
                                                             <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                                             <?= $this->Form->control('Disapprove', ['type' => 'button', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE ,'data-toggle'=>'modal', 'data-target'=>'#myModal3']) ?>
                                                            
                                                        </div>
                                                    
                                                </div>
                                        <?php } ?> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

       

                    <div class="card-heading">
                        <h4 class="card-title"><img src = "<?= SITE_IMAGES_URL . 'communication.png' ?>" width = "50px"><span>Communication</span></h4>
                    </div>
                    <div class="card-block">
                            <div class="col-md-12">

                                <div class="tab-pane" id="communication_tab" role="tabpanel">
                                    <div class="message-page vertion-2">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12">
                                                <div class="message-rightbar">
                                                    
                                                        <div class="discussion_container">

                                                        </div> 
                                                        <div class="col-md-12">
                                                            <div class="type-message">
                                                                <div class="row">
                                                                    <div class="col-md-10 ml-auto mr-auto">
                                                                        <div class="form-group">
                                                                            <input placeholder="Type a message" name="reason" class="form-control" type="email">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-10 mr-auto ml-auto">
                                                                        <div class="text-left mrg-top-5">
                                                                            <button type="submit" class="btn" style="background-color: RGB(229,31,68);color: white;"><img src="<?= SITE_IMAGES_URL . 'send_button.png' ?>" style="width: 20px;height: 23px;">&nbsp;&nbsp;&nbsp;Send to Designer</button>
                                                                            
                                                                            <!-- <a href="#"><img src="<?= SITE_IMAGES_URL . 'send_button.png' ?>"></a> -->
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                                <!-- <input class="chat-input float-xs-left" placeholder="Type a Messages">
                                                                <span class="chat-type float-xs-right">
                                                                    <a href="javascript:void(0);" class="send_chat_data_customer">
                                                                    
                                                                        <button class="btn btn-primary">Send to customer</button>
                                                                    </a>
                                                                    <a href="javascript:void(0);" class="send_chat_data_designer">
                                                                     
                                                                        <button class="btn btn-primary">Send to Designer</button>
                                                                    </a>
                                                                </span> -->
                                                            </div>
                                                        </div>   
                                                        <!-- <div class="col-md-12">
                                                            <div class="type-message col-md-10" style="border: 1px solid;border-radius: 20px;">
                                                                <input class="chat-input float-xs-left" placeholder="Type a Messages" style="    border-bottom: none;">
                                                                
                                                            </div>
                                                            <div class="col-md-2">
                                                                <span class="chat-type float-xs-right" style="border-radius: 20px;float:right;margin-top: 0px;">
                                                                    <a href="javascript:void(0);" class="send_chat_data" style="background: rgb(250, 80, 110);">
                                                                        <button class="btn" style="background: rgb(250, 80, 110);border-radius: 16px;">
                                                                        <i class="fa fa-paper-plane-o" style="margin-right: 13px;color: white;"></i>Send
                                                                        </button>
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div> -->
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                        <!-- <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFileDesigner', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                        <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <?= $this->Form->control('file[]', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200']) ?>
                                    </div>
                                    <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <a class="btn btn-info flat-buttons waves-effect waves-button" style="border-radius: 5px 0px 0px 5px;border: #f83a5b;background: #fff;padding: 4px;">
                                                <image src="<?= REQUEST_IMG_URL ?>image/attach_image.png" />
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php if($request->status_designer != "pending"){ ?>
                                    <div class="element-form">
                                        <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                        <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                        <?php if($request->status != "approved"){ ?>
                                            <?= $this->Form->control('Upload File', ['type' => 'submit', 'id' => 'request_file_uploader_btn_designer', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE,'style'=>'    border-radius: 20px;']) ?>
                                        <?php } ?>
                                        </div>
                                    </div>
                            <?php } ?>

                        <?= $this->Form->end(); ?> -->



                    
                </div>
            </div>
        </div>
    </div>
</div>

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
    </div>
</div> 
<?= $this->start('script'); ?>

<script>
    var socket = io('<?= NODE_URL ?>');
    jQuery(document).ready(function ($) {
        refresh_chat_container('<?= $request->id ?>');

        $('.send_chat_data').on('click', function () {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';

            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveDiscussionData', 'prefix' => FALSE], TRUE) ?>",
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
                 var chat_message = $('.chat-input').val();
                var request_id = '<?= $request->id ?>';

                $.ajax({
                    url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveDiscussionData', 'prefix' => FALSE], TRUE) ?>",
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
</script>


<?= $this->end('script'); ?>
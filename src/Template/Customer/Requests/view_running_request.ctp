<?php

use Cake\Routing\Router;

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
        padding: 0px 70px;
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

</style>
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
                                            <div class="image-upload">
                                                <label class="file-input">
                                                    <image src="<?= REQUEST_IMG_URL ?>image/cloud.png" />
                                                    <span>Drag and drop a file here or click  </span>
                                                </label>
                                                <?= $this->Form->control('file[]', ['type' => 'file', 'id' => 'upload_file', 'label' => FALSE]) ?>
                                            </div>                                          
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
                        <!-- <div class="mrg-top-40">
                            <div class="row form-horizontal mrg-top-40 pdd-right-30 ng-pristine ng-valid">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><label>Title</label></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label><?= $request->title ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><label>Description</label></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label><?= $request->description ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><label>Use Type</label></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label><?= $request->work_type ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><label>Design Dimension</label></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label><?= $request->design_dimension ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><label>Attachment</label></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
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
                                    </div>   -->
<!--                                     <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFileCustomer', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12"  style="margin-top: 20px;">
                                            <div class="form-group" id="addnewimage" style="position:relative;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?= $this->Form->control('file[]', ['type' => 'file', 'class' => 'dropify', 'label' => FALSE, 'data-plugin' => 'dropify', 'data-height' => '200']) ?>
                                                    </div>      
                                                    <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
                                                    <div class="col-md-3" style="position: absolute;left: 50%;bottom: 0;padding: 0px;border-radius: 5px;">              
                                                        <div class="btn-group addnewimage" style="border-radius: 3px;display: inline-block;">
                                                            <a class="btn btn-info flat-buttons waves-effect waves-button" style="border-radius: 5px 0px 0px 5px;border: #f83a5b;background: #fff;padding: 4px;">
                                                                <image src="<?= REQUEST_IMG_URL ?>image/attach_image.png" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>     -->                                    
          <!--                               <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                        <?php if($request->status_designer != "pending"){ ?>
                                                <div class="element-form">
                                                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                        <?= $this->Form->control('Upload File', ['type' => 'submit', 'id' => 'request_file_uploader_btn_designer', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                        <?= $this->Form->end(); ?>   -->                                      
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
                                                        if ($designer_files):
                                                            for($i=0;$i<sizeof($designer_files);$i++){
                                                                if ($designer_files[$i]['file_name']): 
                                                                $attachment_path = REQUEST_IMG_URL . $request->id . DS . $designer_files[$i]['file_name'];
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
                                                                       $designer_files[$i]['file_name']."&nbsp;".VIEW_ICON;
                                                                                }elseif($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){  ?>
                                                                        <!-- <?=$designer_files[$i]['file_name']."&nbsp;".VIEW_ICON;?> -->
                                                                        <td><?=$designer_files[$i]['file_name']."&nbsp;"?></td>                                                                            
                                                                        <td><?=filesize($attachment_path)?></td>
                                                                        
                                                                <?php }else{ 
                                                                    $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                    ?> <!--<img src="<?/*= $attachment_path2 */?>" style="width:150px;"> -->
                                                                    <!-- <?=$designer_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?> -->
                                                                        <td><?=$designer_files[$i]['file_name']."&nbsp;"?></td>
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
            <div class="row">
                <div class="col-md-12">             
                    <div class="tab-pane" id="communication_tab" role="tabpanel">
                        <div id="chat" role="tabpanel" class="tab-pane fade in active show" aria-expanded="true">
                            <div class="chat open">
                                <div class="chat-user-list scrollable ps-container ps-theme-default ps-active-y" data-ps-id="c114d0fd-1132-892e-9ca8-bf5e4eb13ab3">                                                                                               
                                <div class="conversation">
                                    <div class="conversation-wrapper">
                                        <div class="conversation-header">
                                            <!-- <a href="javascript:void(0);" class="back chat-toggle">
                                                <i class="ti-arrow-circle-left"></i>
                                            </a> -->
                                            <span>Message</span>
                                        </div>
                                        <div class="conversation-body">
                                            <div class="msg">
                                                <div class="bubble me">
                                                    <span>Feeling all right, sir?</span>
                                                </div>
                                            </div>
                                            <div class="msg">
                                                <div class="bubble friend">
                                                    <span>Just like new</span>
                                                </div>
                                            </div>
                                            <div class="msg">
                                                <div class="bubble friend">
                                                    <span>How about you?</span>
                                                </div>
                                            </div>
                                            <div class="msg">
                                                <div class="bubble me">
                                                    <span>Right now I feel I could take on the whole Empire myself</span>
                                                </div>
                                            </div>
                                            <div class="msg">
                                                <div class="bubble friend">
                                                    <span>All right</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="conversation-footer">
                                            <button class="upload-btn">
                                                <i class="ti-camera"></i>
                                            </button>
                                            <input class="chat-input" placeholder="Type a message..." type="text">
                                            <button class="sent-btn">
                                                <i class="fa fa-send-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="message-page vertion-2">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div id="revisionModel" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'disapprove', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header revisionModelBody">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Write Disapprove Reason</h4>
                  </div>
                  <div class="modal-body">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="form-group">
                                    <img src = "<?= SITE_IMAGES_URL . 'communication.png' ?>" style="width:25px;height:20px;"><span style="color:red;margin-left: 15px;">Add notes for revision</span>
                                </div>
                                <div class="form-group">
                                    <input placeholder="Enter reason" name="reason" class="form-control" type="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mr-auto ml-auto">
                                <div class="text-right mrg-top-5">
                                    <button type="submit" class="btn" style="background-color: RGB(229,31,68);color: white;"><img src="<?= SITE_IMAGES_URL . 'send_button.png' ?>" style="width: 20px;height: 23px;">&nbsp;&nbsp;&nbsp;Send to Designer</button>
                                    
                                    <!-- <a href="#"><img src="<?= SITE_IMAGES_URL . 'send_button.png' ?>"></a> -->
                                </div>
                            </div>
                        </div>
                                                
                                           
                    <!-- <?= $this->Form->control('Send', ['type' => 'submit', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?> -->
                  </div>
                </div>
            <?= $this->Form->hidden('request_status', ['value' => $request->status]) ?>
            <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
            <?= $this->Form->end(); ?>
          </div>
        </div>    

        <div id="myModalforall" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

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

        <div class="modal fade" id="decisionModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="decisionModalBody">                            
                        </div>
                    </div>
                    <div class="modal-footer" id ="decisionModalFooter">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
	
		echo '<input type="hidden" value="'.$diff.'" id="updatedtime">';
	
?>
<div id="approvedDialog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">    
      <div class="modal-body">
        <div class="approvedDialogBody">
        </div>        
      </div>      
    </div>

  </div>
</div>

<?= $this->start('css'); ?>
<?= $this->end('css'); ?>
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
                    alert('as');
                    if (data.status == "1") {
                        $('.chat-input').val('');
                        socket.emit('<?= NODE_NEW_MESSAGE_BROADCAST ?>', data.data);
                        refresh_chat_container(request_id);
                    }
                }
            });
        });

        // $('#approve_modal').on('click', function(){
        //     $('#approve_image').attr('src', $('#image').attr('value'));
        // });


        // $('#approveButton').on('click', function(){

        //     $.ajax({
        //         url: "<?= Router::url(['controller' => 'RequestFiles', 'action' => 'approve', 'prefix' => FALSE], TRUE) ?>",
        //         type: 'POST',
        //         dataType: 'JSON',
        //         data: {
        //             request_id: <?= $request->id ?>,
        //             designer_id: <?= $request->designer_id ?>,
        //             request_status: '<?= $request->status ?>',
        //             file_id: $('#file_id').val()
        //         },
        //         success: function (data, textStatus, jqXHR) {
        //             alert('as');
        //         }
        //     });
        // });
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
		
		var time = $('#updatedtime').val();
		if(time < 200){
			$('#myModal').modal('show');
		}

        $('.file-input').click(function(){
            $('.image-upload #upload_file').trigger('click');
        });
    });
</script>
<style>
/*.dropify-preview .dropify-infos {
    opacity: 1 !important;
}
.dropify-preview .dropify-render
{
	display:none;
}*/
</style>

<?= $this->end('script'); ?>
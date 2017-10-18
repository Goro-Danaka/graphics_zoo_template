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
                        <h4 class="card-title">Info</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-11 ml-auto mr-auto">
                                <form class="form-horizontal mrg-top-40 pdd-right-30 ng-pristine ng-valid">
                                    <div class="form-group row">
                                        <label for="form-1-1" class="col-md-2 control-label text-right"><label>Title</label></label>
                                        <div class="col-md-10 space-left">
                                            <label><?= $request->title ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-2 control-label text-right"><label>Description</label></label>
                                        <div class="col-md-10 space-left">
                                            <label><?= $request->description ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-2 control-label text-right"><label>Use Type</label></label>
                                        <div class="col-md-10 space-left">
                                            <label><?= $request->work_type ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-2 control-label text-right"><label>Design Dimension</label></label>
                                        <div class="col-md-10 space-left">
                                            <label><?= $request->design_dimension ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="form-1-3" class="col-md-2 control-label text-right"><label>Attachments</label></label>
                                        <div class="col-md-10 space-left">                                            
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
                                                                    
                                                                            <th>
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
                                    <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFileCustomer', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
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
                                        </div>                                        
                                        <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
                                        <?php if($request->status_designer != "pending"){ ?>
                                                <div class="element-form">
                                                    <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                                    <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                        <?= $this->Form->control('Upload File', ['type' => 'submit', 'id' => 'request_file_uploader_btn_designer', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                        <?= $this->Form->end(); ?>                                        
                                </div>
                    <div class="card-heading">
                        <h4 class="card-title">Design</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-10 ml-auto mr-auto">
                                <div class="">
                                    <div class="table-overflow">
                                       <!--  <div class="row masonry-grid" data-pswp-uid="1" style="position: relative; height: 835px;">
                                            
                                        </div> -->                                               
                                                    <?php
                                                        $attachment_path = '';
                                                        if ($admin_files):
                                                            for($i=0;$i<sizeof($admin_files);$i++){
                                                                if ($admin_files[$i]['file_name']): 
                                                                $attachment_path = REQUEST_IMG_URL . $request->id . DS . $admin_files[$i]['file_name'];
                                                                endif;
                                                    ?>
                                                   
                                                            <?php 
                                                               $attachment_explode = explode(".",$attachment_path); 
                                                               $extension = end($attachment_explode);
                                                            ?>
                                                            <figure class="col-md-3 masonry-brick mrg-btm-30">
                                                                <a href="assets/images/others/img-13.jpg" class="gallery-item" data-size="700x500">
                                                                    <?php if($extension == "pdf") { ?>
                                                                        <img class="img-fluid fixed-image" src="<?= SITE_IMAGES_URL . 'designer4.png' ?>" alt="">
                                                                    <?php } else { ?>
                                                                        <img class="img-fluid fixed-image" src="<?=$attachment_path?>" alt="">
                                                                    <?php } ?>
                                                                    <div class="overlay">
                                                                        <div class="overlay-content">
                                                                            <div class="inline-block">
                                                                                <h4 class="caption-title">Admin Files</h4>
                                                                                <span class="caption-date">27/6/2017</span>
                                                                            </div>
                                                                            <div class="inline-block pull-right pdd-top-20 font-size-16">
                                                                                <i class="ti-heart text-white"></i>
                                                                                <span class="text-white">18</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </figure>

                                                        <?php
                                                            }
                                                            endif;
                                                            ?>            

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
                                                            <figure class="col-md-3 masonry-brick mrg-btm-30">
                                                                <a href="assets/images/others/img-13.jpg" class="gallery-item" data-size="700x500">
                                                                    <?php if($extension == "pdf") { ?>
                                                                        <img class="img-fluid fixed-image" src="<?= SITE_IMAGES_URL . 'designer4.png' ?>" alt="">
                                                                    <?php } else { ?>
                                                                        <img class="img-fluid fixed-image" src="<?=$attachment_path?>" alt="">
                                                                    <?php } ?>
                                                                    <div class="overlay">
                                                                        <div class="overlay-content">
                                                                            <div class="inline-block">
                                                                                <h4 class="caption-title">Desinger Files</h4>
                                                                                <span class="caption-date">27/6/2017</span>
                                                                            </div>
                                                                            <div class="inline-block pull-right pdd-top-20 font-size-16">
                                                                                <i class="ti-heart text-white"></i>
                                                                                <span class="text-white">18</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        <?php
                                                            }
                                                            endif;
                                                            ?>                                                

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
            <h4 class="card-title">Communication</h4>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">             
                    <div class="tab-pane" id="communication_tab" role="tabpanel">
                        <div id="chat" role="tabpanel" class="tab-pane fade in active show" aria-expanded="true">
                            <div class="chat open">
                                <div class="chat-user-list scrollable ps-container ps-theme-default ps-active-y" data-ps-id="c114d0fd-1132-892e-9ca8-bf5e4eb13ab3">                                                                                               
                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 463px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 260px;"></div></div></div>
                                <div class="conversation">
                                    <div class="conversation-wrapper">
                                        <div class="conversation-header">
                                            <a href="javascript:void(0);" class="back chat-toggle">
                                                <i class="ti-arrow-circle-left"></i>
                                            </a>
                                            <span class="user-name">Jordan Hurst</span>
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
        <div id="myModal3" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'disapprove', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Write Disapprove Reason</h4>
                  </div>
                  <div class="modal-body">
                  <?= $this->Form->input('reason', array('type' => 'textarea','style'=>'width:100%','required'=>true)); ?>
                   
                    <?= $this->Form->control('Send', ['type' => 'submit', 'id' => 'request_file_uploader_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>
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

      <!--   <div class="modal fade" id="myModalforall" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="padding-15">
                            <div class="row">
                                    <div class="ml-auto col-md-5">
                                        <h3 class="mrg-btm-20 mrg-top-130">Download App</h3>
                                        <p>Would you like to accept this desgins?</p>
                                        <div class="mrg-top-20">
                                            <a id="approveButton" data-dismiss="modal" class="btn btn-info">Accept</a>
                                            <a href="" data-dismiss="modal" class="btn btn-default">Close</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <img class="img-fluid mrg-horizon-auto" src="assets/images/others/img-2.png" id = "approve_image" alt="">
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>


<?php
	
		echo '<input type="hidden" value="'.$diff.'" id="updatedtime">';
	
?>
<div id="myModal" class="modal fade" role="dialog" style="margin-top:20%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p style="color: #000;font-size: 18px;">Thank you for approving the Design Now you can download.</p>
      </div>
      <div class="modal-footer">
		<a style="float:left;" href="<?= Router::url(['controller' => 'Requests', 'action' => 'allApprovedRequests', 'prefix' => 'customer']); ?>"><button style="background:#337ab7;" type="button" class="btn btn-default">Download</button></a>
		
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
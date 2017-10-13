<?php

use Cake\Routing\Router;
// echo '<pre>';
// print_r($designer_list); 
// echo '</pre>'; exit;
?>


<style type="text/css">
    .element-form {
        width: 100%;
    }
</style>
<div class="main-content">
    <div class="container-fluid">


        <div class="content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">                
                    <div class="nav-tab-pills-image">             
                        <div class="divider15"></div>
                        <div class="tab-content">
    						<li class="nav-item" style="list-style:none;background: rgba(54, 89, 106, 0.42);border-radius: 10px;line-height:10px;">
                                <a class="nav-link" data-toggle="tab" role="tab" style="font-size: 20px;padding: 20px;color:black">
                                    <i class="icon icon_cog"></i>Info
                                </a>
                            </li>
    						<?php if($request->status != "approved" && $request->status != "disapprove"){ ?>
    						<div style="float:right;display:-webkit-inline-box;">
    							
    						</div>
    						<div style="float:right;display:-webkit-inline-box;display:none;">
    							
    						
    							<?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'approve', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
    							 <?php $this->Form->templates(NOWRAP_TEMPLATE); ?>
    							<?= $this->Form->control('Approve', ['type' => 'submit', 'id' => 'request_file_uploader_btn1', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE],['escape' => FALSE, 'confirm' => 'Are you sure want to Approve?']) ?>
    							<?= $this->Form->hidden('request_status', ['value' => $request->status]) ?>
    							<?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
    							<?= $this->Form->end(); ?>
    							
    							<?= $this->Form->control('Disapprove', ['type' => 'button', 'id' => 'request_file_uploader_btn2', 'class' => 'btn btn-success flat-buttons waves-effect waves-button','style'=>'margin-left:5px;', 'label' => FALSE ,'data-toggle'=>'modal', 'data-target'=>'#myModal2'],['escape' => FALSE, 'confirm' => 'Are you sure want to Dispprove?']) ?>
    							
    						</div>
    						<?php } ?>

                            <div class="tab-pane active" id="info_tab" role="tabpanel">
                                <div class="content-datatable datatable-width">
                                    <div class="all-form-section">
                                        <div class="row">         
    						              <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'Requests', 'action' => 'view', $request->id])]); ?>									
                                            <div class="element-form col-md-12">
                                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <?= $request->title ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="element-form col-md-12">
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
                                                    <label>Design Dimension</label>
                                                </div>
                                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <?= $request->design_dimension ?>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="element-form col-md-12">
                                                <div class="col-xl-2 col-lg-3 col-sm-12 col-md-3 text-xs-right"></div>
                                                <div class="col-xl-9 col-lg-9 col-sm-12 col-md-9 col-xs-12">
                                                </div>
                                            </div>
    										
    										
                                            <div class="element-form col-md-12">
                                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                    <label>Assign Designer</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-9 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
    													<?php $designerid = $request->designer_id;  ?>
    													<?= $this->Form->control('designer_id', ['options' => $designer_list, 'empty' => ['0' => 'Please Select Designer'], 'class' => 'form-control select2 designer_list', 'default' => $designerid, 'label' => FALSE,]) ?>
                                                    </div>
                                                </div>
                                                <?= $this->Form->control('Assign Designer', ['type' => 'submit', 'name' => 'assigndesigner', 'id' => 'assign_designer_submit_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>
                                            </div>
    										
    										<div class="element-form col-md-12">
                                                
    											
                                            </div>

                                            
                                            <div class="element-form col-md-12">
                                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                    <label>Change State</label>
                                                </div>
                                                <div class="col-xl-4 col-lg-9 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <?php $designerid = $request->designer_id;  ?>
                                                        <?php $state = 1; 
                                                        if($request->status_admin == "assign") {
                                                            $state = 2;
                                                        } else if($request->status_admin == "pending") {
                                                            $state = 1;
                                                        } else if($request->status_admin == "approved") {
                                                            $state = 6;
                                                        } else if($request->status_admin == "disapprove") {
                                                            $state = 5;
                                                        } else if($request->status_admin == "pendingforapprove") {      
                                                            $state = 4;                                                  
                                                        } else if($request->status_admin == "active") {      
                                                            $state = 3;                                                  
                                                        }
                                                                ?>
                                                        <?php $stateList = array("1" => "Pending", "2" => "In Queue",
                                                        "3" => "In Progress", "4" => "Waiting For Approval",
                                                        "5" => "Revision", "6" => "Approved")?>
                                                        <?= $this->Form->control('state_id', ['options' => $stateList, 'empty' => ['0' => 'Select State'], 'class' => 'form-control select2 designer_list', 'default' => $state, 'label' => FALSE,]) ?>
                                                    </div>                                                
                                                </div>
                                                <?= $this->Form->control('Change State', ['type' => 'submit', 'name' => 'assigndesigner', 'id' => 'assign_designer_submit_btn', 'class' => 'btn btn-success flat-buttons waves-effect waves-button', 'label' => FALSE]) ?>                                        
                                                    <?= $this->form->end(); ?>
                                                </div>
                                                <div class="element-form col-md-12">
                                                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                    <label>Attachment</label>
                                                </div>
                                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                    <div class="row" style="min-height:40px;">
                                                      <?php
                                                                $attachment_path = '';
                                                                if ($customer_additional_files):
                                                                    for($i=0;$i<sizeof($customer_additional_files);$i++){
                                                                        if ($customer_additional_files[$i]['file_name']): 
                                                                        $attachment_path = REQUEST_IMG_URL . $request->id . DS . $customer_additional_files[$i]['file_name'];
                                                                        endif;
                                                                        ?>
                                                        
                                                           <div class="col-md-12" style="padding:15px;">
                                                               <?=ATTACHMENT_ICON?> &nbsp;
                                                                <?php 
                                                               $attachment_explode = explode(".",$attachment_path); 
                                                               $extension = end($attachment_explode);                                                  
                                                                 ?>
                   
                                                               <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>>
                                                                <?php 

                                                                    if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){   ?>                                                         
                                                                   <?=$customer_additional_files[$i]['file_name']."&nbsp;".VIEW_ICON;?>
                                                                            <?php }else{ 
                                                                                $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                                ?>
                                                                   <?=$customer_additional_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?>
                                                                            <?php } ?>
                                                                    </a>
                                                            </div>
                                                       
                                                        <?php
                                                            }
                                                            ?>  </div> <?php
                                                                endif;
                                                                ?>
                                                    </div>
                                                </div>
                                            </div>                                                
                                            
                                        </div>                                    
                                    </div>
                                </div>
    							
    						
    							
    						<li class="nav-item" style = "list-style:none;background: rgba(54, 89, 106, 0.42);border-radius: 10px;line-height:10px; margin-top: 20px;">
                                <a class="nav-link" data-toggle="tab" role="tab" style="font-size: 20px;padding: 20px;color:black;">
                                    <i class="icon icon_cog"></i>Designs
                                </a>
                            </li>
    							
    							 <div class="row">
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12"  style="margin-top: 20px;">
                                        
                                        <div class="row">
                                              <div class="col-md-12">

                                                <div class="element-form">
                                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                        
                                                    </div>
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                <?php if ($admin_request_files){ ?>
                                                                   <span style="font-size: 15px;font-weight: 600;padding:10px 0px;">Designer Files</span>
                                                                <?php } ?>
                                                                <div class="row">
                                                                
                                                                    <?php
                                                                        $attachment_path = '';
                                                                        if ($admin_request_files){
                                                                            //print_r($admin_request_files);
                                                                            for($i=0;$i<sizeof($admin_request_files);$i++){
                                                                                if ($admin_request_files[$i]->file_name): 
                                                                                $attachment_path = REQUEST_IMG_URL . $request->id . DS . $admin_request_files[$i]->file_name;
                                                                                $attachment_explode = explode(".",$attachment_path); 
                                                                                $extension = end($attachment_explode);
                                                                                
                                                                                
                                                                                endif;
                                                                                ?>
                                                               
                                                                    <div class="col-md-12">
                                                                        <?=ATTACHMENT_ICON?> &nbsp;
                                                                      <a href="#" class="openfile" data-path="<?= $attachment_path ?>" data-extension=<?= $extension ?>>
                                                                      <?php 
                                                                        if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){  ?>
                                                                          <?=$admin_request_files[$i]->file_name."&nbsp;".VIEW_ICON;?>
                                                                        <?php }else{ 
                                                                            $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                            ?>
                                                                          <?=$admin_request_files[$i]->file_name."&nbsp;".DOWNLOAD_ICON;?>
                                                                        <?php } ?>                                                          
                                                                        </a>                                                            
                                                                        <?= $this->Form->hidden('request_id', ['value' => $request->id]) ?>
                                                                    </div>
                                                                        <?php } }?>                                                   
                                                                </div>
                                                            </div>      

                                                </div>
                                                <div class="element-form">
                                                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-12 col-xs-12 text-xs-right">
                                                        
                                                    </div>
                                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                <?php if ($admin_request_files){ ?>
                                                                   <span style="font-size: 15px;font-weight: 600;padding:10px 0px;">Admin Files</span>
                                                                <?php } ?>
                                                                <div class="row">                                                            
                                                                    <?php
                                                                            $attachment_path = '';
                                                                            if ($admin_files):
                                                                                for($i=0;$i<sizeof($admin_files);$i++){
                                                                                    if ($admin_files[$i]['file_name']): 
                                                                                    $attachment_path = REQUEST_IMG_URL . $request->id . DS . $admin_files[$i]['file_name'];
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

                                                                                if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG"){   ?>                                                         
                                                                               <?=$admin_files[$i]['file_name']."&nbsp;".VIEW_ICON;?>
                                                                                        <?php }else{ 
                                                                                            $attachment_path2 = REQUEST_IMG_URL . "file.jpg";
                                                                                            ?>
                                                                               <?=$admin_files[$i]['file_name']."&nbsp;".DOWNLOAD_ICON;?>
                                                                                        <?php } ?>
                                                                                </a>
                                                                        </div>
                                                                   
                                                                    <?php
                                                                        }
                                                                        ?>  
                                                                    </div> 
                                                                    <?php
                                                                            endif;
                                                                            ?>
                                                            </div>      

                                                </div>
                                        </div>               
                                    </div>
                                        <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFileAdmin', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>                                    
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
    														

                                <div class="row">
                                </div>
    							
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    <?= $this->Form->create($request, ['url' => Router::url(['controller' => 'RequestFiles', 'action' => 'uploadFile', 'prefix' => FALSE], TRUE), 'type' => 'file']); ?>
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

  
    <div id="myModal2" class="modal fade" role="dialog">
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
    						<li class="nav-item" style="list-style:none;background: rgba(54, 89, 106, 0.42);border-radius: 10px;line-height:10px;">
                                <a class="nav-link" data-toggle="tab" role="tab" style="font-size: 20px;padding: 20px;color:#000;">
                                    <i class="icon icon_cog"></i>Communication
                                </a>
                            </li>
    						
    							<div class="message-page vertion-2">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12">
                                            <div class="row message-rightbar">
                                                <div class="row" style="width:100%;">                                                
                                                    <div class="discussion_container">

                                                    </div>    
                                                    <div class="col-md-12">
                                                        <div class="type-message">
                                                            <input class="chat-input float-xs-left" placeholder="Type a Messages">
                                                            <span class="chat-type float-xs-right">
                                                                <a href="javascript:void(0);" class="send_chat_data_customer">
                                                               
    																<button class="btn btn-primary">Send to customer</button>
    																<input type="hidden" value="<?= $request->customer_id ?>" id="customer_id">
                                                                </a>
    															<a href="javascript:void(0);" class="send_chat_data_designer">
                                                          
    																<button class="btn btn-primary">Send to Designer</button>
    																<input type="hidden" value="<?= $request->designer_id ?>" id="designer_id">
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

                            <div class="tab-pane" id="designs_tab" role="tabpanel">
                                <div class="row">
 
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
    var socket = io('<?= NODE_URL ?>');
    jQuery(document).ready(function ($) {
        refresh_chat_container_for_admin('<?= $request->id ?>');
		
        $('.send_chat_data_customer').on('click', function () {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';
			
            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminDiscussionData', 'prefix' => FALSE], TRUE) ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    chat_message: chat_message,
                    request_id: request_id,
					'adminsendto': 'customer'
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
		
		 $('.send_chat_data_designer').on('click', function () {
            var chat_message = $('.chat-input').val();
            var request_id = '<?= $request->id ?>';
			
            $.ajax({
                url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminDiscussionData', 'prefix' => FALSE], TRUE) ?>",
                type: 'POST',
                dataType: 'JSON',
                data: {
                    chat_message: chat_message,
                    request_id: request_id,
					'adminsendto': 'designer'
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

        // $('.chat-input').keypress(function (e) {
            // if (e.which == 13) {
				// var chat_message = $('.chat-input').val();
				// var request_id = '<?= $request->id ?>';

				// $.ajax({
					// url: "<?= Router::url(['controller' => 'RequestDiscussions', 'action' => 'saveAdminCustomerDiscussionData', 'prefix' => FALSE], TRUE) ?>",
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
            // }
        // });

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
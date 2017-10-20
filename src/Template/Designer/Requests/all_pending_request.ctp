<?php

use Cake\Routing\Router;
?>

<style type="text/css">

</style>
<div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Designer Dashboard</h4>
        </div>
        <div class="card">
            <div class="padding-20">
            </div>
            <div class="tab-primary">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#tab-primary-1" class="nav-link active" role="tab" data-toggle="tab">Revision and in Progress Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-2" class="nav-link" role="tab" data-toggle="tab">In Queue Requests</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-3" class="nav-link" role="tab" data-toggle="tab">Pending for Approve</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-primary-4" class="nav-link" role="tab" data-toggle="tab">Approved Requests</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-primary-1">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table  class="table table-lg table-hover dt-opt">
	                                                <thead>
	                                                    <tr>
								                            <th class="text-left">Id</th>
								                            <th class="text-left">Status</th>
								                            <th class="text-left">Title</th>
								                            <th class="text-left">Description</th>  
														    <th>Requested</th>
															<th>In Progress</th>
															<th>Due Date</th>
															<th>Actions</th>         
															<th>Messages</th>                  
	                                                    </tr>
	                                                </thead>
	                                                <tbody>
	                                                	<?php $i = 1; ?>
								                        <?php foreach ($requests as $request): ?>
														<?php 
															$due_date = "";
															$title = strlen($request->title) >= 15? substr($request->title, 0, 10) . "..." : $request->title;
															$description = strlen($request->description) >= 20? substr($request->description, 0, 15) . "..." : $request->description; 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
																
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}
														?>
								                            <tr>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td class="text-left" style="color:<?= $textcolor ?>"><button class="btn btn-deafult" style="<?= $button ?>"><?= $status ?></button></td>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? date('m/d/Y',strtotime($request->created)) : ''; ?><br/><?= ($request->created) ? date('g:i a',strtotime($request->created)) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? date('m/d/Y',strtotime($request->dateinprogress)) : ''; ?><br/><?= ($request->dateinprogress) ? date('g:i a',strtotime($request->dateinprogress)) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?php echo $due_date; ?></td>  
																<td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewPendingRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="width:100px;font-weight: bold;font-size: 17px;border-radius:0px;background:  RGB(53,63,83);border: none;"><?= REVIEW_ICON ?><span style="vertical-align: middle;margin-left: 10px;">Review</span></button> 
								                                    </a>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewPendingRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="font-weight: bold;font-size: 17px;border-radius:0px;background: transparent; color:red;border: none;"><img src="<?=SITE_IMAGES_URL?>close_button.png" style="width:20px;height:20px;"><span style="vertical-align: middle;margin-left: 10px;"></span></button> 
								                                    </a>
								                                </td>
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?>
																</td>								                                
								                            </tr>        
								                        <?php endforeach; ?>
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-2">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover  dt-opt">
					                                <thead>
								                        <tr>
								                            <th class="text-left">Id</th>
								                            <th class="text-left">Status</th>
								                            <th class="text-left">Title</th>
								                            <th class="text-left">Description</th>  
														    <th>Requested</th>
															<th>In Progress</th>
															<th>Due Date</th>
															<th>Actions</th>         
															<th>Messages</th>
								                            
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($inprogressrequest as $request): ?>
														<?php 
															$title = strlen($request->title) >= 15? substr($request->title, 0, 10) . "..." : $request->title;
															$description = strlen($request->description) >= 20? substr($request->description, 0, 15) . "..." : $request->description; 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}
														?>
								                            <tr>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $i++; ?></td>                
								                                <td class="text-left" style="color:<?= $textcolor ?>"><span  style="<?= $button ?>"><?= $status ?></span></td>                
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $title ?></td>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $description ?></td>   
																
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?><br/><?= ($request->created) ? $request->created->format(DATE_FORMAT_TIME_ONLY_WITH_AM_PM) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?><br/><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_TIME_ONLY_WITH_AM_PM) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"></td>  
								                                <td>
								                                	<a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="width:100px;font-weight: bold;font-size: 17px;border-radius:0px;background:  RGB(53,63,83);border: none;"><?= REVIEW_ICON ?><span style="vertical-align: middle;margin-left: 10px;">Review</span></button> 
								                                    </a>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="font-weight: bold;font-size: 17px;border-radius:0px;background: transparent; color:red;border: none;"><img src="<?=SITE_IMAGES_URL?>close_button.png" style="width:20px;height:20px;"><span style="vertical-align: middle;margin-left: 10px;"></span></button> 
								                                    </a>
								                                </td>
								                                <td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                            </tr>        
								                        <?php endforeach; ?>
								                    </tbody>
								                </table>					                                               
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        </div>
                    </div>	

                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-3">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover dt-opt">
					                                <thead>
								                        <tr>  
								                            <th class="text-left">Id</th>
								                            <th class="text-left">Status</th>
								                            <th class="text-left">Title</th>
								                            <th class="text-left">Description</th>  
														    <th>Requested</th>
															<th>In Progress</th>
															<th>Due Date</th>
															<th>Actions</th>         
															<th>Messages</th>
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($checkforapproverequests as $request): ?>
														<?php 
															$title = strlen($request->title) >= 15? substr($request->title, 0, 10) . "..." : $request->title;
															$description = strlen($request->description) >= 20? substr($request->description, 0, 15) . "..." : $request->description; 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
																$button="color: RGB(248,148,30);    margin: auto;";
															}
														?>
								                            <tr>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $i++; ?></td>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><span  style="<?= $button ?>"><?= $status ?></span></td>                                
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td class="text-left" style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?><br/><?= ($request->created) ? $request->created->format(DATE_FORMAT_TIME_ONLY_WITH_AM_PM) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_WITHOUT_TIME) : ''; ?><br/><?= ($request->dateinprogress) ? $request->dateinprogress->format(DATE_FORMAT_TIME_ONLY_WITH_AM_PM) : ''; ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"></td>  																
								                                <td>
								                                   <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="width:100px;font-weight: bold;font-size: 17px;border-radius:0px;background:  RGB(53,63,83);border: none;"><?= REVIEW_ICON ?><span style="vertical-align: middle;margin-left: 10px;">Review</span></button> 
								                                    </a>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewRunningRequest', $request->id]); ?>">                    
																	 	<button class="btn-sm btn-primary" style="font-weight: bold;font-size: 17px;border-radius:0px;background: transparent; color:red;border: none;"><img src="<?=SITE_IMAGES_URL?>close_button.png" style="width:20px;height:20px;"><span style="vertical-align: middle;margin-left: 10px;"></span></button> 
								                                    </a>
								                                </td>
								                                <td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?>
																</td>
								                            </tr>        
								                        <?php endforeach; ?>
								                    </tbody>
								                </table>					                                               
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
                        </div>
                    </div>	

                    <div role="tabpanel" class="tab-pane fade" id="tab-primary-4">
                        <div class="pdd-horizon-15 pdd-vertical-20">
                            <div class="row">
	                            <div class="col-md-12">
	                                <div class="card">
	                                    <div class="card-block">
	                                        <div class="table-overflow">
	                                            <table class="table table-lg table-hover dt-opt">
					                                <thead>
								                        <tr>
								                            <th>Id</th>
								                            <th>Title</th>
								                            <th>Description</th>  
															<th>Customer Name</th>
															<th>Date Requested</th>
															<th>No. of New Messages(<?= $total_approved_message ?>)</th>
								                            <th>Action</th>        
								                        </tr>
								                    </thead>
								                    <tbody>
								                        <?php $i = 1; ?>
								                        <?php foreach ($approvedrequest as $request): ?>
														<?php 
															if($request->status_designer == "pending") 
															{ $status = "Pending"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;"; } 
															elseif($request->status_designer == "running") 
															{ $status = "In Queue"; $bgcolor=""; $textcolor=""; $view = "View"; $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;";}
															elseif($request->status_designer == "active")
															{
																$status = "In Progress";
																$bgcolor="orange";
																$textcolor="#000";
																 $view = "View"; 
																  $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: orange;";
															}elseif($request->status_designer == "pendingforapprove")
															{
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																 $view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "checkforapprove"){
																$status = "Waiting for Approval";
																$bgcolor="lightgreen";
																$textcolor="#000";
																$view = "Review"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgreen;";
															}elseif($request->status_designer == "disapprove"){
																$status = "Revision";
																$bgcolor="coral";
																$textcolor="#000";
																$view = "D"; 
																 $button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: coral;";
															}elseif($request->status_designer == "assign"){
																$status = "In Queue";
																$bgcolor="lightgray";
																$textcolor="#000";
																$view = "D"; 
																$button="color: rgb(255, 255, 255);    margin: auto;    border-radius: 20px;background: lightgray;";
															}else{
																$status = "";
																$bgcolor="";
																$textcolor="";
																$view = "View"; 
															}
														?>
								                            <tr>
								                                <td style="color:<?= $textcolor ?>"><?= $i++; ?></td>                                
								                                <td style="color:<?= $textcolor ?>"><?= $request->title ?></td>
								                                <td style="color:<?= $textcolor ?>"><?= $request->description ?></td>   
																<td style="color:<?php echo $txtcolor; ?>;"><?= ($request->customer) ? $request->customer->first_name . ' ' . $request->customer->last_name : '' ?></td>  
																<td  style="color:<?php echo $txtcolor; ?>;"><?= ($request->created) ? $request->created->format(DATE_FORMAT_WITH_TIME) : ''; ?></td>  
																<td style="color:<?php echo $txtcolor; ?>;"><?php if($admin_unread_message_count_array[$request->id]!=0) { ?>
																 <button class="btn btn-primary" style="border-radius:20px;background:orange;border:none;">
																		<?= $admin_unread_message_count_array[$request->id] ?> Messages</button> 
																<?php	} ?></td>
								                                <td>
								                                    <a href="<?= Router::url(['controller' => 'Requests', 'action' => 'viewApprovedRequest', $request->id]); ?>">
								                                        <button class="btn btn-primary" style="border-radius:20px;background:#3e3c3c;border: none;"><img style="width:20px;" src="<?= REQUEST_IMG_URL ?>image/view.png">View</button> 
								                                    </a>
								                                </td>
								                            </tr>        
								                        <?php endforeach; ?>
								                    </tbody>
								                </table>					                                               
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

<?= $this->end('script'); ?>
